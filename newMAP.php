<?php
    $rowsVillages=[]; // mpenun ola ta xoria
    $rowsHouses = []; // menun ola ta house me locations
    $countVillages = 0;
    $countHouses = 0;
    include("/InsertDataDB/mySQLQueries/openDB.php");
    // analogos tou request tu xristi kamno load arxia
    include "load/loadNicosia.php";
    include "load/loadPaphos.php";
    include "load/loadLimassol.php";
    include "load/loadLarnaca.php";
    include "load/loadFamagusta.php";

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
    <script type="text/javascript" src="js/loadMarkers.js"></script>

    <script type="text/javascript">



        var map;
        var markers =[];
        var markersHouses=[];
        var infoWindows = [];
        var markerData = <?php echo json_encode($rowsVillages);?>;
        var markesDataHouses = <?php echo json_encode($rowsHouses);?>;

        console.log(markesDataHouses);
        console.log(markesDataHouses.length);

        function initialize() {
            var mapOptions = {
                mapTypeId: google.maps.MapTypeId.HYBRID,
                center: new google.maps.LatLng(35.1015952, 33.5364145),
                zoom: 10
            };
            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

            loadVillages();
            loadHouses();
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
