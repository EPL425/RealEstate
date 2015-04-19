<?php




//////////////////////////////////////////////////////NICOSIA////////////////////////////////////////////////////////////
    $sqlVillages = "SELECT name FROM villagesnicosia;";
    $resultVillages = $conn->query($sqlVillages);
    if ($resultVillages->num_rows > 0) {
        // output data of each row

        while($rowV = $resultVillages->fetch_assoc()) {
            $vill = $rowV["name"];

            $sqlProperty = "SELECT * FROM propertynicosia, villagesnicosia WHERE propertynicosia.location='$vill' and villagesnicosia.Name='$vill' and propertynicosia.exactLoc=0 ;";
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

    $sqlHouse = "SELECT * FROM propertynicosia, propertylocation WHERE  propertynicosia.exactLoc=1  and propertynicosia.id =propertylocation.propertyID ;";
    $resultHouses = $conn->query($sqlHouse);

    if ($resultHouses->num_rows > 0) {


        while($rowH = $resultHouses->fetch_assoc()) {
            $rowsHouses[$countHouses] = $rowH;
            $countHouses++;
        }

    } else {
        //echo "0 results";
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>

