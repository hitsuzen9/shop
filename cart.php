<?php

include_once 'controller/CartController.php';

$cart = new CartController;

if(isset($_POST['action']) && $_POST['action']=="update"){
    return $cart->updateCart();
}
elseif(isset($_POST['action']) && $_POST['action']=="delete"){
    return $cart->deleteCart();
}
else{
   $cart->addToCart();
}

?>