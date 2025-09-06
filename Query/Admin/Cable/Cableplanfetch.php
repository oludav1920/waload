<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Cableplan{
    public function userCableplan(){
        try{
            global $cableplanTable;
            global $cableplanTableId;
            global $conn;

                //check if user already exist
                $q = $conn->prepare("SELECT * FROM $cableplanTable ORDER BY Index_Id ASC");
                $q->execute();
                $qrow=$q->rowCount();

                $any = [];
                if($qrow > 0){
                    while($qrow=$q->fetch(PDO::FETCH_ASSOC)){
                        $ind=$qrow['Index_Id'];
                        $nato=$qrow['Cableplan'];
                        $stato=$qrow['Stat'];
                        $disto=$qrow['Discount'];
                        $ato=$qrow['Api'];

                        $store = array(
                            "id"=>$ind,
                            "cableplan"=>$nato,
                            "stat"=>$stato,
                            "discount"=>$disto,
                            "api"=>$ato
                        );

                        $any[] = $store;
                    }
                    return json_encode(array("status"=>"success", "response"=>$any), true);
                }
                else{
                    return json_encode(array("status"=>"failed", "response"=>"
                    ?>  
                    <script>
                    window.location='/Admin/? ERROR'; 
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

$newCableplan = new Cableplan();
?>