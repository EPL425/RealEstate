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

    $rowsVillages=[];
    $sqlVillages = "SELECT name FROM villagesnicosia;";
    $resultVillages = $conn->query($sqlVillages);
    if ($resultVillages->num_rows > 0) {
        // output data of each row
        $countVillages = 0;
        while($rowV = $resultVillages->fetch_assoc()) {
            $vill = $rowV["name"];

            $sqlProperty = "SELECT * FROM property, villagesnicosia WHERE property.location='$vill' and villagesnicosia.Name='$vill' and property.exactLoc=0 ;";
            $resultProperty = $conn->query($sqlProperty);
            $rowsProperty = [];
            if ($resultProperty->num_rows > 0) {

                $countProperty = 0;
                while($rowP = $resultProperty->fetch_assoc()) {
                    $rowsProperty[$countProperty] = $rowP;
                    $countProperty++;
                }

                $rowsVillages[$countVillages]=$rowsProperty;
                $countVillages++;
            } else {
                //echo "0 results";
            }


        }
    } else {
        echo "0 results";
    }



$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real Estate Cyprus</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



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
        var markerData = <?php echo json_encode($rowsVillages);?>;
        console.log(markerData);
        console.log(markerData.length);

        function initialize() {
            var mapOptions = {
                mapTypeId: google.maps.MapTypeId.HYBRID,
                center: new google.maps.LatLng(35.1015952, 33.5364145),
                zoom: 10
            };
            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

            //var oms = new OverlappingMarkerSpiderfier(map);
            var countMarkers=0;
            for (var i=0; i<markerData.length; i++) {
                    var location = new google.maps.LatLng(markerData[i][0].Latitude, markerData[i][0].Longitude);
                    var newMarker = new google.maps.Marker({
                        position: location,
                        map: map,
                        animation: google.maps.Animation.DROP,
                        title: markerData[i][0].location,
                        icon: "house170 (3).png"
                    });
                    console.log(markerData[i][0].location);
                    //oms.addMarker(newMarker);
                    markers.push(newMarker);
                    with ({ foo: i }) {
                        google.maps.event.addListener(markers[countMarkers], 'click', function () {
                            document.getElementById("myModalLabel").innerHTML = markerData[foo][0].location;
                            var modalBody = document.getElementById('modalBody');
                            for(var i=0;i<markerData[foo].length;i++){
                                var titleProp = document.createElement('div');
                                titleProp.setAttribute('class','row');
                                titleProp.setAttribute('style','text-align: center');
                                var sale ="For Sale";
                                if(markerData[foo][i].forSale == 0){
                                    sale ="For Rent";
                                }
                                var beds="Plot: ";
                                var met="m²";
                                if (markerData[foo][i].type == "Apartment-Flat" ||markerData[foo][i].type == "House-Villa" ){
                                    beds = "Bedrooms: ";
                                    met="";
                                }
                                titleProp.innerHTML ='<h4>'+ markerData[foo][i].type+'</h4><div class="col-md-12">'+
                                        '<img src="'+markerData[foo][i].img+'"><p>'+sale+'</p><p>'+beds+
                                        markerData[foo][i].bedrooms+met+'</p><p>Price: €'+markerData[foo][i].price+
                                        '</p><p><a href="'+markerData[foo][i].link+'">More informations..</a></p> <hr>';
                                modalBody.appendChild(titleProp);
                            }
                            $('#showProperty').modal('toggle');
                        });
                    }
                    countMarkers++;


            }
            console.log(markers);
        }

        google.maps.event.addDomListener(window, 'load', initialize);


    </script>
</head>
<body>
    <div id="map-canvas"></div>


    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="showProperty">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel"></h3>
                </div>
                <div class="modal-body" id="modalBody">

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <script>
        $('#showProperty').on('hide.bs.modal', function () {
            $('#modalBody').empty();
        });
    </script>
</body>
</html>
