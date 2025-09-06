<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Electedit{
    public function userElectedit($net, $dis, $api, $sta){
        try{
            global $electTable;
            global  $electTable;
            global $conn;

            if($net !="" && $dis !="" && $api !="" && $sta !=""){
                //update the datatype table
                $q=$conn->prepare("UPDATE  $electTable
                SET Electplan=:fu, Discount=:em, Api=:do, Stat=:us 
                WHERE Electplan=:fu AND Api=:do");
                $q->bindparam(":fu", $net, PDO::PARAM_STR);
                $q->bindparam(":em", $dis, PDO::PARAM_STR);
                $q->bindparam(":do", $api, PDO::PARAM_STR);
                $q->bindparam(":us", $sta, PDO::PARAM_STR);
                $q->execute();

                    return json_encode(array("status"=>"success", "response"=>"
                     ?> 
                     <script>
                     window.location='/Admin/electricity/index.php'; 
                     </script> 
                     <?php 
                     exit(); 
                     "), true);
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/eletricity/electedit.php? error'; 
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

$newElectedit = new Electedit();
?>
