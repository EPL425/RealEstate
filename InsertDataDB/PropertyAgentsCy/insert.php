<?php
    include_once('../simple_html_dom.php');
    include("../mySQLQueries/openDB.php");
    for($i=1;$i<33;$i++){
        $target_url = "http://propertyagentscy.com/?s=all+properties&search=search&srch_type&srch_keyword&category=0&srch_location&location_by_area&srch_bedrooms_min&srch_bedrooms&srch_bathroom_min&srch_bathroom&srch_price&paged=".$i;
        $html = new simple_html_dom();
        $html->load_file($target_url);

        foreach($html->find('div') as $div){
            if($div->class == "graybox"){
                $link=""; $type="";
                foreach($div->find('div') as $d){
                    if($d->class == "col_img"){
                        foreach($d->find('a') as $l){
                            $link = $l->href;
                            echo $link."<br>";
                            if(strpos($link,"house")>0){
                                $type="House";
                            }
                            elseif(strpos($link,"apartment")>0){
                                $type="Apartment";
                            }
                            elseif(strpos($link,"plot")>0){
                                $type="Plot";
                            }
                            else{
                                $type = "Other";
                            }
                            echo $type."<br>";
                            foreach($l->find('img') as $im){
                                $img = $im->src;
                                echo $img."<br>";
                            }
                        }
                    }
                }

                $info = array();
                $ll = array();
                $count=0;
                $mod = 0;
                $target = $link;
                $html2 = new simple_html_dom();
                $html2->load_file($target);
                foreach($html2->find('div') as $div){
                    if ($div->class == "grid02 rc_leftcol"){
                        foreach ($div->find('li') as $li){
                            foreach($li->find('p') as $p){
                                if($mod == 1){
                                    $info[$count]=$p->innertext();
                                    $info[$count]=substr($info[$count],1);
                                    $info[$count]=str_replace(":","",$info[$count]);
                                    $count++;
                                   $mod=0;
                                }else{
                                    $mod=1;
                                }
                            }
                            $info[0]= str_replace("€","", $info[0]);
                            $info[0]= str_replace("Per Month","", $info[0]);
                            $info[0]= str_replace("&nbsp;","", $info[0]);
                            $info[0]= str_replace(",","", $info[0]);
                            $info[sizeof($info)-1]= str_replace(" ","", $info[sizeof($info)-1]);

                        }

                    }
                }
                foreach ($html2->find('script') as $script){
                    $inScript = $script->innertext();
                    if (strpos($inScript,"var myLatLng = new google.maps.LatLng(")>0){
                        $pos = strpos($inScript,"var myLatLng = new google.maps.LatLng(");
                        $inScript = substr($inScript,$pos+38);

                        $pos = strpos($inScript, ");");
                        $latLong = substr($inScript,0,$pos);

                        $ll=explode(",",$latLong);
                        //print_r($ll);
                    }
                }
                echo "infoooo...";
                print_r($info);
                echo "<br>".sizeof($info)."<br>";
                $sale=0;
                if (sizeof($info)>0) {
                    if (strcmp($info[1], "Sale") == 0) {
                        $sale = 1;
                    }
                    echo $sale."<br>";

                    if (strcmp($info[sizeof($info) - 1], "Nicosia") == 0) {
                        $sqlCheck = "SELECT * FROM propertynicosia WHERE propertynicosia.link='$link';";
                        $resultProperty = $conn->query($sqlCheck);
                        if ($resultProperty->num_rows == 0) {
                            $sqlInsertLatLong = "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$ll[0]' ,'$ll[1]') ";
                            if ($conn->query($sqlInsertLatLong) === TRUE) {
                                $sqlInsertProperty = "INSERT INTO propertyNicosia (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$info[2]','$info[0]','$info[3]','$img','$link','$conn->insert_id' );";
                                if ($conn->query($sqlInsertProperty) === TRUE) {
                                    echo "ok111";
                                } else {
                                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                                }
                            } else {
                                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
                            }

                        }
                    } elseif (strcmp($info[sizeof($info) - 1], "Limassol") == 0) {
                        $sqlCheck = "SELECT * FROM propertylimassol WHERE propertylimassol.link='$link';";
                        $resultProperty = $conn->query($sqlCheck);
                        if ($resultProperty->num_rows == 0) {
                            $sqlInsertLatLong = "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$ll[0]' ,'$ll[1]') ";
                            if ($conn->query($sqlInsertLatLong) === TRUE) {
                                $sqlInsertProperty = "INSERT INTO propertylimassol (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$info[2]','$info[0]','$info[3]','$img','$link','$conn->insert_id' );";
                                if ($conn->query($sqlInsertProperty) === TRUE) {
                                    echo "ok111";
                                } else {
                                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                                }
                            } else {
                                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
                            }

                        }

                    } elseif (strcmp($info[sizeof($info) - 1], "Larnaca") == 0) {
                        $sqlCheck = "SELECT * FROM propertylarnaca WHERE propertylarnaca.link='$link';";
                        $resultProperty = $conn->query($sqlCheck);
                        if ($resultProperty->num_rows == 0) {
                            $sqlInsertLatLong = "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$ll[0]' ,'$ll[1]') ";
                            if ($conn->query($sqlInsertLatLong) === TRUE) {
                                $sqlInsertProperty = "INSERT INTO propertylarnaca (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$info[2]','$info[0]','$info[3]','$img','$link','$conn->insert_id' );";
                                if ($conn->query($sqlInsertProperty) === TRUE) {
                                    echo "ok111";
                                } else {
                                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                                }
                            } else {
                                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
                            }

                        }

                    } elseif (strcmp($info[sizeof($info) - 1], "Paphos") == 0) {
                        $sqlCheck = "SELECT * FROM propertypaphos WHERE propertypaphos.link='$link';";
                        $resultProperty = $conn->query($sqlCheck);
                        if ($resultProperty->num_rows == 0) {
                            $sqlInsertLatLong = "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$ll[0]' ,'$ll[1]') ";
                            if ($conn->query($sqlInsertLatLong) === TRUE) {
                                $sqlInsertProperty = "INSERT INTO propertypaphos (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$info[2]','$info[0]','$info[3]','$img','$link','$conn->insert_id' );";
                                if ($conn->query($sqlInsertProperty) === TRUE) {
                                    echo "ok111";
                                } else {
                                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                                }
                            } else {
                                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
                            }

                        }

                    } elseif (strcmp($info[sizeof($info) - 1], "Famagusta") == 0) {
                        $sqlCheck = "SELECT * FROM propertyfamagusta WHERE propertyfamagusta.link='$link';";
                        $resultProperty = $conn->query($sqlCheck);
                        if ($resultProperty->num_rows == 0) {
                            $sqlInsertLatLong = "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$ll[0]' ,'$ll[1]') ";
                            if ($conn->query($sqlInsertLatLong) === TRUE) {
                                $sqlInsertProperty = "INSERT INTO propertyfamagusta (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$info[2]','$info[0]','$info[3]','$img','$link','$conn->insert_id' );";
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
        }

    }
$conn->close();
?>