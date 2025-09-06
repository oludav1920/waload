<?php
include($_SERVER["DOCUMENT_ROOT"]."/Airtime/Query/Airtimefetch.php");
//if($_SERVER["REQUEST_METHOD"] ==="POST"){
        /*$net= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['net'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['net'])))) : "";
        $sta= trim(htmlspecialchars(strtoupper(str_replace(","," ",$_POST['status'])))) ?? "";
        $dis= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['dis'])))) ?? "";
        $api= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['api'])))) ?? "";
        */
        $backendResponse = $newAirtime->userAirtime();
/*    }
else{
    echo "Only POST methoed is allowed";
    return;
}*/
?>