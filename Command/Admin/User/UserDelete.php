<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Udel{
    public function userUdel($del){
        try{
            global $usersTable;
            global $usersTableId;
            global $conn;

                    $q=$conn->prepare("DELETE FROM $usersTable  
                    WHERE Email=:em");
                    $q->bindparam(":em", $del, PDO::PARAM_STR);
                    $q->execute();

                    return json_encode(array("status"=>"success", "response"=>""), true);
                    
                
                
            
        }
        catch(Exception $e){
            $output = array("status"=>"failed", "response"=>$e->getMessage());
            return json_encode($output, true);
        }
    }
}

$newUdel = new Udel();
?>