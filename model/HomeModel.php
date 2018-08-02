<?php
include_once 'DBConnect.php';

class HomeModel extends DBConnect{

    function selectSlide(){
        $sql="SELECT * FROM slide WHERE status=1";
        return $this->loadMoreRows($sql);
    }

    function selectFeatureProduct(){
        $sql="SELECT p.*,u.url
        FROM products  as p
        INNER JOIN page_url as u
        ON p.id_url = u.id
        WHERE status=1";
        return $this->loadMoreRows($sql);
    }

    function selectTopSellers(){
        $sql="SELECT p.*, u.url, sum(bd.quantity) as tongsoluong
        FROM products as p
        INNER JOIN bill_detail as bd
        ON p.id=bd.id_product
        INNER JOIN page_url as u
        ON u.id=p.id_url
        GROUP BY bd.id_product
        ORDER BY tongsoluong DESC
        LIMIT 0,10
        ";
        return $this->loadMoreRows($sql);
    }

    function selectOnSale(){
        $sql="SELECT p.*, u.url
        FROM products as p
        INNER JOIN page_url as u
        ON p.id_url=u.id
        WHERE promotion_price!=0
        ";
        return $this->loadMoreRows($sql);
    }
}   

?>