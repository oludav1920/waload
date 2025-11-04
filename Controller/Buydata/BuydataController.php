<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Admin/Airtime/airtimePlan.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["buydata"])){
        $net= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['dnet'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['net'])))) : "";
        $dnum= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['dnum'])))) ?? "";
        $dnumb= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['dnumb'])))) ?? "";
        $email= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['ema'])))) ?? "";
        
        $backendResponse = $newBuydata->userBuydata($net, $num, $numb,$email);
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