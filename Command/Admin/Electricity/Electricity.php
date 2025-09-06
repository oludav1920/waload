<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Elect{
    public function userElect($net, $dis, $api, $sta){
        try{
            global $electTable;
            global $electTableId;
            global $conn;

            if($net !="" && $dis !="" && $api !="" && $sta !=""){

                $qq = $conn->prepare("INSERT INTO $electTable(
                Electplan, Discount, Api, Stat) VALUES(:nt, :ds, :ap, :st )");
                $qq->bindParam(':nt', $net, PDO::PARAM_STR);
                $qq->bindParam(':ds', $dis, PDO::PARAM_STR);
                $qq->bindParam(':ap', $api, PDO::PARAM_STR);
                $qq->bindParam(':st', $sta, PDO::PARAM_STR);
                $qq->execute();

                    if($qq){
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
                        return json_encode(array("status"=>"failed", "response"=>"oops!! something went wront"), true);
                    }
                
                }
            else{
                $output = array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/electricity/electform.php? error'; 
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

$newElect = new Elect();
?>