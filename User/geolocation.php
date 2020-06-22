              <script src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap"></script>

                <script>

                //              menentukan koordinat titik tengah peta
                            var myLatlng = new google.maps.LatLng(1.176587,106.827115);

                //              pengaturan zoom dan titik tengah peta
                            var myOptions = {
                                zoom: 5,
                                center: myLatlng
                            };

                //              menampilkan output pada element
                            var map = new google.maps.Map(document.getElementById("map1"), myOptions);


                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition, showError);
                    } else {
                        view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
                    }
                }

                function showPosition(position) {
                    lat = position.coords.latitude;
                    lon = position.coords.longitude;
                    latlon = new google.maps.LatLng(lat, lon)
                    map = document.getElementById('map1')
                    map.style.height = '720px';
                    map.style.width = '1290px';

                    var myOptions = {
                    center:latlon,
                    zoom:14,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                    }

                    var map = new google.maps.Map(document.getElementById("map1"), myOptions);
                    var marker = new google.maps.Marker({
                        position:latlon,
                        map:map,
                        animation: google.maps.Animation.BOUNCE,
                        title:"Kamu Disini"
                    });
                }

                function showError(error) {
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
                            break;
                        case error.POSITION_UNAVAILABLE:
                            view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
                            break;
                        case error.TIMEOUT:
                            view.innerHTML = "Requestnya timeout bro"
                            break;
                        case error.UNKNOWN_ERROR:
                            view.innerHTML = "An unknown error occurred."
                            break;
                    }
                 }

               </script>
