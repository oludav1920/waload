<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Pass{
    public function userPass($email, $pass, $passy, $otp){
        try{
            global $usersTable;
            global $usersTableId;
            global $conn;

            if($email !="" && $pass !="" && $passy !="" && $otp !=""){
                //update the password
                if($pass == $passy){
                $repass=md5($pass);
                $q=$conn->prepare("UPDATE $usersTable SET Passwod=:pp WHERE Email=:em AND OTP=:ot");
                $q->bindparam(":pp", $repass, PDO::PARAM_STR);
                $q->bindparam(":em", $email, PDO::PARAM_STR);
                $q->bindparam(":ot", $otp, PDO::PARAM_STR);
                $q->execute();

                    return json_encode(array("status"=>"success", "response"=>"
                     ?> 
                     <script>
                     window.location='/View/public/login.php'; 
                     </script> 
                     <?php 
                     exit(); 
                     "), true);
                }
                else{
                    return json_encode(array("status"=>"failed", "response"=>"
                    ?>  
                    <script>
                    window.location='/View/public/resetp2.php? passerror'; 
                    </script> 
                    <?php 
                    exit();"), true);
                }
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/View/public/resetp2.php? errorpass'; 
                </script> 
                <?php 
                exit();"), true);
            }
        }
        catch(Exception $e){
            $output = array("status"=>"failed", "response"=>$e->getMessage());
            return json_encode($output, true);
        }
    }
}

$newPass = new Pass();
?>
