<?php
include($_SERVER["DOCUMENT_ROOT"]."/Cable/Query/Cableplanedit.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["cable_planedit"])){
        $nato= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['net'])))) ?? "";
        $stato= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['status'])))) ?? "";
        $disto= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['dis'])))) ?? "";
        $ato= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['api'])))) ?? "";
        $idx= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['idn'])))) ?? "";
        
        $backendResponse = $Cableplanedit->Cableplanedit($nato, $stato, $disto, $ato, $idx);
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