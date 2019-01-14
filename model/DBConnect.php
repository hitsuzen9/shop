<?php 
class DBConnect{
    private $connect;
    function __construct($dbName ='apple',$user='root',$password='teovati78'){
        try{
            $this->connect = new PDO("mysql:host=localhost;dbname=$dbName",$user,$password);
            $this->connect->exec('set names utf8');
        }
        catch(Exception $e){
            echo $e->getMessege();
            die;
        }
    }
    function setStatement($query,$params = [] ){
        $stmt = $this->connect->prepare($query);
        foreach($params as $key => $p){
            $stmt->blindValue(($key+1),$p);
        }
        return $stmt;
    }
    //exec () thực hiện một câu lệnh SQL trong một cuộc gọi hàm đơn, trả về số hàng bị ảnh hưởng bởi câu lệnh.
    // exec () không trả về kết quả từ câu lệnh SELECT. Đối với một câu lệnh SELECT mà bạn chỉ cần phát hành 
    // một lần trong suốt chương trình của bạn, hãy xem xét việc phát hành PDO :: query () 
    // Đối với một câu lệnh mà bạn cần phát hành nhiều lần, 
    // hãy chuẩn bị một đối tượng PDOStatement với 
    // PDO :: prepare () và đưa ra câu lệnh với PDOStatement :: execute () 

    //INSERT | UPDATE | DELETE
    function executeQuery($query, $params=[]){
        $stmt = $this->setStatement($query,$params);
        return $stmt->execute();
    }

    //SELECT 1 ROW
    function loadOneRow($query, $params=[]){
        $stmt = $this->setStatement($query,$params);
        $result = $stmt->execute();
        if($result){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    //SELECT more ROW
    function loadMoreRows($query, $params=[]){
        $stmt = $this->setStatement($query,$params);
        $result = $stmt->execute();
        if($result){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    function getLastId(){
        return $this->connect->lastInsertId();
    }
}



?>