<?php
include_once 'BaseController.php';
include_once 'model/DetailModel.php';

class DetailController extends BaseController{
    function getDetail(){
        $alias = isset($_GET['id']) ? $_GET['id'] : header('Location:404.php');
        //print_r($alias);
        $model = new DetailModel;
        $result = $model->selectDetail($alias);
        $related_detail = $model->selectRelatedDetail($alias);
        //print_r($related_detail);
        $data = [
            'result' => $result,
            'related_detail' => $related_detail,
            'alias' => $alias,
        ];
        return $this->loadView('detail',$data);
    }
}


?>