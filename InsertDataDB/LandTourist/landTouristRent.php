<?php
    include_once('../simple_html_dom.php');
    include("../mySQLQueries/openDB.php");

        $target_url = 'http://landtourist.com/property/index/?property_ref_id=&city_area%5B%5D=cityname_1&city_area%5B%5D=cityname_2&city_area%5B%5D=cityname_3&city_area%5B%5D=cityname_4&city_area%5B%5D=cityname_5&propertystatus=Rent&property_type=1&any_type=&prp_hidden_min_price=&prp_hidden_max_price=&property_sale_min_price=&property_sale_max_price=';
        $html = new simple_html_dom();
        $html->load_file($target_url);


        foreach ($html->find('div') as $propertyDiv) {
            if($propertyDiv->class == "thumbnail"){
                foreach($propertyDiv->find('img') as $img){
                    echo $img->src."<br>";
                }
                //echo $propertyDiv;
            }

        }
?>