<?php
include($_SERVER["DOCUMENT_ROOT"]."/Query/Admin/Wallet/Walletfetch.php");
//if($_SERVER["REQUEST_METHOD"] ==="POST"){
        /*$net= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['net'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['net'])))) : "";
        $sta= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['status'])))) ?? "";
        $dis= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['dis'])))) ?? "";
        $api= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['api'])))) ?? "";
        */
        $backendResponse = $newWallet->userWallet();
/*    }
else{
    echo "Only POST methoed is allowed";
    return;
}*/
?>