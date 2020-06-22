<?php
include "dijkstra/Main.php";
// koneksi
$m = new Main();
$koneksi = $m->koneksi;

// query
$sql 	= "SELECT * FROM pemilik inner join kios where pemilik.id_pemilik=kios.id_pemilik";
$query 	= mysqli_query($koneksi, $sql);

//tujuan
echo '<select id="select_tujuan" class="form-control center" onchange="choose_destination(this.value)" onclick="send_dijkstra()">';
echo '<option value="pilih">---PILIH KIOS LPG---</option>';
while($data = mysqli_fetch_array($query, MYSQLI_ASSOC)){

//Tampilkan nama Kios LPG yang sudah melengkapi BIODATA (VERIFIKASI)
//if(!empty($data['nik_pemilik']) && !empty($data['foto_ktp']) ){
if(!empty($data['nik_pemilik'])){

	$koordinat 		= $data['koordinat'];
	$jumlah_stok  = $data['jumlah_stok'];
	$exp_koordinat 	= explode(',', $koordinat);
	$json_koordinat	= '{"lat": '.$exp_koordinat[0].', "lng": '.$exp_koordinat[1].'}';

	//if($jumlah_stok > 0){
	echo "<option class='form-control center' value='$json_koordinat'>$data[nama_kios] (Jumlah Stok: $jumlah_stok)</option>";
//}
}
}
echo '</select>';
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key="></script>-->
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>-->
<script type="text/javascript"
				src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyD0qQtSGpxqkXWMkpgTjRLHH7ejYcAEUhk">
</script>

<script>


var poly = '';
var map;
var markeruser = '';
var markerdestination = '';


var __global_user		 = false;
var __global_destination = false;
var update_timeout;

// temporary list angkot
var temp_list_angkot = [];

/**
* INITIALIZE GOOGLE MAP
*/


function initialize() {
	var infoWindow = new google.maps.InfoWindow;
	/* setup map */
	var mapOptions = {
		zoom: 14,mapTypeId: google.maps.MapTypeId.ROADMAP,
		center: new google.maps.LatLng(5.1918862, 97.1378960)
	};
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	var bounds = new google.maps.LatLngBounds();
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};


			infoWindow.setPosition(pos);
			infoWindow.setContent('Posisi Anda');
			infoWindow.open(map);
			map.setCenter(pos);
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	}



		<?php
				$query = mysqli_query($koneksi,"SELECT * FROM pemilik inner join kios where pemilik.id_pemilik=kios.id_pemilik");
				while ($data = mysqli_fetch_array($query))
				{
					//if(!empty($data['nik_pemilik']) && !empty($data['foto_ktp'])){
					if(!empty($data['nik_pemilik'])){

						$jumlah_stok = $data['jumlah_stok'];
						$nama_kios=$data['nama_kios'];
						//$lat = $data['lat'];
						//$lon = $data['lon'];
						$koordinat=$data['koordinat'];
						if($jumlah_stok == 0){
						echo ("addMarker($koordinat, '<b>Nama Kios:$nama_kios</b><br><b>Stok Habis</b>');\n");
					}
				  	else{
						echo ("addMarker($koordinat,'<b>Nama Kios:$nama_kios</b><br><b>Jumlah Stok:$jumlah_stok</b> ');\n");
						}
					}
				}
				?>


				// Proses membuat marker

	 function addMarker(lat, lng, info) {

			icons = 'lpg.png';
			icons2 = 'lpg2.png';
			icons3 = 'lpg3.png';
			var lokasi = new google.maps.LatLng(lat, lng);
			//bounds.extend(lokasi);

				var marker = new google.maps.Marker({
					map: map,
					icon: icons3,
					position: lokasi
			});

			//map.fitBounds(bounds);
			bindInfoWindow(marker, map, infoWindow, info);

	 }


	 function bindInfoWindow(marker, map, infoWindow, html) {
		 google.maps.event.addListener(marker, 'click', function() {
			 infoWindow.setContent(html);
			 infoWindow.open(map, marker);
		 });
	 }



	/* create marker and line by click */
	google.maps.event.addListener(map, 'click', function(event)
	{
		icons = 'location.png';
		var location = event.latLng;

		update_timeout = setTimeout(function()
		{
			if(__global_user == false){
				markeruser = new google.maps.Marker({
					position: location,
					map: map,
					icon: icons,
					draggable: true,
					title: 'Posisi Anda',
				});

				// update
				__global_user = true;
			}else{
				markeruser.setPosition(location);
			}

		}, 200);

	});

	// handle click and dblclick same time
	google.maps.event.addListener(map, 'dblclick', function(event) {
		clearTimeout(update_timeout);
	});
	}



	/**
	* PILIH DESTINATION (KIOS) VIA <SELECT>
	*/
	function choose_destination(value){
	// teks option
	var teks = $("#select_tujuan option:selected").text();

	// -- PILIH -- dipilih
	if(value == 'pilih') return false;

	// reset polyline
	if(poly != '') poly.setMap(null);

	// RESET ANGKOT SEBELUMNYA
	$(temp_list_angkot).each(function(w, x){
		// x = marker0, marker1 dst
		window[x].setMap(null);
	});

	var location = JSON.parse(value);
	icons = 'lpg.png';

	if(__global_destination == false){
		markerdestination = new google.maps.Marker({
			position: location,
			map: map,
			icon: icons,
			draggable: false,
			title: 'TUJUAN : ' + teks,
		});

		__global_destination = true;
	}else{
		markerdestination.setPosition(location);
		markerdestination.setTitle('TUJUAN : ' + teks);
	}
	}

	/**
	* GET JSON DIJSKTRA VIA AJAX
	*/
	function send_dijkstra(){

/**
	if(markeruser == '' || markerdestination == ''){
		alert('Tentukan posisi awal kamu & tujuan');
		return false;
	}
*/
	console.log(markeruser.position.lat());
	console.log(markeruser.position.lng());
	now_koord_user 			= '{"lat": ' + markeruser.position.lat() + ', "lng": ' + markeruser.position.lng() + '}';
	now_koord_destination 	= '{"lat": ' + markerdestination.position.lat() + ', "lng": ' + markerdestination.position.lng() + '}';

	// loading
	$('#run_dijkstra').hide();
	$('#loading').show();

	$.ajax({
		method:"POST",
		url : "dijkstra/Main.php",
		data: {koord_user: now_koord_user, koord_destination: now_koord_destination},
		success:function(response){

			// remove loading
			$('#run_dijkstra').show();
			$('#loading').hide();

			var json = JSON.parse(response);
			console.log(response);

			// RESET POLYLINE
			if(poly != '') poly.setMap(null);

			// RESET ANGKOT SEBELUMNYA
			$(temp_list_angkot).each(function(w, x){
				// x = marker0, marker1 dst
				window[x].setMap(null);
			});

			// ERROR ALGORITMA DIJKSTRA
			if(json.hasOwnProperty("error")) alert(json['error']['teks']);

			// GAMBAR JALUR SHORTEST PATH
			/* setup polyline */
			var polyOptions = {
				/*path: [
				{"lat": 37.772, "lng": -122.214},
				{"lat": 21.291, "lng": -157.821},
				{"lat": -18.142, "lng": 178.431},
				{"lat": -27.467, "lng": 153.027}],
				*/
				path: json['jalur_shortest_path'],
				geodesic: true,
				strokeColor: 'rgb(20, 120, 218)',
				strokeOpacity: 1.0,
				strokeWeight: 2,
			};
			poly = new google.maps.Polyline(polyOptions);
			poly.setMap(map);

			// GAMBAR KOORDINAT ANGKOT
			$(json['angkot']).each(function(i, v)
			{
				// no_angkot
				no_angkot = JSON.stringify(v['no_angkot']);
				window['infowindow'+i] = new google.maps.InfoWindow({
					content: '<div>'+ no_angkot +'</div>'
				});

				// koordinat angkot
				koordinat_angkot = v['koordinat_angkot'];
				window['marker'+i] = new google.maps.Marker({
					position: koordinat_angkot,
					map: map,
					title: 'title',
					//icon: 'http://latcoding.com/domains/dijkstra.latcoding.com/imgs/user_min.png'
					icon: 'as.png'
				});

				// popup
				window['marker'+i].addListener('click', function() {
					window['infowindow'+i].open(map, window['marker'+i]);
				});

				// temporary list angkot
				temp_list_angkot[i] = 'marker'+i;
			});
		},
		error:function(er){
			alert('error: '+er);

			// remove loading
			$('#run_dijkstra').show();
			$('#loading').hide();
		}
	});
	}

	/* load google maps v3 */
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
