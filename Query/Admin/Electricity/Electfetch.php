<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Elect{
    public function userElect(){
        try{
            global $electTable;
            global $electTableId;
            global $conn;

                //check if user already exist
                $q = $conn->prepare("SELECT * FROM $electTable ORDER BY Index_Id ASC");
                $q->execute();
                $qrow=$q->rowCount();

                $any = [];
                if($qrow > 0){
                    while($qrow=$q->fetch(PDO::FETCH_ASSOC)){
                        $ind=$qrow['Index_Id'];
                        $nato=$qrow['Electplan'];
                        $disto=$qrow['Discount'];
                        $ato=$qrow['Api'];
                        $stato=$qrow['Stat'];

                        $store = array(
                            "id"=>$ind,
                            "elect"=>$nato,
                            "discount"=>$disto,
                            "api"=>$ato,
                            "stat"=>$stato,
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

$newElect = new Elect();
?>