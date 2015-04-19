<?php
//include_once('../simple_html_dom.php');
//include("../mySQLQueries/openDB.php");
//
//    $target = "http://www.fitzgeraldcyprus.com/en/property/map-search/property/1721.html";
//    $html2 = new simple_html_dom();
//    $html2->load_file($target);
    $cityAndVillage=""; $beds="";$price="";$type="";
    foreach ($html2->find('div') as $link1) {
        if ($link1->class == "span4 nb_content_column first") {
            $priceAndType="";
            foreach ($link1->find('tr') as $newLink) {
                $priceAndType = $priceAndType.$newLink->innertext();
            }
            $par = strpos($priceAndType, "€");

            $priceAndType = substr($priceAndType, $par);

            $par = strpos($priceAndType, "<");

            $price = substr($priceAndType, 0, $par);
            $price = str_replace(",","",$price);
            $price = str_replace(" ","",$price);
            $price = str_replace("€","",$price);
            echo $price . "<br>";

            $priceAndType = substr($priceAndType, $par);

            $par = strpos($priceAndType, "<span>");

            $priceAndType = substr($priceAndType, $par+6);

            $par = strpos($priceAndType, "</span>");

            $type = substr($priceAndType, 0, $par);

            echo $type. "<br>";

        }

        if ($link1->class == "span4 nb_content_column"){
            foreach ($link1->find('tr') as $newLink) {
                $cityAndVillage = $cityAndVillage.$newLink->innertext();
            }

            $par = strpos($cityAndVillage, "<span>");
            $cityAndVillage = substr($cityAndVillage, $par+6);
            $par = strpos($cityAndVillage, "</span>");
            $cityAndVillage = substr($cityAndVillage, 0, $par);

            $par = strpos($cityAndVillage, ">");
            $city = substr($cityAndVillage, 0, $par);
            $city = str_replace(" ","",$city);
            echo $city."<br>";
            $cityAndVillage = substr($cityAndVillage, $par+1);
            echo $cityAndVillage."<br>";
        }

        if ($link1->class == "span4 nb_content_column last"){
            foreach ($link1->find('tr') as $newLink) {
                $beds = $beds.$newLink->innertext();
            }

            $par = strpos($beds, "<span>");
            $beds = substr($beds, $par+6);
            $par = strpos($beds, "</span>");
            $beds = substr($beds, 0, $par);
            echo $beds."<br>";
        }


    }

    if (strcmp($city,"Nicosia")==0){
        $sqlInsertProperty = "INSERT INTO propertyNicosia (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type',1, '$beds','$price','$cityAndVillage','$img','$link',1 );";

        if ($conn->query($sqlInsertProperty) === TRUE) {

            $sqlInsertLatLong= "INSERT INTO propertyLocation(propertyID, Latitude, Longitude) VALUES ('$conn->insert_id','$lat' ,'$long') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {

                echo "ok111";
            }else {
                echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
            }


        } else {
            echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
        }

    }elseif (strcmp($city,"Limassol")==0){
        $sqlInsertProperty = "INSERT INTO propertyLimassol (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type',1, '$beds','$price','$cityAndVillage','$img','$link',1 );";

        if ($conn->query($sqlInsertProperty) === TRUE) {

            $sqlInsertLatLong= "INSERT INTO propertyLocation(propertyID, Latitude, Longitude) VALUES ('$conn->insert_id','$lat' ,'$long') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {

                echo "ok111";
            }else {
                echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
            }


        } else {
            echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
        }
    }elseif (strcmp($city,"Larnaca")==0){
        $sqlInsertProperty = "INSERT INTO propertyLarnaca (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type',1, '$beds','$price','$cityAndVillage','$img','$link',1 );";

        if ($conn->query($sqlInsertProperty) === TRUE) {

            $sqlInsertLatLong= "INSERT INTO propertyLocation(propertyID, Latitude, Longitude) VALUES ('$conn->insert_id','$lat' ,'$long') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {

                echo "ok111";
            }else {
                echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
            }


        } else {
            echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
        }
    }elseif (strcmp($city,"Paphos")==0){
        echo "PAPHOS<br>";
        $sqlInsertProperty = "INSERT INTO propertyPaphos (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type',1, '$beds','$price','$cityAndVillage','$img','$link',1 );";

        if ($conn->query($sqlInsertProperty) === TRUE) {

            $sqlInsertLatLong= "INSERT INTO propertyLocation(propertyID, Latitude, Longitude) VALUES ('$conn->insert_id', '$lat' ,'$long') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {

                echo "ok111";
            }else {
                echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
            }


        } else {
            echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
        }
    }elseif (strcmp($city,"Famagusta")==0){
        $sqlInsertProperty = "INSERT INTO propertyfamagusta (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type',1, '$beds','$price','$cityAndVillage','$img','$link',1 );";

        if ($conn->query($sqlInsertProperty) === TRUE) {

            $sqlInsertLatLong= "INSERT INTO propertyLocation(propertyID, Latitude, Longitude) VALUES ('$conn->insert_id',$lat ,'$long') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {

                echo "ok111";
            }else {
                echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
            }


        } else {
            echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
        }
    }

//$conn->close();


?>