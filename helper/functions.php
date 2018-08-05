<?php
function createToken(){
    $str="qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM01234567890";
    $token ='';
    for($i=1;$i<=30;$i++){
        $token .= substr($str,rand(0,strlen($str)-1),1);
    }
    return $token;
    
}

//echo createToken();
?>