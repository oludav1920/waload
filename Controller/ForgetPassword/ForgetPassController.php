<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/ForgetPassword/forgetpassword.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["pass_user"])){
        $email= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['semail'])))) ?? "";
        $pass= $_POST['ypass'];
        $passy=$_POST['passy'];
        $otp=$_POST['otp'];
        
        $backendResponse = $newPass->userPass($email, $pass, $passy, $otp);
        $backendResponseDecode = json_decode($backendResponse, true);
        if($backendResponseDecode["status"] =="success"){
            echo $backendResponseDecode["response"];
            return;
        }
        else{
            echo $backendResponseDecode["response"];
            return;
        }
    }
    else{
        echo "error";
        return;
    }
}
else{
    echo "Only POST methoed is allowed";
    return;
}
?>