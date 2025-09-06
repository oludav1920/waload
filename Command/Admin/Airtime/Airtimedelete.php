<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Adel{
    public function userAdel($del){
        try{
            global $airtimeTable;
            global $airtimeTableId;
            global $conn;

                    $q=$conn->prepare("DELETE FROM $airtimeTable  
                    WHERE Index_Id=:em");
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

$newAdel = new Adel();
?>