<?php

include_once('simple_html_dom.php');
    for($i=0;$i<765;$i+=15) {
        $target_url = 'https://aggelies.onlycy.com/index.php/categories/property?start=' . $i;
        $html = new simple_html_dom();
        $html->load_file($target_url);

        $count = 0;
        $propertyLink = "";
        foreach ($html->find('tr') as $newLink) {
            foreach ($newLink->find('td') as $td) {
                if ($td->class == "icon first") {
                    foreach ($td->find('a') as $property) {
                        $propertyLink = $property->href;
                        echo "SRC--->" . $property->href . "<br/>";
                    }
                    foreach ($td->find('img') as $propertyIMG) {
                        echo "IMG--->" . $propertyIMG->src . "<br/>";
                    }
                } elseif ($td->class == "name") {
                    foreach ($td->find('h3') as $propertyTitle1) {
                        foreach ($propertyTitle1->find('a') as $propertyTitle)
                            echo "TITLE--->" . $propertyTitle . "<br/>";
                    }
                    foreach ($td->find('span') as $propertyStatus) {
                        if ($propertyStatus->class = "type_button bt_exchange") {
                            echo "STATUS--->" . $propertyStatus . "</br>";
                        }
                    }
                } elseif ($td->class == "region") {
                    foreach ($td->find('a') as $propertyLocation) {
                        echo "LOCATION--->" . $propertyLocation . "<br/>";
                    }
                } elseif ($td->class == "price") {
                    $propertyPrice = $td;
                    echo "PRICE--->" . $propertyPrice . "<br/>";
                } elseif ($td->class == "date_start") {
                    $propertyDate = $td;
                    echo "DATE--->" . $propertyDate . "<br/>";
                } elseif ($td->class == "date_exp last") {

                } else {
                    echo "INFO--->" . $td . "<br/>";
                }

            }
            $target = "https://aggelies.onlycy.com" . $propertyLink;
            $html2 = new simple_html_dom();
            $html2->load_file($target);
            foreach ($html2->find('div') as $link1) {
                if ($link1->class == "geo_coordinates") {
                    echo $link1 . "<br />";
                }

            }
            echo "<br/>";
        }
    }
?>


<!--        foreach ($html->find('a') as $link) {-->
<!--            if (strpos($link->href, "/ad/") !== false) {-->
<!--                if ($count % 2 == 0) {-->
<!--                    echo $link->href . "<br />";-->
<!--                    $target = "https://aggelies.onlycy.com" . $link->href;-->
<!--                    $html2 = new simple_html_dom();-->
<!--                    $html2->load_file($target);-->
<!--                    foreach ($html2->find('div') as $link1) {-->
<!--                        if ($link1->class == "geo_coordinates") {-->
<!--                            echo $link1 . "<br />";-->
<!--                        }-->
<!--                        if ($link1->class == "price_wrap") {-->
<!--                            echo $link1 . "<br/>";-->
<!--                        }-->
<!--                        if ($link1->class == "title_top info") {-->
<!--                            echo $link1 . "<br/>";-->
<!--                        }-->
<!--                    }-->
<!--                    $sum++;-->
<!---->
<!--                }-->
<!--                $count++;-->
<!--            }-->
<!---->
<!--        }-->




<!--http://www.phpro.org/tutorials/Storing-Images-in-MySQL-with-PHP.html-->