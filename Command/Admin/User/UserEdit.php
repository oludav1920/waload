<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Uedit{
    public function userUedit($fname, $uname, $email, $dob, $nation, $pass){
        try{
            global $usersTable;
            global $usersTableId;
            global $conn;

            if($fname !="" && $uname !="" && $email !="" && $dob !="" && $nation !="" && $pass !=""){
                //update the password
                $repass=md5($pass);
                $q=$conn->prepare("UPDATE $usersTable 
                SET Fullname=:fu, Username=:us, Email=:em, Dob=:do, Nationality=:na, Passwod=:pp 
                WHERE Email=:em");
                $q->bindparam(":fu", $fname, PDO::PARAM_STR);
                $q->bindparam(":us", $uname, PDO::PARAM_STR);
                $q->bindparam(":em", $email, PDO::PARAM_STR);
                $q->bindparam(":do", $dob, PDO::PARAM_STR);
                $q->bindparam(":na", $nation, PDO::PARAM_STR);
                $q->bindparam(":pp", $pass, PDO::PARAM_STR);
                $q->execute();

                    return json_encode(array("status"=>"success", "response"=>"
                     ?> 
                     <script>
                     window.location='/Admin/user/index.php'; 
                     </script> 
                     <?php 
                     exit(); 
                     "), true);
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/user/Useredit.php? error'; 
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

$newUedit = new Uedit();
?>
