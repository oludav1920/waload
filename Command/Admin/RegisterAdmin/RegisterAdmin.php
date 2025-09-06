<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class AdminRegister{
    public function userAdminRegister($fname, $email, $code, $pass){
        try{
            global $adminTable;
            global $adminTableId;
            global $conn;

            if($fname !="" && $email !="" && $code !="" && $pass !=""){
                //check if user already exist
                $q = $conn->prepare("SELECT Email FROM $adminTable WHERE Email=:em");
                $q->bindParam(':em', $email, PDO::PARAM_STR);
                $q->execute();
                if($q->rowCount() < 1){
                    //hash the password
                    $repass = md5($pass);
                    $qq = $conn->prepare("INSERT INTO $adminTable(
                    Fullname, Email, Accesscode, Passwod ) VALUES(
                    :fn, :em, :co, :pd)");
                    $qq->bindParam(':fn', $fname, PDO::PARAM_STR);
                    $qq->bindParam(':em', $email, PDO::PARAM_STR);
                    $qq->bindParam(':co', $code, PDO::PARAM_STR);
                    $qq->bindParam(':pd', $repass, PDO::PARAM_STR);
                    $qq->execute();

                    if($qq){
                        return json_encode(array("status"=>"success", "response"=>"
                        ?> 
                        <script>
                        window.location='/View/public/adminlog.php'; 
                        </script> 
                        <?php 
                        exit();
                        "), true);
                    }
                    else{
                        return json_encode(array("status"=>"failed", "response"=>"oops!! something went wront"), true);
                    }
                }
                else{
                    return json_encode(array("status"=>"failed", "response"=>"
                    ?> 
                     <script>
                    window.location='/View/public/adminreg.php? Errorgg'; 
                    </script> 
                    <?php 
                    exit();
                    "), true);
                }
            }
            else{
                $output = array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/View/public/adminreg.php? error'; 
                </script> 
                <?php 
                exit();");
                return json_encode($output, true);
            }
        }
        catch(Exception $e){
            $output = array("status"=>"failed", "response"=>$e->getMessage());
            return json_encode($output, true);
        }
    }
}

$newAdminRegister = new AdminRegister();
?>