<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/NetworkProvider/Roksub.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["register_user"])){
        $network=htmlspecialchars(trim(strtolower($_POST['net']))) ?? "";
        $phone=htmlspecialchars(trim($_POST['num'])) ?? "";
        $amount=(float)htmlspecialchars(trim($_POST['numb'])) ?? "";

        
        $backendResponse = $newRoksub->buyAirtime($network, $phone, $amount);
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