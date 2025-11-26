<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Wallet{
    public function userWallet(){
        try{
            global $walletTable;
            global $walletTableId;
            global $conn;

                //check if user already exist
                $q = $conn->prepare("SELECT * FROM $walletTable ORDER BY Wallet_id ASC");
                $q->execute();
                $qrow=$q->rowCount();

                $any = [];
                if($qrow > 0){
                    while($qrow=$q->fetch(PDO::FETCH_ASSOC)){
                        $ind=$qrow['Wallet_id'];
                        $ema=$qrow['Email'];
                        $bal=$qrow['Balance'];
                        $tod=$qrow['Totaldeposit'];
                        $tos=$qrow['Totalspent'];
                        $cur=$qrow['Currency'];

                        $store = array(
                            "id"=>$ind,
                            "email"=>$ema,
                            "balance"=>$bal,
                            "totaldeposit"=>$tod,
                            "totalspent"=>$tos,
                            "currency"=>$cur,
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

$newWallet = new Wallet();
?>