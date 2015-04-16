<?php
    include_once('simple_html_dom.php');
    $target_url = 'http://www.fitzgeraldcyprus.com/en/property-detailed-view/property/1721.html';
    $html = new simple_html_dom();
    $html->load_file($target_url);

    $count = 0;

    foreach($html->find('script') as $link){

            echo $link->innertext()."<br/>";

    }
?>