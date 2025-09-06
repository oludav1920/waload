<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Dataplanedit{
    public function userDataplanedit($net, $pla, $dis, $api, $sta){
        try{
            global $dataplanTable;
            global  $dataplanTable;
            global $conn;

            if($net !="" && $pla !=""  && $dis !="" && $api !="" && $sta !=""){
                //update the datatype table
                $q=$conn->prepare("UPDATE  $dataplanTable
                SET Network=:fu, Plan=:pl, Discount=:em, Api=:do, Stat=:us 
                WHERE Network=:fu AND Api=:do");
                $q->bindparam(":fu", $net, PDO::PARAM_STR);
                $q->bindparam(":pl", $pla, PDO::PARAM_STR);
                $q->bindparam(":em", $dis, PDO::PARAM_STR);
                $q->bindparam(":do", $api, PDO::PARAM_STR);
                $q->bindparam(":us", $sta, PDO::PARAM_STR);
                $q->execute();

                    return json_encode(array("status"=>"success", "response"=>"
                     ?> 
                     <script>
                     window.location='/Admin/data/data-plan.php'; 
                     </script> 
                     <?php 
                     exit(); 
                     "), true);
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/data/Dataplanedit.php? error'; 
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

$newDataplanedit = new Dataplanedit();
?>
