<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Query/Admin/LoginAdmin/LoginAdmin.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["adminlog_user"])){
        $email= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['semail'])))) ?? "";
        $pass= $_POST['ypass'];
        $repass=md5($pass);
        $backendResponse = $newAdminLogin->userAdminLogin($email, $pass, $repass);
        $backendResponseDecode = json_decode($backendResponse, true);
        if($backendResponseDecode["status"] =="success"){
            $emailadmin = $backendResponseDecode["response"]["email"];
            $user = $backendResponseDecode["response"]["username"];
            $_SESSION['EMAIL']=$emailadmin;
            $_SESSION['FULLNAME']=$user;
            //$_SESSION['PROFILEPIX']=$pro;
            echo "?>  
                    <script>
                    window.location='/View/public/admindashbord.php'; 
                    </script> 
                    <?php 
                    exit();";
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