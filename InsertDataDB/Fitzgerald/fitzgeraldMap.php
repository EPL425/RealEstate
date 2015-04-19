<?php
    include_once('../simple_html_dom.php');
    include("../mySQLQueries/openDB.php");

    $target_url = 'http://www.fitzgeraldcyprus.com/en/property/map-search/map.html';
    $html = new simple_html_dom();
    $html->load_file($target_url);
    $str = $html->find('script');

    foreach( $str as $i){
        $markers = $i->innertext();

        while (strpos($markers,"var myMarker_")>0) {

            $pos1 = strpos($markers, "var myMarker_");
            $markers = substr($markers, $pos1);
            $pos1 = strpos($markers, "new google.maps.LatLng(");
            $markers = substr($markers, $pos1 + 23);
            $par = strpos($markers, ")");

            $location = substr($markers, 0, $par);
            $comma = strpos($location, ",");
            $lat = substr($location, 0, $comma);
            echo $lat."<br>";
            $long = substr($location,$comma+1);
            echo $long."<br>";

            $par = strpos($markers, "src=\"");
            $markers = substr($markers, $par + 5);

            $par = strpos($markers, "\"");
            $img = substr($markers, 0, $par);
            echo $img . "<br>";

            $par = strpos($markers, "href=\"");
            $markers = substr($markers, $par + 6);

            $par = strpos($markers, "\"");
            $link = substr($markers, 0, $par);
            $link =  "http://www.fitzgeraldcyprus.com".$link;
            echo $link . "<br>";

            $target = $link;
            $html2 = new simple_html_dom();
            $html2->load_file($target);

            include("getPropInf.php");


        }


        echo "<br>------------------------------------------------------------------------<br>";

    }
$conn->close();
?>