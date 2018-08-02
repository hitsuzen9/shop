<?php
include_once 'DBConnect.php';

class DetailModel extends DBConnect {
    function selectDetail ($alias){
        // $alias =explode('-',$alias);
        // $alias=substr($alias[count($alias)-1],0,strlen($alias[count($alias)-1])-5);
        $sql = "SELECT P.*
        FROM products AS p
        WHERE p.id_url=$alias

        ";
        return $this->loadOneRow($sql);
    }
    
    function selectRelatedDetail($alias){
        $sql ="SELECT p.*, u.url 
        FROM products AS p
        RIGHT JOIN 
        (SELECT p.id_type 
        FROM products AS p
        WHERE p.id_url = $alias) AS sub
        ON p.id_type=sub.id_type
        INNER JOIN page_url as u
        ON u.id=p.id_url
        ";
        return $this->loadMoreRows($sql);
    }
}

?>