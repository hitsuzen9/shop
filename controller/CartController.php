<?php
include_once "model/CartModel.php";
include_once "helper/Cart.php";
include_once "BaseController.php";
session_start();

class CartController extends BaseController{

    function shoppingCart(){
        $oldCart= isset($_SESSION['cart']) ? $_SESSION['cart'] : null; 
        //print_r($_SESSION['cart']);
        $cart = new Cart($oldCart);
        $data = [
            'cart' => $cart,
        ];
        // print_r($cart);
        // die;
        return $this->loadView('cart',$data);
    }

    function addToCart(){

        $id=isset($_POST['idProduct']) ? $_POST['idProduct']:0;
        if($id==0){
            echo 'error';
            return;
        }
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

    function updateCart(){
        $id=isset($_POST['idProduct']) ? $_POST['idProduct']:0;
        if($id==0){
            echo 'error';
            return;
        }
        $model= new CartModel;
        $result=$model->selectProductById($id);
        
        $qty = isset($_POST['quantity']) ? $_POST['quantity'] : 1; 

        //print_r($result);

        $oldCart= isset($_SESSION['cart']) ? $_SESSION['cart'] : null; 
        $cart = new Cart($oldCart);
        
        $cart->update($result,$qty);
        $_SESSION['cart']=$cart;
        $res=[
        'discountPrice' => number_format($cart->items[$id]['discountPrice']),
        'totalPrice' => number_format($cart->totalPrice),
        'promtPrice' => number_format($cart->promtPrice),
        'totalQty' => $cart->totalQty
        ];
        echo json_encode($res);
    }

    function deleteCart(){
        $id=isset($_POST['idProduct']) ? $_POST['idProduct']:0;
        if($id==0){
            echo 'error';
            return;
        }
        
        

        
        $oldCart= isset($_SESSION['cart']) ? $_SESSION['cart'] : null; 

        $cart = new Cart($oldCart);
        
        $cart->removeItem($id);

        $_SESSION['cart']=$cart;
        $res=[
        
        'totalPrice' => number_format($cart->totalPrice),

        'totalQty' => $cart->totalQty
        ];
        echo json_encode($res);
    }
}


?>