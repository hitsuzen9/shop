<?php
include_once 'BaseController.php';
include_once 'model/TypeModel.php';
include_once 'helper/pager.php';


class TypeController extends BaseController{

    function getType(){
        $alias = isset($_GET['alias']) ? $_GET['alias'] : header('Location:404.php');

        $page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page']!=0) ?
        abs($_GET['page']) : 1;
       
        $model = new TypeModel;
        $title=$alias;
        
        $qty=6;

        $price1 = 0;
        $price2 = 0;
        $price3 = 0;
        $price4 = 0;


        $position=($page-1)*$qty;

        

        $totalItem =0;
        
        $menuLevelOfMenu = $model->menuLevelOfMenu($alias);
       
        if($menuLevelOfMenu->id_parent == NULL){
            $result = $model->selectProductByTypeLevel1Nav1($alias);
            $price1 = $model->countSelectProductByTypeLevel1Nav1($alias,200000,10000000,0);
            $price2 = $model->countSelectProductByTypeLevel1Nav1($alias,10000000,20000000,0);
            $price3 = $model->countSelectProductByTypeLevel1Nav1($alias,20000000,30000000,0);
            $price4 = $model->countSelectProductByTypeLevel1Nav1($alias,0,0,30000000);
            $totalItem=count($result);
            if($result[0]->id==''){
                $position+=1;
               
                $result = $model->selectProductByTypeLevel1Nav1($alias,$qty,$position);
            }
            $result = $model->selectProductByTypeLevel1Nav1($alias,$qty,$position);
            
           
        }
        else{
            $result = $model->selectProductByTypeLevel2Nav1($alias);
            $price1 = $model->countSelectProductByTypeLevel1Nav1($alias,200000,10000000,0);
            $price2 = $model->countSelectProductByTypeLevel1Nav1($alias,10000000,20000000,0);
            $price3 = $model->countSelectProductByTypeLevel1Nav1($alias,20000000,30000000,0);
            $price4 = $model->countSelectProductByTypeLevel1Nav1($alias,0,0,30000000);
            $totalItem=count($result);
            if($result[0]->id==''){
                $position+=1;
                
                $result = $model->selectProductByTypeLevel2Nav1($alias,$qty,$position);
            }
            $result = $model->selectProductByTypeLevel2Nav1($alias,$qty,$position);
            
            
        }
        
        
        $pager = new Pager($totalItem,$page,$qty,3);
        $showPagination=$pager->showPagination();
        

        if(count($result)==0)
        {
            header('Location:404.php');
            return ;
        }
        
        $data=[
            'name' => $title,
            'result' => $result,
            'showPagination' => $showPagination,
            'price1' => $price1->qty,
            'price2' => $price2->qty,
            'price3' => $price3->qty,
            'price4' => $price4->qty,
        ];
        return $this->loadView('type',$data);
    }
}
?>