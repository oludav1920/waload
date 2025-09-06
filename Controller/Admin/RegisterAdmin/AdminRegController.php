<?php
include($_SERVER["DOCUMENT_ROOT"]."/RegisterAdmin/Command/RegisterAdmin.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["adminreg_user"])){
        $fname= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['fname'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['fname'])))) : "";
        $email= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['semail'])))) ?? "";
        $code= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['code'])))) ?? "";
        $pass= $_POST['ypass'];
        
        $backendResponse = $newAdminRegister->userAdminRegister($fname, $email, $code, $pass);
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