<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Resultedit{
    public function userResultedit($net, $dis, $api, $sta){
        try{
            global $resultTable;
            global  $resultTable;
            global $conn;

            if($net !="" && $dis !="" && $api !="" && $sta !=""){
                //update the resultplan table
                $q=$conn->prepare("UPDATE  $resultTable
                SET Resultplan=:fu, Discount=:em, Api=:do, Stat=:us 
                WHERE Resultplan=:fu AND Api=:do");
                $q->bindparam(":fu", $net, PDO::PARAM_STR);
                $q->bindparam(":em", $dis, PDO::PARAM_STR);
                $q->bindparam(":do", $api, PDO::PARAM_STR);
                $q->bindparam(":us", $sta, PDO::PARAM_STR);
                $q->execute();

                    return json_encode(array("status"=>"success", "response"=>"
                     ?> 
                     <script>
                     window.location='/Admin/result/index.php'; 
                     </script> 
                     <?php 
                     exit(); 
                     "), true);
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/result/resultedit.php? error'; 
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

$newResultedit = new Resultedit();
?>
