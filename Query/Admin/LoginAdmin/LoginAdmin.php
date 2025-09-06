<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class AdminLogin{
    public function userAdminLogin($email, $pass, $repass){
        try{
            global $adminTable;
            global $adminTableId;
            global $conn;

            if($email !="" && $pass !=""){
                //check if user already exist
                $q = $conn->prepare("SELECT Email,Fullname,Passwod FROM $adminTable WHERE Email=:em AND Passwod=:pp");
                $q->bindParam(':em', $email, PDO::PARAM_STR);
                $q->bindParam(':pp', $repass, PDO::PARAM_STR);
                $q->execute();
                $qrow=$q->rowCount();

                if($qrow > 0){
                    $qrow=$q->fetch(PDO::FETCH_ASSOC);

                    $email=$qrow['Email'];
                    $fname=$qrow['Fullname'];
                    $pass=$qrow['Passwod'];
            
                    $store = array(
                        "email"=>$email,
                        "fullname"=>$fname,
                    );

                    return json_encode(array("status"=>"success", "response"=>$store), true);
                }
                else{
                    return json_encode(array("status"=>"failed", "response"=>"
                    ?>  
                    <script>
                    window.location='/View/public/adminlog.php? ERROR'; 
                    </script> 
                    <?php 
                    exit();"), true);
                }
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/View/public/adminlog.php? ERRORPASS'; 
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

$newAdminLogin = new AdminLogin();
?>