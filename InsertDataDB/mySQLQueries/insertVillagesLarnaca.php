<?php
    include("openDB.php");
    $village = $_POST["village"];
    $latidute = $_POST["k"];
    $longitude = $_POST["D"];

    $sqlInsertVill = "INSERT INTO villageslarnaca (Name, Latitude, Longitude)VALUES ('$village', '$latidute', '$longitude' );";
    echo $village;
    if ($conn->query($sqlInsertVill) === TRUE) {
        echo "ok";
    } else {
        echo "Error: " . $sqlInsertVill . "<br>" . $conn->error;
    }

    $conn->close();

?>