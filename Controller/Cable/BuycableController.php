<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Cable/Buycable.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["buycable"])){
        $cabletype= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['cabletype'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['cabletype'])))) : "";
        $cablenumber= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['cablenumber'])))) ?? "";
        $amount= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['amount'])))) ?? "";
        $email= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['ema'])))) ?? "";
        
        $backendResponse = $newBuycable->userBuycable($cabletype, $cablenumber, $amount,$email);
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