<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Admin/Paymentgateway/Paymentedit.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["payment_edit"])){
        $net= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['net'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['net'])))) : "";
        $dis= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['dis'])))) ?? "";
        $api= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['api'])))) ?? "";
        $sta= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['sta'])))) ?? "";
        
        $backendResponse = $newPaymentedit->userPaymentedit($net, $dis, $api, $sta);
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