<?php
include_once "model/CartModel.php";
include_once "helper/Cart.php";
include_once "BaseController.php";
session_start();

class CartController extends BaseController{

    function shoppingCart(){
        $oldCart= isset($_SESSION['cart']) ? $_SESSION['cart'] : null; 
        $cart = new Cart($oldCart);
        $data = [
            'cart' => $cart,
        ];
        // print_r($cart);
        // die;
        return $this->loadView('cart',$data);
    }

    function addToCart(){
        $id=$_POST['idProduct'];
        $model= new CartModel;
        $result=$model->selectProductById($id);
        
        $qty = isset($_POST['quantity']) ? $_POST['quantity'] : 1; 

        $oldCart= isset($_SESSION['cart']) ? $_SESSION['cart'] : null; 
        $cart = new Cart($oldCart);
        
        $cart->add($result,$qty);
        $_SESSION['cart']=$cart;
        //print_r($_SESSION['cart']);

        echo "$qty"." "."$result->name";
    }
}


?>