<?php
include_once 'DBConnect.php';

class BaseModel extends DBConnect{
    function selectCategories(){
        $sql = "SELECT menu.name, menu.icon, url.url, GROUP_CONCAT(sub.name, '::' ,sub.url ) as submenu  
        FROM (SELECT * FROM`categories` WHERE id_parent IS Null) AS menu
        LEFT JOIN ( SELECT c.*, url.url FROM `categories` as c 
                   INNER JOIN page_url as url
                   ON c.id_url = url.id
                   WHERE id_parent IS NOT Null ) AS sub
        ON menu.id=sub.id_parent
        INNER JOIN page_url as url
        ON url.id = menu.id_url
        GROUP BY menu.name
        ORDER BY submenu DESC";
        return $this->loadMoreRows($sql);
    }
}



?>