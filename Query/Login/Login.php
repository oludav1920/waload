<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Login{
    public function userLogin($email, $pass, $repass){
        try{
            global $usersTable;
            global $usersTableId;
            global $conn;

            if($email !="" && $pass !=""){
                //check if user already exist
                $q = $conn->prepare("SELECT Email,Username,Nationality,Passwod FROM $usersTable WHERE Email=:em AND Passwod=:pp");
                $q->bindParam(':em', $email, PDO::PARAM_STR);
                $q->bindParam(':pp', $repass, PDO::PARAM_STR);
                $q->execute();
                $qrow=$q->rowCount();

                if($qrow > 0){
                    $qrow=$q->fetch(PDO::FETCH_ASSOC);

                    $email=$qrow['Email'];
                    $uname=$qrow['Username'];
                    $nation=$qrow['Nationality'];
                    $pass=$qrow['Passwod'];
                    //$pro=qrow['Profilepix'];

                    $store = array(
                        "email"=>$email,
                        "username"=>$uname,
                        "nation"=>$nation,
                        //"profilepix"=>$pro
                    );

                    return json_encode(array("status"=>"success", "response"=>$store), true);
                }
                else{
                    return json_encode(array("status"=>"failed", "response"=>"
                    ?>  
                    <script>
                    window.location='/View/public/login.php? ERROR'; 
                    </script> 
                    <?php 
                    exit();"), true);
                }
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/View/public/login.php? ERRORPASS'; 
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

$newLogin = new Login();
?>