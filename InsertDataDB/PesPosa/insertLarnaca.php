<?php
include_once('../simple_html_dom.php');
include("../mySQLQueries/openDB.php");
for ($offset=0; $offset<=200 ; $offset+=20){
    $target_url = 'http://real-estate.pesposa.com/Larnaca/'.$offset;
    $html = new simple_html_dom();
    $html->load_file($target_url);

    foreach($html->find('li') as $li){
        if ($li->class == "tf_search_item tf_util_hover "){
            $link="";$img="";$type="";
            foreach($li->find('a') as $a){
                if($a->class == "tf_search_item_link") {
                    $link = $a->href;
                    echo "<br>".$link."<br>";
                    foreach($a->find('img') as $im){
                        $img=$im->src;
                        echo $img."<br>";
                    }
                }
                if($a->class == "choose_category_leftbar no_decor"){
                    $type=$a->innertext();
                    if(strcmp($type,"Σπίτια") == 0){
                        $type="House";
                    }elseif (strcmp($type,"Διαμερίσματα") == 0){
                        $type="Apartment";
                    }elseif(strcmp($type,"Οικόπεδα") == 0){
                        $type="Plot";
                    }else{
                        $type = "Other";
                    }
                    echo $type."<br>";
                }
            }
            $target = $link;
            $html2 = new simple_html_dom();
            $html2->load_file($target);


            foreach($html2->find('span') as $span){
                if($span->itemprop == "addressLocality"){
                    $location = $span->innertext();
                    $pos = strpos($location,",");
                    $location=substr($location,0,$pos);
                    $location=str_replace("'"," ",$location);
                    echo $location."<br>";
                }
                if($span->itemprop == "price"){
                    $price = $span->innertext();
                    $price = str_replace(" ","",$price);
                    echo $price."<br>";
                }

            }
            $ar = array();
            $c=0;
            foreach($html2->find('div') as $div){
                if($div->id == "view_additional_features"){
                    foreach($div->find('li') as $li){
                        foreach($li->find('span') as $span){
                            if($span->class == "value"){
                                $ar[$c]=$span->innertext();
                                $ar[$c]=str_replace("&nbsp;","",$ar[$c]);
                                $ar[$c] = ltrim($ar[$c]);
                                $ar[$c] = rtrim($ar[$c]);
                                $c++;
                            }

                        }
                    }
                }
            }
            print_r($ar);

            $ll = array();
            foreach ($html2->find('script') as $script){
                $inScript = $script->innertext();
                if (strpos($inScript,"var myLatlng = new google.maps.LatLng(")>0){
                    $pos = strpos($inScript,"var myLatlng = new google.maps.LatLng(");
                    $inScript = substr($inScript,$pos+38);

                    $pos = strpos($inScript, ");");
                    $latLong = substr($inScript,0,$pos);

                    $ll=explode(",",$latLong);
                    print_r($ll);
                }
            }
            $sale=1;$beds=0;
            for($i=0;$i<sizeof($ar);$i++){
                if (strcmp($ar[$i],"Ενοικίαση") == 0){
                    $sale = 0;
                }
                if(strpos($ar[$i],"υπνοδωμάτια")>0){
                    $beds=substr($ar[$i],0,1);
                }
                if(strpos($ar[$i],"τ.μ.")>0){
                    $p = strpos($ar[$i],"τ.μ.");
                    $beds = substr($ar[$i],0,$p);
                }
            }
            echo $sale."<br>";
            echo $beds."<br>";

            $sqlCheck = "SELECT * FROM propertylarnaca WHERE propertylarnaca.link='$link';";
            $resultProperty = $conn->query($sqlCheck);
            if ($resultProperty->num_rows == 0) {
                $sqlInsertLatLong = "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$ll[0]' ,'$ll[1]') ";
                if ($conn->query($sqlInsertLatLong) === TRUE) {
                    $sqlInsertProperty = "INSERT INTO propertylarnaca (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$beds','$price',N'$location','$img','$link','$conn->insert_id' );";
                    if ($conn->query($sqlInsertProperty) === TRUE) {
                        echo "ok111";
                    } else {
                        echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
                }

            }

        }
    }
}
$conn->close();
?>
