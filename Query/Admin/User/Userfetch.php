<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Dis{
    public function userDis(){
        try{
            global $usersTable;
            global $usersTableId;
            global $conn;  

                //check if user already exist
                $q = $conn->prepare("SELECT * FROM $usersTable ORDER BY Index_Id ASC");
                $q->execute();
                $qrow=$q->rowCount();

                $any = [];
                if($qrow > 0){
                    while($qrow=$q->fetch(PDO::FETCH_ASSOC)){
                        $nato=$qrow['Fullname'];
                        $stato=$qrow['Username'];
                        $disto=$qrow['Email'];
                        $ato=$qrow['Dob'];
                        $atan=$qrow['Nationality'];
                        $pato=$qrow['Passwod'];
                        $atop=$qrow['OTP'];

                        $store = array(
                            "fullname"=>$nato,
                            "username"=>$stato,
                            "email"=>$disto,
                            "dob"=>$ato,
                            "nation"=>$atan,
                            "passwod"=>$pato,
                            "otp"=>$atop
                        );

                        $any[] = $store;
                    }
                    return json_encode(array("status"=>"success", "response"=>$any), true);
                }
                else{
                    return json_encode(array("status"=>"failed", "response"=>"
                    ?>  
                    <script>
                    window.location='/Admin/? ERROR'; 
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

$newDis = new Dis();
?>