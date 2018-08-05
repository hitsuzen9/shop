<?php
include_once "BaseController.php";
include_once "model/CheckoutModel.php";
include_once "helper/Cart.php";
include_once "helper/functions.php";
include_once "helper/phpMailer/mailer.php";

session_start();

class CheckoutController extends BaseController{

    function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    function getCheckout(){
        
        return $this->loadView('checkout');
    }

    function postCheckout(){
        print_r($_POST);
        $name= $_POST['fullname'];
        $gender= $_POST['gender'];
        $address= $_POST['address'];
        $phone= $_POST['phone'];
        $email= $_POST['email'];
        $note= $_POST['note'];
        $paymentMethod = $_POST['payment_method'];

        $model = new CheckoutModel;
        $idCustomer = $model->saveCustomer($name,$email,$gender,$address,$phone);
        $cart=$_SESSION['cart'];
     
        if($idCustomer==true){
            //echo '1111';
            
            

            $dateOrder= date('Y-m-d');
            $total= $cart->totalPrice;
            $promtPrice= $cart->promtPrice;
            $token= createToken();
            $tokenDate=date('Y-m-d H:i:s');
            $tokenTime = strtotime($tokenDate);
            $idBill = $model->saveBill($idCustomer,$dateOrder,$total,$promtPrice,$paymentMethod,$note,
            $token,$tokenDate);
            if($idBill){
                //print_r($cart->items);
                foreach($cart->items as $key => $it){
                    
                $idProduct= $key;
                
                $qty=$it['qty'];
                //echo '33';
                $price=$it['price'];

                $idBill = $model->saveBillDetail($idBill,$idProduct,$qty,$price);
                }
                $link="http://localhost/shop1701/$token/$tokenTime";
                $emailReceive=$email;
                $nameReceive=$name;
                $subject= "SHOP1701 - Xác nhận đơn hàng";
                $content="
                Chào bạn $name,
                <br/>
                -----
                <br/>
                Vui lòng nhấp vào link sau để xác nhận đơn hàng của bạn:
                link: $link

                ";

                sendMail($emailReceive,$nameReceive,$subject,$content);

                unset($_SESSION['cart']);
                $_SESSION['message_success']='Đặt hàng thành công vui lòng kiểm tra email để xác nhận';
                
            }
        }
        else{
            //echo 'có lỗi vui lòng nhập lại';
            $_SESSION['message_error']='Đặt hàng không thành công vui lòng kiểm tra email để xác nhận';
        }
        header('Location:checkout.php');
    }
}

?>