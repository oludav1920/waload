<?php
include($_SERVER["DOCUMENT_ROOT"]."/Data/Query/Dataplanedit.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["data_planedit"])){
        $net= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['net'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['net'])))) : "";
        $pla= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['plan'])))) ?? "";
        $dis= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['dis'])))) ?? "";
        $api= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['api'])))) ?? "";
        $sta= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['status'])))) ?? "";
        
        $backendResponse = $newDataplanedit->userDataplanedit($net, $pla, $dis, $api, $sta);
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