<?php
include_once 'DBConnect.php';

class SortPriceModel extends DBConnect{
    
    function getSelectProductByTypeLevel2Nav1($alias, $minPrice=0, $maxPrice=0, $wherePrice=0,$qty=0,$position=0)
    {
        $sql="SELECT p.*, url.url
        FROM categories as c
        INNER JOIN
        
        (SELECT u.*
        FROM page_url as u
        WHERE u.url = '$alias') as url
        
        ON c.id_url = url.id
        INNER JOIN products as p
        on c.id=p.id_type
       
        ";
         if($maxPrice!=0 && $minPrice!=0)
         {
             $sql.=" WHERE p.price BETWEEN $minPriceN AND $maxPrice";
         }
         if($wherePrice!=0){
             $sql.=" WHERE p.price > $wherePrice";
         }
         if($qty !=0)
         {
             $sql.=" LIMIT $position,$qty";
         }
         //print_r($sql);
        return $this->loadMoreRows($sql);
    }

    function getSelectProductByTypeLevel1Nav1($alias, $minPrice=0, $maxPrice=0, $wherePrice=0,$qty=0,$position=0){
   

        $sql = "SELECT p.*, ba.url
        FROM (SELECT c.id, a.url
                FROM (
                    SELECT c.id, pg.url
                    FROM categories as c
                    INNER JOIN page_url as pg 
                        ON pg.id=c.id_url
                    WHERE pg.url = '$alias')as a
                INNER JOIN categories as c
                ON a.id = c.id_parent OR a.id=c.id)as ba
        LEFT JOIN products as p
        ON ba.id = p.id_type
        
        ";
        
        if($maxPrice!=0 && $minPrice!=0)
        {
            $sql.=" WHERE p.price BETWEEN $minPrice AND $maxPrice";
        }
        if($wherePrice!=0){
            $sql.=" WHERE p.price > $wherePrice";
        }
        if($qty !=0)
         {
             $sql.=" LIMIT $position,$qty";
         }
         //print_r($sql);
        return $this->loadMoreRows($sql);

    }

    function countSelectProductByTypeLevel2Nav1($alias, $minPrice=0, $maxPrice=0, $wherePrice=0)
    {
        $sql="SELECT p.*, url.url
        FROM categories as c
        INNER JOIN
        
        (SELECT u.*
        FROM page_url as u
        WHERE u.url = '$alias') as url
        
        ON c.id_url = url.id
        INNER JOIN products as p
        on c.id=p.id_type
       
        ";
         if($maxPrice!=0 && $minPrice!=0)
         {
             $sql.=" WHERE p.price BETWEEN $minPriceN AND $maxPrice";
         }
         if($wherePrice!=0){
             $sql.=" WHERE p.price > $wherePrice";
         }
         
         //print_r($sql);
        return $this->loadMoreRows($sql);
    }

    function countSelectProductByTypeLevel1Nav1($alias, $minPrice=0, $maxPrice=0, $wherePrice=0){
   

        $sql = "SELECT p.*, ba.url
        FROM (SELECT c.id, a.url
                FROM (
                    SELECT c.id, pg.url
                    FROM categories as c
                    INNER JOIN page_url as pg 
                        ON pg.id=c.id_url
                    WHERE pg.url = '$alias')as a
                INNER JOIN categories as c
                ON a.id = c.id_parent OR a.id=c.id)as ba
        LEFT JOIN products as p
        ON ba.id = p.id_type
        
        ";
        
        if($maxPrice!=0 && $minPrice!=0)
        {
            $sql.=" WHERE p.price BETWEEN $minPrice AND $maxPrice";
        }
        if($wherePrice!=0){
            $sql.=" WHERE p.price > $wherePrice";
        }
        
         //print_r($sql);
        return $this->loadMoreRows($sql);

    }

}

?>