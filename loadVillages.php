<?php

    $servername = "localhost";
    $username = "root";
    $password = "261994akk";
    $dbname = "epl425db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $rows=[];
//    $sqlVillages = "SELECT name FROM villagesnicosia;";
//    $resultVillages = $conn->query($sql);
//    if ($result->num_rows > 0) {
//        // output data of each row
//        while($row = $resultVillages->fetch_assoc()) {
//            $rows[$count] = $row;
//            $count++;
//            // print_r ($row);
//        }
//    } else {
//        echo "0 results";
//    }

    $sql = "SELECT * FROM property, villagesnicosia WHERE property.location='Aglantzia' and villagesnicosia.Name='Aglantzia';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $count = 0;
        while($row = $result->fetch_assoc()) {
        $rows[$count] = $row;
        $count++;
        // print_r ($row);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Real Estate Cyprus</title>
    <style type="text/css">
        html, body, #map-canvas {
            height: 100%; margin: 0; padding: 0;
        }
    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDskKKeX8jRTqsVKa7b8dMPLICe10zxvxc"></script>
    <script src="bin/oms.min.js"></script>
    <script type="text/javascript">

        var map;
        var markers =[];
        var infoWindows = [];
        var markerData = <?php echo json_encode($rows);?>;
        console.log(markerData);

        function initialize() {
            var mapOptions = {
                mapTypeId: google.maps.MapTypeId.HYBRID,
                center: new google.maps.LatLng(35.1015952, 33.5364145),
                zoom: 10
            };
            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

            var oms = new OverlappingMarkerSpiderfier(map);
//            var iw = new google.maps.InfoWindow();
//            oms.addListener('click', function(marker, event) {
//                iw.setContent(marker.desc);
//                iw.open(map, marker);
//            });
//
//            oms.addListener('spiderfy', function(markers) {
//                iw.close();
//            });


            for (var i=0; i<markerData.length; i++) {
//                var contentString = '<div id="content">' +
//                    '<div id="siteNotice">' +
//                    '</div>' +
//                    '<h1 id="firstHeading" class="firstHeading">'+markerData[i].type+'</h1>' +
//                    '<div id="bodyContent">' +
//                    '<p><img src="'+markerData[i].img+'"></p>' +
//                    '<p> Bedrooms:'+markerData[i].bedrooms + '</p><p> Price: $'+markerData[i].price + '</p>' +
//                    '<p>'+markerData[i].city+', '+markerData[i].location + '</p>' +
//                    '<p><a href="'+markerData[i].link+'>' +
//                    'Για περισσότερες πληροφορίες...</a></p>'
//                    '</div>' + '</div>';

                var location = new google.maps.LatLng(markerData[i].Latitude, markerData[i].Longitude);

//                var infowindow = new google.maps.InfoWindow({
//                    content: contentString,
//                    maxWidth: 250
//                });

                var newMarker = new google.maps.Marker({
                    position: location,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    title: 'Hello World!',
                    icon: "house170 (3).png"
                });
                oms.addMarker(newMarker);
                markers.push(newMarker);

//                infoWindows.push(google.maps.event.addListener(markers[markers.length-1], 'mouseover', function () {
//                    new google.maps.InfoWindow({
//                        content: contentString,
//                        maxWidth: 250
//                    }).open(map, markers[markers.length-1]);
//                }));
//                infoWindows.push(google.maps.event.addListener(markers[markers.length-1], 'mouseout', function () {
//                    new google.maps.InfoWindow({
//                        content: contentString,
//                        maxWidth: 250
//                    }).close();
//                }));

                //placeMarker(new google.maps.LatLng(markerData[i].latitude, markerData[i].longitude),contentString );
            }
            oms.addListener('click', function(marker, event) {
                for (var i=0; i<markerData.length; i++) {
                    console.log(markerData[i].type);
                }
            });

        }

        function placeMarker(location,contentString){
            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 250
            });

            var newMarker = new google.maps.Marker({
                position: location,
                map: map,
                animation: google.maps.Animation.DROP,
                title: 'Hello World!',
                icon: "house170 (3).png"
            });

            google.maps.event.addListener(newMarker, 'click', function () {
                infowindow.open(map, marker);
            });

            oms.addMarker(newMarker);
            markers.push(
                new google.maps.Marker({
                position: location,
                map: map,
                animation: google.maps.Animation.DROP,
                title: 'Hello World!',
                icon: "house170 (3).png"
            }));
            console.log(markers);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
<div id="map-canvas"></div>
</body>
</html>

<!--http://www.aloizou.com.cy/properties-for-sale/      vlakia-->

<!--http://landtourist.com/         idio me to diko mas  var LATITUDE = '35.11150304583939';
    var LONGITUDE = '33.32343941557531'; alla mono nic-->

<!--http://www.purpleinternational.eu/      en mporume n piame lat long-->

<!--http://www.realestatecyprus.com.cy/         vlimmata-->

<!--http://www.urban-keys.com/              lathos xartes-->

<!--http://www.fitzgeraldcyprus.com/            ula exun var param_lat  = '34.7723533106967';var param_long = '32.41225093603134'; mono paho lemeso-->

<!--http://www.realtor.com.cy/?lang=en              merika exun xarti-->