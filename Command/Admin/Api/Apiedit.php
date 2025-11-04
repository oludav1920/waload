<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Apiedit{
    public function Apiedit($apin, $apik, $stat, $idx){
        try{
            global $apiTable;
            global $apiTableId;
            global $conn;

            if($apin !="" && $apik !=""  && $stat !="" && $idx !=""){
                //update the api table
                $q=$conn->prepare("UPDATE $apiTable 
                SET Apiname=:fu, Apikey=:us, Statu=:em,
                WHERE Index_Id=:id");
                $q->bindparam(":fu", $apin, PDO::PARAM_STR);
                $q->bindparam(":us", $apik, PDO::PARAM_STR);
                $q->bindparam(":em", $stat, PDO::PARAM_STR);
                $q->bindparam(":id", $idx, PDO::PARAM_STR);
                $q->execute();

                    return json_encode(array("status"=>"success", "response"=>"
                     ?> 
                     <script>
                     window.location='/Admin/api/index.php'; 
                     </script> 
                     <?php 
                     exit(); 
                     "), true);
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/api/apiedit.php? error'; 
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

$Apiedit = new Apiedit();
?>
