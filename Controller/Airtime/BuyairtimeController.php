<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Airtime/BuyAirtime.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["buyairtime"])){
        $net= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['dnet'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['net'])))) : "";
        $num= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['dnum'])))) ?? "";
        $amount= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['dnumb'])))) ?? "";
        $email= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['ema'])))) ?? "";
        
        $backendResponse = $newBuyairtime->userBuyairtime($net, $num, $amount,$email);
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