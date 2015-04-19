<?php
$sqlVillages = "SELECT name FROM villagesfamagusta;";
$resultVillages = $conn->query($sqlVillages);
if ($resultVillages->num_rows > 0) {
    // output data of each row

    while($rowV = $resultVillages->fetch_assoc()) {
        $vill = $rowV["name"];

        $sqlProperty = "SELECT * FROM propertyfamagusta, villagesfamagusta WHERE propertyfamagusta.location='$vill' and villagesfamagusta.Name='$vill' and propertyfamagusta.exactLoc=0 ;";
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

$sqlHouse = "SELECT * FROM propertyfamagusta, propertylocation WHERE  propertyfamagusta.exactLoc=1  and propertyfamagusta.id =propertylocation.propertyID ;";
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