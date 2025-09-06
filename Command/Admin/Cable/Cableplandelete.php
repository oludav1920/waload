<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class CPdel{
    public function userCPdel($del){
        try{
            global $cableplanTable;
            global $cableplanTableId;
            global $conn;

                    $q=$conn->prepare("DELETE FROM $cableplanTable  
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

$newCPdel = new CPdel();
?>