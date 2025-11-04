<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Admin/Api/Apiedit.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["api_edit"])){
        $apin= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['apiname'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['apiname'])))) : "";
        $apik= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['apikey'])))) ?? "";
        $stat= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['status'])))) ?? "";
        $idx= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['idn'])))) ?? "";
        
        $backendResponse = $newApiedit->userApiedit($apin, $apik, $stat,$idx);
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