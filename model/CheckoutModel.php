<?php
include_once "DBConnect.php";
class CheckoutModel extends DBConnect{
   function saveCustomer($name,$email,$gender,$address,$phone){
       $sql = "INSERT INTO customers(name,gender,email,address,phone)
        VALUE ('$name','$gender','$email','$address',$phone)
       ";
       $check = $this->executeQuery($sql);
       return $check ? $this->getLastId() : false;
      
   }
   function saveBill($idCustomer,$dateOrder,$total,$promtPrice,$paymentMethod,$note,$token,$tokenDate){
        $sql = "INSERT INTO bills(id_customer,date_order,total,promt_price,payment_method,note,token,token_date)
            VALUE ($idCustomer,'$dateOrder',$total,$promtPrice,'$paymentMethod','$note','$token','$tokenDate')
        ";
        $check = $this->executeQuery($sql);
        return $check ? $this->getLastId() : false;
   }

   function saveBillDetail($idBill,$idProduct,$qty,$price){
    $sql = "INSERT INTO bill_detail(id_bill,id_product,quantity,price)
    VALUE ($idBill,$idProduct,$qty,$price)
   ";
   return $this->executeQuery($sql);
   }
}

?>