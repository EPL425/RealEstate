<?php
    include_once('../simple_html_dom.php');
    include("../mySQLQueries/openDB.php");

        $target_url = 'http://landtourist.com/map';
        $html = new simple_html_dom();
        $html->load_file($target_url);


        foreach ($html->find('script') as $script) {
            if ($pos1 = strpos($script,"var MapLatlong =")>0){
                $latLong = $script;
                $latLong = substr($latLong, $pos1+16);
                $pos1 = strpos($latLong, "]]';");
                $href = substr($latLong, $pos1);
                $latLong = substr($latLong,16, $pos1-16);

                $markers = explode("],[",$latLong);
                $links = explode("],[",$href);

                for ($i =0 ;$i < sizeof($markers); $i++){
                    $pos = strpos($markers[$i],",");

                    $markers[$i] = substr($markers[$i], $pos+2);
                    $pos = strpos($markers[$i],",");
                    $lan = substr($markers[$i],0, $pos-1);

                    $pos = strpos($markers[$i],"\",\"");
                    $lon = substr($markers[$i],$pos+3);
                    $lon = str_replace("\"","",$lon);
                    echo "lat=".$lan." lon=" .$lon."<br>";

                    $l = $links[$i];
                    $l = str_replace("\\","",$l);
                    $pos = strpos($l,"href=");
                    $l = substr($l,$pos+11);
                    $pos = strpos($l,"target");
                    $link = substr($l,0, $pos-7);
                    echo $link."<br>";

                    $pos = strpos($l,"src");
                    $l = substr($l, $pos+10);
                    $pos = strpos($l,"height");
                    $img = substr($l,0,$pos-7);
                    $img = "http://landtourist.com".$img;
                    echo $img."<br>";


                    $target = $link;
                    $html2 = new simple_html_dom();
                    $html2->load_file($target);
                    include("insertiPropery.php");


                }
            }
        }
    $conn->close();
?>