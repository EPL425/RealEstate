<?php

    $servername = "localhost";
    $username = "root";
    $password = "261994akk";
    $dbname = "epl425db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

//    $sql = "SELECT * FROM property";
//    $result = $conn->query($sql);
//    $rows=[];
//    if ($result->num_rows > 0) {
//        // output data of each row
//        $count = 0;
//        while($row = $result->fetch_assoc()) {
//            $rows[$count] = $row;
//            $count++;
//            // print_r ($row);
//        }
//    } else {
//        echo "0 results";
//    }
//    $conn->close();


?>
