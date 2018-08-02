<?php

include_once 'DBConnect.php';
class CartModel extends DBConnect {
    function selectProductById($id){
    $sql="SELECT p.*
    FROM products AS p
    WHERE p.id=$id
    ";

    return $this->loadOneRow($sql);
    }
}

?>