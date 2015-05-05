<?php

$sqlVillages = "SELECT name FROM villagesnicosia ;";

$resultVillages = $conn->query($sqlVillages);
if ($resultVillages->num_rows > 0) {
    // output data of each row

    while($rowV = $resultVillages->fetch_assoc()) {
        $vill = $rowV["name"];

        $sqlProperty = "SELECT * FROM propertynicosia AS p, villagesnicosia AS v WHERE p.location='$vill' and v.Name='$vill' and p.exactLoc=0".$queryVill;
        //echo $sqlProperty."<br>";
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////// HOUSE ///////////////////////////////////////////////

    $sqlHouse = "SELECT * FROM propertynicosia AS p, propertylocation AS l WHERE  p.exactLoc=l.locationID ".$queryVill;
    $resultHouses = $conn->query($sqlHouse);

    if ($resultHouses->num_rows > 0) {


        while($rowH = $resultHouses->fetch_assoc()) {
            $rowsHouses[$countHouses] = $rowH;
            $countHouses++;
        }

    } else {
       // echo "0 results";
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>

