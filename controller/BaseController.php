<?php
include_once 'model/Basemodel.php';
//session_start();
//include_once 'CartController.php';
class BaseController{
    function loadView($view='home',$data=[]){
        //$cartLayout= isset($_SESSION['cart']) ? $_SESSION['cart'] : null; 
        //die;
        //print_r($cartLayout);
        $model = new BaseModel;
        $categories=$model->selectCategories();
        //print_r($categories);
        
        include_once 'view/layout.view.php';
    }

    function loadHtmlSortPrice ($view,$data){
        
        include_once "view/ajax/$view.view.php";
    }

}

?>