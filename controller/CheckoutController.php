<?php
include_once "BaseController.php";
include_once "model/CheckoutModel.php";

class CheckoutController extends BaseController{
    function getCheckout(){
        
        return $this->loadView('checkout');
    }
}

?>