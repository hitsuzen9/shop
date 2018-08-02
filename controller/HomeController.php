<?php
include_once 'BaseController.php';
include_once 'model/HomeModel.php';
class HomeController extends BaseController{

    function getHome(){
        $model = new HomeModel();
        $slide = $model->selectSlide();
        $featureProducts = $model->selectFeatureProduct();
        $topsellersProducts = $model->selectTopSellers();
       
        $onSale=$model->selectOnSale();
        // echo '<pre>';
        // print_r($onSale);
        // echo '</pre>';
        $data = [
            'slide' => $slide,
            'featureProducts' => $featureProducts,
            'topsellersProducts' => $topsellersProducts,
            'onSale' => $onSale,
        ];
        //print_r($featureProducts); die;

        return $this->loadView('home',$data);
    }



}



?>