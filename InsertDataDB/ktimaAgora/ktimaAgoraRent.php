<?php

include_once('../simple_html_dom.php');
include("../mySQLQueries/openDB.php");
for($i=1;$i<55;$i++) {
    $target_url = 'http://www.ktimatagora.com/properties-for-rent/?page='.$i;
    $html = new simple_html_dom();
    $html->load_file($target_url);

    $link="";$img="";$type="";$priceSF="";$beds=0;$city="";$village="";



    foreach ($html->find('div') as $propertyDiv) {
        if($propertyDiv->class == "property_listing_small"){
            $count=0;
            foreach ($propertyDiv->find('a') as $propertyLink){
                if($count == 1){
                    $link= $propertyLink->href;
                    $link="http://www.ktimatagora.com/".$link;
                    echo $link."<br/>";
                    foreach($propertyLink->find('img') as $propertyImg){
                        $img = $propertyImg->src;
                        $img = "http://www.ktimatagora.com/".$img;
                        echo $img."<br/>";
                    }
                    foreach($propertyLink->find('div') as $propertyPrice){
                        $p=$propertyPrice->innertext();
                        $p = ltrim($p);
                        $p = rtrim($p);
                        $priceSF=strtok($p,":");
                        $priceSF=strtok("<");
                        $priceSF = ltrim($priceSF);
                        $priceSF = rtrim($priceSF);
                        $priceSF = strtok($priceSF, "€");
                        $priceSF = str_replace(",","",$priceSF);
                        echo $priceSF."<br/>";
                    }
                }
                $count++;
            }
            foreach($propertyDiv->find('div') as $propertyInfo){

                if($propertyInfo->class == "info_type"){
                    $type = $propertyInfo->innertext();
                    $type = ltrim($type);
                    $type = rtrim($type);
                    if(strcmp($type,"House-Villa")==0){
                        $type="House";
                    }
                    elseif (strcmp($type,"Apartment-Flat")==0){
                        $type="Apartment";
                    }
                    elseif (strcmp($type,"Studio")==0){
                        $type="Studio";
                    }
                    elseif(strcmp($type,"Residential Land")==0 || strcmp($type,"Agricultural Land")==0){
                        $type="Plot";
                    }
                    else{
                        $type = "Other";
                    }
                    echo $type."<br>";
                }
                if($propertyInfo->class == "info_beds"){
                    $b=$propertyInfo->innertext();
                    $b = ltrim($b);
                    $b = rtrim($b);
                    if(strcmp("$type","Apartment")==0 ||strcmp("$type","House")==0){

                        $beds = strtok($b, " ");
                        echo $beds . "<br>";
                    }
                    else {
                        $beds=strtok($b,":");
                        $beds=strtok(" ");
                        echo $beds."<br>";
                    }
                }
                if($propertyInfo->class == "info_loc") {
                    $location = $propertyInfo->innertext();
                    $location= ltrim($location);
                    $city = strtok($location, ",");
                    $city = ltrim($city);
                    $city = rtrim($city);
                    echo $city . "<br>";
                    $village = strtok(",");
                    $village = ltrim($village);
                    $village = str_replace("'","",$village);
                    echo $village . "<br>";
                }
            }

            if (strcmp($city,"Nicosia")==0){
                $sqlCheck="SELECT * FROM propertynicosia WHERE propertynicosia.link='$link';";
                $resultProperty = $conn->query($sqlCheck);
                if ($resultProperty->num_rows == 0) {
                    echo("Nicosia");
                    $sqlInsertProperty = "INSERT INTO propertyNicosia (type, forSale, bedrooms,price, location, img, link)VALUES ('$type',0, '$beds','$priceSF','$village','$img','$link' );";

                    if ($conn->query($sqlInsertProperty) === TRUE) {
                        echo "ok111";
                    } else {
                        echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                    }
                }
            }elseif (strcmp($city,"Limassol")==0){
                $sqlCheck="SELECT * FROM propertylimassol WHERE propertylimassol.link='$link';";
                $resultProperty = $conn->query($sqlCheck);
                if ($resultProperty->num_rows == 0) {
                    $sqlInsertProperty = "INSERT INTO propertyLimassol (type, forSale, bedrooms,price, location, img, link)VALUES ('$type',0, '$beds','$priceSF','$village','$img','$link' );";

                    if ($conn->query($sqlInsertProperty) === TRUE) {
                        echo "ok111";
                    } else {
                        echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                    }
                }
            }elseif (strcmp($city,"Larnaca")==0){
                $sqlCheck="SELECT * FROM propertylarnaca WHERE propertylarnaca.link='$link';";
                $resultProperty = $conn->query($sqlCheck);
                if ($resultProperty->num_rows == 0) {
                    $sqlInsertProperty = "INSERT INTO propertyLarnaca (type, forSale, bedrooms,price, location, img, link)VALUES ('$type',0, '$beds','$priceSF','$village','$img','$link' );";

                    if ($conn->query($sqlInsertProperty) === TRUE) {
                        echo "ok111";
                    } else {
                        echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                    }
                }
            }elseif (strcmp($city,"Pafos")==0){
                $sqlCheck="SELECT * FROM propertypaphos WHERE propertypaphos.link='$link';";
                $resultProperty = $conn->query($sqlCheck);
                if ($resultProperty->num_rows == 0) {
                    $sqlInsertProperty = "INSERT INTO propertyPaphos (type, forSale, bedrooms,price, location, img, link)VALUES ('$type',0, '$beds','$priceSF','$village','$img','$link' );";

                    if ($conn->query($sqlInsertProperty) === TRUE) {
                        echo "ok111";
                    } else {
                        echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                    }
                }
            }elseif (strcmp($city,"Famagusta")==0){
                $sqlCheck="SELECT * FROM propertyfamagusta WHERE propertyfamagusta.link='$link';";
                $resultProperty = $conn->query($sqlCheck);
                if ($resultProperty->num_rows == 0) {
                    $sqlInsertProperty = "INSERT INTO propertyFamagusta (type, forSale, bedrooms,price, location, img, link)VALUES ('$type',0, '$beds','$priceSF','$village','$img','$link' );";

                    if ($conn->query($sqlInsertProperty) === TRUE) {
                        echo "ok111";
                    } else {
                        echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                    }
                }
            }



            echo "<br/>";
        }
    }

}
$conn->close();
?>