<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Airtime{
    public function userAirtime($net, $sta, $dis, $api){
        try{
            global $airtimeTable;
            global $airtimeTableId;
            global $conn;

            if($net !="" && $sta !="" && $dis !="" && $api !=""){

                $qq = $conn->prepare("INSERT INTO $airtimeTable(
                Network, Stat, Discount, Api) VALUES(:nt, :st, :ds, :ap )");
                $qq->bindParam(':nt', $net, PDO::PARAM_STR);
                $qq->bindParam(':st', $sta, PDO::PARAM_STR);
                $qq->bindParam(':ds', $dis, PDO::PARAM_STR);
                $qq->bindParam(':ap', $api, PDO::PARAM_STR);
                $qq->execute();

                    if($qq){
                        return json_encode(array("status"=>"success", "response"=>"
                        ?> 
                        <script>
                        window.location='/Admin/airtime/'; 
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
                window.location='/Admin/airtime/airform.php? error'; 
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

$newAirtime = new Airtime();
?>