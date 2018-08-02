<?php
include_once 'DBConnect.php';

class TypeModel extends DBConnect{
    function selectProductByTypeLevel2Nav1($alias,$qty=0,$position=0){
        $sql="SELECT c.id as id_categories, c.name as name_categories,p.*, url.url
        FROM categories as c
        INNER JOIN
        
        (SELECT u.*
        FROM page_url as u
        WHERE u.url = '$alias') as url
        
        ON c.id_url = url.id
        INNER JOIN products as p
        on c.id=p.id_type
       
        ";
         if($qty !=0)
         {
             $sql.=" LIMIT $position,$qty";
         }
        // if($qty != 0)
        // $sql.=" LIMIT $position,$qty";
        return $this->loadMoreRows($sql);
    }


    function countSelectProductByTypeLevel2Nav1($alias, $minPrice=0, $maxPrice=0, $wherePrice=0){
        $sql="SELECT count(p.id) as qty
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
             $sql.="WHERE p.price > $wherePrice";
         }
        // if($qty != 0)
        // $sql.=" LIMIT $position,$qty";
        return $this->loadOneRow($sql);
    }



    function selectProductByTypeLevel1Nav1($alias,$qty=0,$position=0){
        // $sql="SELECT sub.id_parent, pr.*
        // FROM (SELECT pg.url, c.* 
        // FROM categories as c
        // INNER JOIN page_url as pg 
        // ON pg.id=c.id_url
        // WHERE pg.url = '$alias') as sub
        // INNER JOIN products as pr
        // ON sub.id = pr.id_type
        
        // ";

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
        // if($qty != 0)
        // $sql.=" LIMIT $position,$qty";
        if($qty !=0)
        {
            $sql.=" LIMIT $position,$qty";
        }
        return $this->loadMoreRows($sql);
    }


    function countSelectProductByTypeLevel1Nav1($alias, $minPrice=0, $maxPrice=0, $wherePrice=0){
   

        $sql = "SELECT count(p.id) as qty, p.*
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
            $sql.="WHERE p.price > $wherePrice";
        }
        return $this->loadOneRow($sql);
    }


    function menuLevelOfMenu($alias){
        $sql="SELECT c.* 
        FROM categories as c
        INNER JOIN page_url as pg
        ON c.id_url=pg.id
        WHERE pg.url='$alias'
        ";
        return $this->loadOneRow($sql);
    }

}

?>