<?php

    include_once('simple_html_dom.php');
    for($i=0;$i<1;$i++) {
        $target_url = 'http://www.ktimatagora.com/properties-for-sale/?page='.$i;
        $html = new simple_html_dom();
        $html->load_file($target_url);

        foreach ($html->find('div') as $propertyDiv) {
            if($propertyDiv->class == "property_listing_small"){
                $count=0;
                foreach ($propertyDiv->find('a') as $propertyLink){
                    if($count == 1){
                        $link= $propertyLink->href;
                        echo $link."<br/>";
                        foreach($propertyLink->find('img') as $propertyImg){
                            $img = $propertyImg->src;
                            echo "http://www.ktimatagora.com/".$img."<br/>";
                        }
                        foreach($propertyLink->find('div') as $propertyPrice){
                            $priceSF=$propertyPrice;
                            echo $priceSF."<br/>";
                        }
                    }
                    $count++;
                }
                foreach($propertyDiv->find('div') as $propertyInfo){
                    if($propertyInfo->class == "info_type"){
                        $type = $propertyInfo;
                        echo $type;
                    }
                    if($propertyInfo->class == "info_beds"){
                        $beds = $propertyInfo;
                        echo $beds;
                    }
                    if($propertyInfo->class == "info_loc"){
                        $location = $propertyInfo;
                        echo $location;
                    }

                }
                echo "<br/>";
            }
        }

    }
?>

<!---->
<!--<div class="property_listing_small">-->
<!---->
<!---->
<!--    <a class="shortlistbtn" rel="tipsy" href="" onclick="$.cookie('L21221', 'inshortlist', { path: '/' });location.reload();return false;" original-title="add to shortlist"><i class="fa fa-plus-square"></i></a>-->
<!---->
<!---->
<!--    <a href="properties-for-sale/3-bedroom-apartment-flat-for-sale-in-engomi-2">-->
<!--        <img src="media/property-images/3_bedrooms_apartment_flat_for_sale_in_thumb_32.jpg" width="220" height="164" alt="">-->
<!--        <div class="price">For Sale : €395,000 <span></span>-->
<!--        </div>-->
<!--    </a>-->
<!---->
<!---->
<!---->
<!--    <div class="info">-->
<!--        <div class="info_type">Apartment-Flat </div>-->
<!--        <div class="info_beds">-->
<!--            3 bedrooms</div>-->
<!---->
<!--        <div class="info_loc">Nicosia , Engomi</div>-->
<!--        <div class="info_ref">Ref. L21221</div>-->
<!--    </div>-->
<!--</div>-->