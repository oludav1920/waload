<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Register{
    public function userRegister($fname, $uname, $email, $dob, $nation, $pass){
        try{
            global $usersTable;
            global $usersTableId;
            global $conn;

            if($fname !="" && $uname !="" && $email !="" && $dob !="" && $nation !="" && $pass !=""){
                //check if user already exist
                $q = $conn->prepare("SELECT Email FROM $usersTable WHERE Email=:em");
                $q->bindParam(':em', $email, PDO::PARAM_STR);
                $q->execute();
                if($q->rowCount() < 1){
                    //hash the password
                    $repass = md5($pass);
                    $otp = "";
                    $qq = $conn->prepare("INSERT INTO $usersTable(
                    Fullname, Username, Email, Dob, Nationality, Passwod, OTP ) VALUES(
                    :fn, :un, :em, :do, :na, :pd, :ot
                    )");
                    $qq->bindParam(':fn', $fname, PDO::PARAM_STR);
                    $qq->bindParam(':un', $uname, PDO::PARAM_STR);
                    $qq->bindParam(':em', $email, PDO::PARAM_STR);
                    $qq->bindParam(':do', $dob, PDO::PARAM_STR);
                    $qq->bindParam(':na', $nation, PDO::PARAM_STR);
                    $qq->bindParam(':pd', $repass, PDO::PARAM_STR);
                    $qq->bindParam(':ot', $otp, PDO::PARAM_STR);
                    $qq->execute();

                    if($qq){
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
                        return json_encode(array("status"=>"failed", "response"=>"oops!! something went wront"), true);
                    }
                }
                else{
                    return json_encode(array("status"=>"failed", "response"=>"
                    ?> 
                     <script>
                    window.location='/View/public/registration.php? Errorgg'; 
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
                window.location='/View/public/registration.php? error'; 
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

$newRegister = new Register();
?>