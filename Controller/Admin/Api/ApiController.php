<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Admin/Api/apiform.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["api_submit"])){
        $apin= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['apiname'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['apiname'])))) : "";
        $apik= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['apikey'])))) ?? "";
        $stat= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['status'])))) ?? "";
        
        $backendResponse = $newApi->userApi($apin, $apik, $stat);
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