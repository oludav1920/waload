<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Datatypeedit{
    public function userDatatypeedit($net, $typ, $dis, $api, $sta){
        try{
            global $datatypeTable;
            global  $datatypeTable;
            global $conn;

            if($net !="" && $typ !=""  && $dis !="" && $api !="" && $sta !=""){
                //update the datatype table
                $q=$conn->prepare("UPDATE  $datatypeTable
                SET Network=:fu, Typ=:ty, Discount=:em, Api=:do, Stat=:us 
                WHERE Network=:fu AND Api=:do");
                $q->bindparam(":fu", $net, PDO::PARAM_STR);
                $q->bindparam(":ty", $typ, PDO::PARAM_STR);
                $q->bindparam(":em", $dis, PDO::PARAM_STR);
                $q->bindparam(":do", $api, PDO::PARAM_STR);
                $q->bindparam(":us", $sta, PDO::PARAM_STR);
                $q->execute();

                    return json_encode(array("status"=>"success", "response"=>"
                     ?> 
                     <script>
                     window.location='/Admin/data/data-type.php'; 
                     </script> 
                     <?php 
                     exit(); 
                     "), true);
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/data/Datatypeedit.php? error'; 
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

$newDatatypeedit = new Datatypeedit();
?>
