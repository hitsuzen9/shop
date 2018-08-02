<?php
//include_once 'BaseController.php';
//include_once 'model/RangePriceModel.php';

// class RangePrice extends BaseController{
//     function rangePrice(){

//     }
// }

$rangePrice= explode(' ',$_GET['rangePriceSend']);
$pageUrl = $_GET['pageUrl'];
echo $pageUrl;
print_r($rangePrice);
?>