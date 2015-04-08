<?php
    include_once('simple_html_dom.php');
    $target_url = 'https://aggelies.onlycy.com/index.php/categories/property';
    $html = new simple_html_dom();
    $html->load_file($target_url);

    $count = 0;

    foreach($html->find('a') as $link){
       if(strpos($link->href, "?start=")!== false){
            echo $link->href."<br/>";
       }
    }
?>