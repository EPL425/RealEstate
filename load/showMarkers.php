<?php

    $city = $_POST["city"];
    $sale = $_POST["forSale"];
    $type = $_POST["type"];
    $bed  = $_POST["Bedrooms"];
    $pos = strpos($bed, ",");
    $bedMin = substr($bed, 0, $pos);
    $bedMax = substr($bed, $pos+1);


    $plot = $_POST["Plot"];
    $pos = strpos($plot, ",");
    $plotMin = substr($plot, 0, $pos);
    $plotMax = substr($plot, $pos+1);

    $min = $_POST["min_price"];
    $max = $_POST["max_price"];


    $queryVill = "";
    if ($sale != 2){
        $queryVill= $queryVill." and p.forSale = '$sale'";
    }

    if ($type != 0 ){
        $typeStr = "";
        if ($type == 1){
            $typeStr = "House";
            $queryVill = $queryVill." and p.type = '$typeStr' and p.bedrooms >='$bedMin' and p.bedrooms <= '$bedMax'";
        }elseif ($type == 2){
            $typeStr = "Apartment";
            $queryVill = $queryVill." and p.type = '$typeStr' and p.bedrooms >='$bedMin' and p.bedrooms <= '$bedMax'";
        }elseif($type == 3){
            $typeStr = "Studio";
            $queryVill = $queryVill." and p.type = '$typeStr' and p.bedrooms >='$plotMin' and p.bedrooms <= '$plotMax'";
        }elseif ($type == 4){
            $typeStr = "Plot";
            $queryVill = $queryVill." and p.type = '$typeStr' and p.bedrooms >='$plotMin' and p.bedrooms <= '$plotMax'";
        }elseif ($type == 5){
            $typeStr = "Other";
            $queryVill = $queryVill." and p.type = '$typeStr' and p.bedrooms >='$plotMin' and p.bedrooms <= '$plotMax'";
        }

    }
    if ($min != ""){
        $queryVill = $queryVill." and p.price >= '$min'";
    }
    if ($max != ""){
        $queryVill = $queryVill." and p.price <= '$max'";
    }

    $queryVill = $queryVill.";";



    if ($_POST["city"] == 0){
        //oles i polis
        include "loadNicosia.php";
        include "loadLimassol.php";
        include "loadLarnaca.php";
        include "loadFamagusta.php";
        include "load/loadPaphos.php";
        $centerLat = 35.1303146;
        $centerLong = 33.366176;
    }elseif ($_POST["city"] == 1){
        include "loadNicosia.php";
        $centerLat = 35.1303146;
        $centerLong = 33.366176;


    }elseif ($_POST["city"] == 2){
        include "loadLimassol.php";
        $centerLat = 34.7121321;
        $centerLong = 33.0066837;


    }elseif($_POST["city"] == 3){
        include "loadLarnaca.php";
        $centerLat = 34.9270505;
        $centerLong = 33.4882272;
    }elseif ($_POST["city"] == 4){
        include "load/loadPaphos.php";
        $centerLat = 34.8247324;
        $centerLong=32.499509;

    }elseif ($_POST["city"] == 5) {
        include "loadFamagusta.php";
        $centerLat = 35.0796445;
        $centerLong = 33.8607645;
    }


?>