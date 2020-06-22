    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw">
    </script>


    <script>

    var marker;
      function initialize() {

        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;

        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-kios'), mapOptions);

        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
            $id = $_GET['id'];
            $query = mysql_query("SELECT * FROM pemilik inner join kios where pemilik.id_pemilik=kios.id_pemilik and kios.id_pemilik='$id'");
            while ($data = mysql_fetch_array($query))
            {
                $nama_kios = $data['nama_kios'];
                //$lat = $data['lat'];
                //$lon = $data['lon'];
                $koordinat=$data['koordinat'];

                echo ("addMarker($koordinat, '<b>$nama_kios</b>');\n");
            }
          ?>

        // Proses membuat marker
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

        }
      google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>
