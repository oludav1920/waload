<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Wallet/Walletedit.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["walletedit"])){
        $ema= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['ema'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['ema'])))) : "";
        $bal=(float) trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['bal'])))) ?? "";
        $tod=(float) trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['tod'])))) ?? "";
        $tos=(float) trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['tos'])))) ?? "";
        $cur= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['cur'])))) ?? "";
        
        $backendResponse = $newWalletedit->userWalletedit($ema, $bal, $tod, $tos, $cur);
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