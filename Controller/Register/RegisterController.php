<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Register/Register.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["register_user"])){
        $fname= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['fname'])))) ? trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['fname'])))) : "";
        $uname= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['uname'])))) ?? "";
        $email= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['semail'])))) ?? "";
        $dob= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['dob'])))) ?? "";
        $nation= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['country'])))) ?? "";
        $pass= $_POST['ypass'];
        
        $backendResponse = $newRegister->userRegister($fname, $uname, $email, $dob, $nation, $pass);
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