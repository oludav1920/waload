<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Cabletypeedit{
    public function Cabletypeedit($nato, $stato, $disto, $ato, $idx){
        try{
            global $cabletypeTable;
            global $cabletypeTableId;
            global $conn;

            if($nato !="" && $stato !=""  && $disto !="" && $ato !="" && $idx !=""){
                //update the airtime table
                $q=$conn->prepare("UPDATE $cabletypeTable 
                SET Cabletype=:fu, Stat=:us, Discount=:em, Api=:do 
                WHERE Index_Id=:id");
                $q->bindparam(":fu", $nato, PDO::PARAM_STR);
                $q->bindparam(":us", $stato, PDO::PARAM_STR);
                $q->bindparam(":em", $disto, PDO::PARAM_STR);
                $q->bindparam(":do", $ato, PDO::PARAM_STR);
                $q->bindparam(":id", $idx, PDO::PARAM_STR);
                $q->execute();

                    return json_encode(array("status"=>"success", "response"=>"
                     ?> 
                     <script>
                     window.location='/Admin/cable/cable-type.php'; 
                     </script> 
                     <?php 
                     exit(); 
                     "), true);
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/cable/cable-typeedit.php? error'; 
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

$Cabletypeedit = new Cabletypeedit();
?>
