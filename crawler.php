<?php
header("Content-Type: text/html; Charset=UTF-8");
    include_once('simple_html_dom.php');
    $target_url = 'https://aggelies.onlycy.com/index.php/categories/property?start=15';
    $html = new simple_html_dom();
    $html->load_file($target_url);

     $count = 0;   
   
    foreach($html->find('a') as $link){
       
        if (strpos($link->href, "/ad/") !== false)
            echo $link->href;
            $target= "https://aggelies.onlycy.com".$link->href;
            $html2 = new simple_html_dom();
            $html2->load_file($target);
            //echo $target."<br />";
            echo $count."<br />";

            if ($count % 3 == 0){
                foreach($html2->find('div') as $link1){
                    if($link1->class == "geo_coordinates") {
                        echo $link1 . "<br />";
                    }
                    if($link1->class == "price_wrap"){
                        echo $link1."<br/>";
                    }
                }

            } 
        
        $count++;
    }

   
    //header("location:  https://aggelies.onlycy.com/index.php/categories/property/ad/plots-for-sale,12/for-sale-1-000-m2-plot-in-agios-tychonas-limassol,1575");
?>