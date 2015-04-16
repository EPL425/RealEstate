<?php

    include_once('simple_html_dom.php');
    include("mySQLQueries/openDB.php");
    for($i=116;$i<200;$i++) {
        $target_url = 'http://www.ktimatagora.com/properties-for-sale/?page='.$i;
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
                        echo $type."<br>";
                    }
                    if($propertyInfo->class == "info_beds"){
                        $b=$propertyInfo->innertext();
                        $b = ltrim($b);
                        $b = rtrim($b);
                        if(strcmp("$type","Residential Land")==0){
                            $beds=strtok($b,":");
                            $beds=strtok(" ");
                            echo $beds."<br>";
                        }
                        else {
                            $beds = strtok($b, " ");
                            echo $beds . "<br>";
                        }
                   }
                    if($propertyInfo->class == "info_loc") {
                        $location = $propertyInfo->innertext();
                        $location= ltrim($location);
                        $city = strtok($location, ",");
                        echo $city . "<br>";
                        $village = strtok(",");
                        $village = ltrim($village);
                        echo $village . "<br>";
                    }
                }

                $sqlInsertProperty = "INSERT INTO property (type, forSale, bedrooms,price, city, location, img, link)VALUES ('$type',1, '$beds','$priceSF','$city' ,'$village','$img','$link' );";

                if ($conn->query($sqlInsertProperty) === TRUE) {
                    echo "ok111";
                } else {
                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                }


                echo "<br/>";
            }
        }

    }
    $conn->close();
?>