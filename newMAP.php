<?php
    $rowsVillages=[]; // mpenun ola ta xoria
    $rowsHouses = []; // menun ola ta house me locations
    $countVillages = 0;
    $countHouses = 0;

$centerLat = 0;
$centerLong = 0;

    include("/InsertDataDB/mySQLQueries/openDB.php");
    include "load/showMarkers.php";

    $conn->close();
?>

<!--CRONTAB-->
<!--http://www.htmlcenter.com/blog/running-php-scripts-with-cron/-->

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

    <link href="css/bootstrap-slider.css" rel="stylesheet">


    <style type="text/css">
        html, body, #map-canvas {
            height: 100%; margin: 0; padding: 0;
        }
         #legend {
             background: white;
             padding: 10px;
             margin: 20px;
         }

         .form-inline .control-label {
             margin-bottom: 0;
             vertical-align: middle;
             margin-top: 9px;
         }
        html, body, .container {
            height: 100%;
        }
        #myDiv{
            text-align: center;
            background:rgba(224,224,224, 0.6);
            height: 10%;
            padding-top: 1%;

        }


    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDskKKeX8jRTqsVKa7b8dMPLICe10zxvxc"></script>
    <script type="text/javascript" src="js/loadMarkers.js"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


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
               // mapTypeId: google.maps.MapTypeId.
                //center: new google.maps.LatLng(35.1015952, 33.5364145),
                center: new google.maps.LatLng(<?php echo $centerLat; ?>, <?php echo $centerLong; ?>),
                zoom: 12
            };
            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(
                document.getElementById('legend'));

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(
                document.getElementById('myDiv'));
            loadVillages();
            loadHouses();
            console.log(markers);


        }

        google.maps.event.addDomListener(window, 'load', initialize);




    </script>
</head>
<body>

<div id = "myDiv">
    <form class="form-inline" action="newMap.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-4" for="city">City:</label>
            <div class="col-sm-4">
                <select class="form-control" name="city" id="city">
                    <option value="0">Any</option>
                    <option value="1">Nicosia</option>
                    <option value="2">Limassol</option>
                    <option value="3">Larnaca</option>
                    <option value="4">Paphos</option>
                    <option value="5">Famagusta</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-6" for="forSale">Rent or Sale:</label>
            <div class="col-sm-4">
                <select class="form-control" name="forSale" id="forSale">
                    <option value="2">Any</option>
                    <option value="0">For Rent</option>
                    <option value="1">For Sale</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4" for="type">Type:</label>
            <div class="col-sm-4">
                <select class="form-control" name="type" id="type">
                    <option value="0">Any</option>
                    <option value="1">House</option>
                    <option value="2">Apartment</option>
                    <option value="3">Studio</option>
                    <option value="4">Plot</option>
                    <option value="5">Other</option>
                </select>
            </div>
        </div>

        <div class="form-group" id="bedDivs" style="display: none">
            Bedrooms: <b>1.</b> <input name="Bedrooms" id="Bedrooms" type="text" class="span2" value="" data-slider-min="0" data-slider-max="10" data-slider-step="1" data-slider-value="[0,10]"/> <b>.10</b>
        </div>

        <div class="form-group" id="plotDivs" style="display: none">
            Plot: <b>0m².</b> <input name ="Plot" id="Plot" type="text" class="span2" value="" data-slider-min="0" data-slider-max="1000" data-slider-step="10" data-slider-value="[0,1000]"/> <b>.1000m²</b>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="min_price">Price:</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" style="width: 120px" name="min_price" id="min_price" placeholder="€ Min. Price"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                <input type="number" class="form-control" style="width: 120px"  name="max_price" id="max_price" placeholder="€ Max. Price"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <input type="submit" class="btn btn-primary" value="Search">
            </div>
        </div>


    </form>


    <!--        price   -->
</div>

<div id="map-canvas"></div>

<div id="legend">
    <h4 style="text-align: center">Info</h4>
   <div><img src= "pin2.png"> Areas</div>
    <br>
   <div><img src= "house170.png"> Houses</div>
</div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-slider.js"></script>


<script>
    $("#Bedrooms").slider({});
    $("#Plot").slider({});

    $("#type").change(function () {
        var end = this.value;
        if(end == 1 || end == 2){
            $("#bedDivs").fadeIn();
            $("#plotDivs").fadeOut();
        }
        if (end == 0 || end == 5){
            $("#bedDivs").fadeOut();
            $("#plotDivs").fadeOut();
        }
        if(end == 4 || end == 3 ){
            $("#plotDivs").fadeIn();
            $("#bedDivs").fadeOut();
        }
    });

</script>
<script>
    $('#showProperty').on('hide.bs.modal', function () {
        $('#modalBody').empty();
    });
</script>
</body>
</html>
