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
            var address = ["Agia Napa","Agia Thekla","Agia Triada","Avgorou","Deryneia","Kapparis","Paralimni","Pernera","Protaras","Sotira","Vrysoules"];

            var i;
            for(i=0; i<address.length ;i++){
                var vill = address[i];
                geocoder.geocode( { 'address': vill+",Famagusta, Cyprus"}, function(results, status) {

                    if (status == google.maps.GeocoderStatus.OK) {
//                        map.setCenter(results[0].geometry.location);
//                        var marker = new google.maps.Marker({
//                            map: map,
//                            position: results[0].geometry.location
//
//                        });
//                        console.log(address[i]);
//                        console.log(i);
                        // 1. Create XHR instance - Start
                        console.log(results[0]);
                        var xhr;
                        if (window.XMLHttpRequest) {
                            xhr = new XMLHttpRequest();
                        }
                        else if (window.ActiveXObject) {
                            xhr = new ActiveXObject("Msxml2.XMLHTTP");
                        }
                        else {
                            throw new Error("Ajax is not supported by this browser");
                        }
                        // 1. Create XHR instance - End

                        // 2. Define what to do when XHR feed you the response from the server - Start
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4) {
                                if (xhr.status == 200 && xhr.status < 300) {
                                    console.log(xhr.responseText);
                                }
                            }
                        }

                        xhr.open('POST', '../mySQLQueries/insertVillages.php');
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.send("village=" + results[0].address_components[0].long_name + "&k=" + results[0].geometry.location.k + "&D="
                        + results[0].geometry.location.D );

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