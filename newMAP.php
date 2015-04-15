<?php
//
//    $servername = "localhost";
//    $username = "root";
//    $password = "261994akk";
//    $dbname = "epl452db";
//
//    // Create connection
//    $conn = new mysqli($servername, $username, $password, $dbname);
//    // Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }
//
//    $sql = "SELECT * FROM property";
//    $result = $conn->query($sql);
//    $rows=[];
//    if ($result->num_rows > 0) {
//        // output data of each row
//        $count = 0;
//        while($row = $result->fetch_assoc()) {
//        $rows[$count] = $row;
//        $count++;
//        // print_r ($row);
//    }
//    } else {
//        echo "0 results";
//    }
//    $conn->close();
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
    <script type="text/javascript">

        var map;
        var markers =[];
//        var markerData = <?php //echo json_encode($rows);?>//;

        function initialize() {
            var mapOptions = {
                mapTypeId: google.maps.MapTypeId.HYBRID,
                center: new google.maps.LatLng(35.1015952, 33.5364145),
                zoom: 10
            };
            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

//            for (var i=0; i<markerData.length; i++){
//                var contentString = '<div id="content">' +
//                    '<div id="siteNotice">' +
//                    '</div>' +
//                    '<h1 id="firstHeading" class="firstHeading">'+markerData[i].title+'</h1>' +
//                    '<div id="bodyContent">' +
//                    '<p><img src="'+markerData[i].img+'"></p>' +
//                    '<p> Bedrooms:' +
//                    'Στούντιο με βασικές ηλεκτρικές συσκευές, μερικώς επιπλωμένο σε προνομιακή τοποθεσία' +
//                    'στην Ακρόπολη απέναντι από το Υπουργείο Παιδείας.  Χώρος στάθμευσης στον ισόγειο χώρο της πολυκατοικίας.</p>' +
//                    '<p><a href="https://developers.google.com/maps/documentation/javascript/infowindows#open">' +
//                    'Για περισσότερες πληροφορίες...</a></p>'
//                '</div>' +
//                '</div>';
//
//                placeMarker(new google.maps.LatLng(markerData[i].latitude, markerData[i].longitude),contentString );
            var address = "Egkomi, Nicosia";
            geocoder.geocode( { 'address': address}, function(results, status) {
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



        function codeAddress() {
            var address = "Egkomi, Nicosia";
            geocoder.geocode( { 'address': address}, function(results, status) {
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

        //http://www.lettingscyprus.com/properties-for-rent/
        //http://www.ktimatagora.com/

        function placeMarker(location,contentString){
            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 250
            });

//            new google.maps.Marker({
//                position: location,
//                map: map,
//                animation: google.maps.Animation.DROP,
//                title: 'Hello World!',
//                icon: "house170 (3).png"
//            });

//            google.maps.event.addListener(marker, 'click', function () {
//                infowindow.open(map, marker);
//            });

            markers.push(            new google.maps.Marker({
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