<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Apiq{
    public function userApiq(){
        try{
            global $apiTable;
            global $apiTableId;
            global $conn;

                //check if user already exist
                $q = $conn->prepare("SELECT * FROM $apiTable ORDER BY Index_Id ASC");
                $q->execute();
                $qrow=$q->rowCount();

                $any = [];
                if($qrow > 0){
                    while($qrow=$q->fetch(PDO::FETCH_ASSOC)){
                        $nato=$qrow['Apiname'];
                        $stato=$qrow['Apikey'];
                        $disto=$qrow['Statu'];

                        $store = array(
                            "apiname"=>$nato,
                            "apikey"=>$stato,
                            "statu"=>$disto,
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

$newApiq = new Apiq();
?>