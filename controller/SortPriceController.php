<?php
include_once 'BaseController.php'; 
include_once 'model/SortPriceModel.php';
include_once 'model/TypeModel.php';
include_once 'helper/Sort-pager.php';

class SortPriceController extends BaseController{
    function sort(){
        $price = explode('-',$_GET['pricesend']);

        

        
       
       
   
       
        

        $page = (isset($_GET['sortPage']) && is_numeric($_GET['sortPage']) && $_GET['sortPage']!=0) ?
        abs($_GET['sortPage']) : 1;
        // print_r($page);
        // print_r('+++');
      

        $qty=6;
        $position=($page-1)*$qty;
        // print_r($position);
        // print_r('position');
       
        $totalItem = 0;

        $alias = isset($_GET['alias'])? $_GET['alias']:'';

        $model= new SortPriceModel;

        $minPrice=$price[0];
        $maxPrice=isset($price[1])? $price[1]:0;
        $typeModel= new TypeModel;
        $resul = $typeModel->selectProductByTypeLevel1Nav1($alias);
      
        if($maxPrice!=0){
            if(count($resul)!=0){
                $product=$model->countSelectProductByTypeLevel1Nav1($alias,$minPrice,$maxPrice,0);
                $totalItem=count($product);
                $product=$model->getSelectProductByTypeLevel1Nav1($alias,$minPrice,$maxPrice,0,$qty,$position);
               
                
               
              
            }
            else{
                $product=$model->countSelectProductByTypeLevel2Nav1($alias,$minPrice,$maxPrice,0);
                $totalItem=count($product);
                $product=$model->getSelectProductByTypeLevel2Nav1($alias,$minPrice,$maxPrice,0,$qty,$position);
               
                
               
                
            }
        }
        else{
            if(count($resul)!=0){
                $product=$model->countSelectProductByTypeLevel1Nav1($alias,0,0,$minPrice);
                $totalItem=count($product);
                $product=$model->getSelectProductByTypeLevel1Nav1($alias,0,0,$minPrice,$qty,$position);
                
                
              
               
            }
            else{
                $product=$model->countSelectProductByTypeLevel2Nav1($alias,0,0,$minPrice);
                $totalItem=count($product);
                $product=$model->getSelectProductByTypeLevel2Nav1($alias,0,0,$minPrice,$qty,$position);
           
                
                
                
            }
        }
        // print_r('------------');
        // print_r($product);
        // print_r('-------------');
        // print_r($_GET['pricesend']);
        // print_r('---');
        // print_r($_GET['alias']);
        // print_r('---');
        // print_r($_GET['id']);
        // print_r('---');
        
        // print_r($page);
        // print_r('page');
        // print_r($qty);
        // print_r('---');
        // print_r($totalItem);
        // print_r('---');
        $pager = new SortPager($totalItem,$page,$qty,3,$_GET['pricesend'],$_GET['alias'],$_GET['id'],$_GET['sortPage']);
        
        $sortPriceShowPagination=$pager->showPagination();
        // $currentpage=$pager->_currentPage;
        // echo $currentpage;
      
        $id=$_GET['id'];
        $data=[
            'product' => $product,
            'id' => $id,
            'sortPriceShowPagination' => $sortPriceShowPagination,
            'page' => $page,
        ];
        return $this->loadHtmlSortPrice('sort-price',$data);
    }
    

}   

?>