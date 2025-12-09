<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Electricity/Buyelectricity.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["buycable"])){
        $electricitytype= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['electricitytype'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['electricitytype'])))) : "";
        $metertype= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['meternumber'])))) ?? "";
        $meternumber= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['meternumber'])))) ?? "";
        $amount= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['amount'])))) ?? "";
        $email= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['ema'])))) ?? "";
        
        $backendResponse = $newBuyelectricity->userBuyelectricity($electricitytype, $metertype, $meternumber, $amount,$email);
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