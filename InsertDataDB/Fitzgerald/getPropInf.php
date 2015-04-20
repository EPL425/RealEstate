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
            if (strpos($type,"Apartment")>=0 ){
                $type="Apartment";
            }elseif (strpos($type,"Studio")>=0){
                $type = "Studio";
            }else{
                $type="House";
            }

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





    if (strcmp($city,"Nicosia")==0) {
        $sqlCheck="SELECT * FROM propertynicosia WHERE propertynicosia.link='$link';";
        $resultProperty = $conn->query($sqlCheck);
        if ($resultProperty->num_rows == 0) {
            $sqlInsertLatLong= "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$lat' ,'$long') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {
                $sqlInsertProperty = "INSERT INTO propertyNicosia (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type',1, '$beds','$price','$cityAndVillage','$img','$link','$conn->insert_id' );";
                if ($conn->query($sqlInsertProperty) === TRUE) {
                    echo "ok111";
                }else {
                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                }
            }else {
                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
            }

        }
    }elseif (strcmp($city,"Limassol")==0) {
        $sqlCheck="SELECT * FROM propertylimassol WHERE propertylimassol.link='$link';";
        $resultProperty = $conn->query($sqlCheck);
        if ($resultProperty->num_rows == 0) {
            $sqlInsertLatLong= "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$lat' ,'$long') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {
                $sqlInsertProperty = "INSERT INTO propertylimassol (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type',1, '$beds','$price','$cityAndVillage','$img','$link','$conn->insert_id' );";
                if ($conn->query($sqlInsertProperty) === TRUE) {
                    echo "ok111";
                }else {
                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                }
            }else {
                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
            }

        }

    }elseif (strcmp($city,"Larnaca")==0) {
        $sqlCheck="SELECT * FROM propertylarnaca WHERE propertylarnaca.link='$link';";
        $resultProperty = $conn->query($sqlCheck);
        if ($resultProperty->num_rows == 0) {
            $sqlInsertLatLong= "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$lat' ,'$long') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {
                $sqlInsertProperty = "INSERT INTO propertylarnaca (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type',1, '$beds','$price','$cityAndVillage','$img','$link','$conn->insert_id' );";
                if ($conn->query($sqlInsertProperty) === TRUE) {
                    echo "ok111";
                }else {
                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                }
            }else {
                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
            }

        }

    }elseif (strcmp($city,"Paphos")==0) {
        $sqlCheck="SELECT * FROM propertypaphos WHERE propertypaphos.link='$link';";
        $resultProperty = $conn->query($sqlCheck);
        if ($resultProperty->num_rows == 0) {
            $sqlInsertLatLong= "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$lat' ,'$long') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {
                $sqlInsertProperty = "INSERT INTO propertypaphos (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type',1, '$beds','$price','$cityAndVillage','$img','$link','$conn->insert_id' );";
                if ($conn->query($sqlInsertProperty) === TRUE) {
                    echo "ok111";
                }else {
                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                }
            }else {
                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
            }

        }

    }elseif (strcmp($city,"Famagusta")==0) {
        $sqlCheck="SELECT * FROM propertyfamagusta WHERE propertyfamagusta.link='$link';";
        $resultProperty = $conn->query($sqlCheck);
        if ($resultProperty->num_rows == 0) {
            $sqlInsertLatLong= "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$lat' ,'$long') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {
                $sqlInsertProperty = "INSERT INTO propertyfamagusta (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type',1, '$beds','$price','$cityAndVillage','$img','$link','$conn->insert_id' );";
                if ($conn->query($sqlInsertProperty) === TRUE) {
                    echo "ok111";
                }else {
                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                }
            }else {
                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
            }

        }

    }



?>