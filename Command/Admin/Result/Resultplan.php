<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Resultplan{
    public function userResultplan($net, $dis, $api, $sta){
        try{
            global $resultTable;
            global $resultTableId;
            global $conn;

            if($net !="" && $dis !="" && $api !="" && $sta !=""){

                $qq = $conn->prepare("INSERT INTO $resultTable(
                Resultplan, Discount, Api, Stat) VALUES(:nt, :ds, :ap, :st )");
                $qq->bindParam(':nt', $net, PDO::PARAM_STR);
                $qq->bindParam(':ds', $dis, PDO::PARAM_STR);
                $qq->bindParam(':ap', $api, PDO::PARAM_STR);
                $qq->bindParam(':st', $sta, PDO::PARAM_STR);
                $qq->execute();

                    if($qq){
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
                        return json_encode(array("status"=>"failed", "response"=>"oops!! something went wront"), true);
                    }
                
                }
            else{
                $output = array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/result/resultform.php? error'; 
                </script> 
                <?php 
                exit();");
                return json_encode($output, true);
            }
        }
        catch(Exception $e){
            $output = array("status"=>"failed", "response"=>$e->getMessage());
            return json_encode($output, true);
        }
    }
}

$newResultplan = new Resultplan();
?>