<?php


    $price="";
    $count=0;
    $info = array();
    foreach ($html2->find('span') as $pr){
        if ($pr->class=="price"){
            $price = $pr->innertext();
            $price = str_replace(",","",$price);
            $price = str_replace("€","",$price);
            $price = str_replace(" ","",$price);
            echo $price."<br>";
        }
        if ($pr->class == "info"){
            $info[$count]= $pr->innertext();
            $info[$count]= str_replace(" ","",$info[$count]);
            $info[$count]= str_replace("\n","",$info[$count]);
            $info[$count]= str_replace("\t","",$info[$count]);
            $count++;
        }
    }
    print_r($info);

    $sale=0;
    if(strcmp($info[3],"for Sale")==0){
        $sale=1;
    }
    $type = "";
    if(strcmp($info[1],"House")==0){
        $type="House";
    }
    elseif (strcmp($info[1],"Apartment")==0){
        $type="Apartment";
    }
    elseif(strcmp($info[1],"Plot")==0){
        $type="Plot";
    }
    else{
        $type = "Other";
    }



    if (strcmp($info[4],"Nicosia")==0) {
        $sqlCheck="SELECT * FROM propertynicosia WHERE propertynicosia.link='$link';";
        $resultProperty = $conn->query($sqlCheck);
        if ($resultProperty->num_rows == 0) {
            $sqlInsertLatLong= "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$lan' ,'$lon') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {
                $sqlInsertProperty = "INSERT INTO propertyNicosia (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$info[6]','$price','$info[5]','$img','$link','$conn->insert_id'  );";
                if ($conn->query($sqlInsertProperty) === TRUE) {
                    echo "ok111";
                }else {
                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                }
            }else {
                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
            }

        }
    }elseif (strcmp($info[4],"Limassol")==0) {
        $sqlCheck="SELECT * FROM propertylimassol WHERE propertylimassol.link='$link';";
        $resultProperty = $conn->query($sqlCheck);
        if ($resultProperty->num_rows == 0) {
            $sqlInsertLatLong= "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$lan' ,'$lon') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {
                $sqlInsertProperty = "INSERT INTO propertylimassol (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$info[6]','$price','$info[5]','$img','$link','$conn->insert_id'  );";
                if ($conn->query($sqlInsertProperty) === TRUE) {
                    echo "ok111";
                }else {
                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                }
            }else {
                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
            }

        }

    }elseif (strcmp($info[4],"Larnaca")==0) {
        $sqlCheck="SELECT * FROM propertylarnaca WHERE propertylarnaca.link='$link';";
        $resultProperty = $conn->query($sqlCheck);
        if ($resultProperty->num_rows == 0) {
            $sqlInsertLatLong= "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$lan' ,'$lon') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {
                $sqlInsertProperty = "INSERT INTO propertylarnaca (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$info[6]','$price','$info[5]','$img','$link','$conn->insert_id' );";
                if ($conn->query($sqlInsertProperty) === TRUE) {
                    echo "ok111";
                }else {
                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                }
            }else {
                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
            }

        }

    }elseif (strcmp($info[4],"Paphos")==0) {
        $sqlCheck="SELECT * FROM propertypaphos WHERE propertypaphos.link='$link';";
        $resultProperty = $conn->query($sqlCheck);
        if ($resultProperty->num_rows == 0) {
            $sqlInsertLatLong= "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$lan' ,'$lon') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {
                $sqlInsertProperty = "INSERT INTO propertypaphos (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$info[6]','$price','$info[5]','$img','$link','$conn->insert_id'  );";
                if ($conn->query($sqlInsertProperty) === TRUE) {
                    echo "ok111";
                }else {
                    echo "Error: " . $sqlInsertProperty . "<br>" . $conn->error;
                }
            }else {
                echo "Error: " . $sqlInsertLatLong . "<br>" . $conn->error;
            }

        }

    }elseif (strcmp($info[4],"Famagusta")==0) {
        $sqlCheck="SELECT * FROM propertyfamagusta WHERE propertyfamagusta.link='$link';";
        $resultProperty = $conn->query($sqlCheck);
        if ($resultProperty->num_rows == 0) {
            $sqlInsertLatLong= "INSERT INTO propertyLocation(Latitude, Longitude) VALUES ('$lan' ,'$lon') " ;
            if ($conn->query($sqlInsertLatLong) === TRUE) {
                $sqlInsertProperty = "INSERT INTO propertyfamagusta (type, forSale, bedrooms,price, location, img, link, exactLoc)VALUES ('$type','$sale', '$info[6]','$price','$info[5]','$img','$link','$conn->insert_id'  );";
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
echo "telos <br>";

?>