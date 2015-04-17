<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Geocoding service</title>
    <style>
        html, body, #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDskKKeX8jRTqsVKa7b8dMPLICe10zxvxc"></script>
    <script>
        var geocoder;
        var map;
        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var mapOptions = {
                zoom: 8,
                center: latlng
            }
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            codeAddress();
        }

        function codeAddress() {
            var address = ["Timi","Tombs of the Kings","Tremithousa","Tsada","Universal Area","Venus Rock Golf Resort","Yeroskipou","Yialia"];


            console.log(address.length);
            var i;
            for(i=0; i<address.length ;i++){
                console.log(address[i]);
                console.log(i);
                geocoder.geocode( { 'address': address[i]+",Paphos, Cyprus"}, function(results, status) {

                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }

        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</head>
<body>
<div id="map-canvas"></div>
</body>
</html>