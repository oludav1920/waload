<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Login/Query/Login.php");
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    if(isset($_POST["login_user"])){
        $email= trim(htmlspecialchars(strtolower(str_replace(","," ",$_POST['semail'])))) ?? "";
        $pass= $_POST['ypass'];
        $repass=md5($pass);
        $backendResponse = $newLogin->userLogin($email, $pass, $repass);
        $backendResponseDecode = json_decode($backendResponse, true);
        if($backendResponseDecode["status"] =="success"){
            $emailret = $backendResponseDecode["response"]["email"];
            $user = $backendResponseDecode["response"]["username"];
            $nation = $backendResponseDecode["response"]["nation"];
            $_SESSION['EMAIL']=$emailret;
            $_SESSION['USERNAME']=$user;
            $_SESSION['NATIONALITY']=$nation;
            //$_SESSION['PROFILEPIX']=$pro;
            echo "?>  
                    <script>
                    window.location='/View/public/vtuindex.php'; 
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