<?php
include_once 'controller/SortPriceController.php';


echo '<base href="http://localhost/shop1701/">';
$sortprice= new SortPriceController;



return $sortprice->sort();






?>