<?php

    $sqlVillages = "SELECT name FROM villagespaphos;";
    $resultVillages = $conn->query($sqlVillages);
    if ($resultVillages->num_rows > 0) {
        // output data of each row

        while($rowV = $resultVillages->fetch_assoc()) {
            $vill = $rowV["name"];

            $sqlProperty = "SELECT * FROM propertypaphos AS p, villagespaphos AS v WHERE p.location='$vill' and v.Name='$vill' and p.exactLoc=0 ".$queryVill;

            $resultProperty = $conn->query($sqlProperty);
            $rowsProperty = [];
            if ($resultProperty->num_rows > 0) {

                $countProperty = 0;
                while($rowP = $resultProperty->fetch_assoc()) {
                    $rowsProperty[$countProperty] = $rowP;
                    $countProperty++;
                }

                $rowsVillages[$countVillages]=$rowsProperty;
                $countVillages++;
            } else {
                //echo "0 results";
            }


        }
    } else {
        //echo "0 results";
    }

    $sqlHouse = "SELECT * FROM propertypaphos AS p, propertylocation AS l WHERE  p.exactLoc=l.locationID ".$queryVill;
    $resultHouses = $conn->query($sqlHouse);

    if ($resultHouses->num_rows > 0) {


        while($rowH = $resultHouses->fetch_assoc()) {
            $rowsHouses[$countHouses] = $rowH;
            $countHouses++;
        }

    } else {
        //echo "0 results";
    }
?>

