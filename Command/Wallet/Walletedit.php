<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Walletedit{
    public function userWalletedit($ema, $bal, $tod, $tos, $cur){
        try{
            global $walletTable;
            global  $walletTableId;
            global $conn;

            if($ema !="" && $bal !="" && $tod !="" && $tos !="" && $cur !=""){
                //update the wallet table
                $q=$conn->prepare("UPDATE  $walletTable
                SET Email=:em, Balance=:bl, Totaldeposit=:td, Totalspent=:ts, Currency=:cu 
                WHERE Email=:em ");
                $q->bindParam(":em", $ema, PDO::PARAM_STR);
                $q->bindParam(":bl", $bal, PDO::PARAM_STR);
                $q->bindParam(":td", $tod, PDO::PARAM_STR);
                $q->bindParam(":ts", $tos, PDO::PARAM_STR);
                $q->bindParam(":cu", $cur, PDO::PARAM_STR);
                $q->execute();

                    return json_encode(array("status"=>"success", "response"=>"
                     ?> 
                     <script>
                     window.location='/Admin/wallet/index.php'; 
                     </script> 
                     <?php 
                     exit(); 
                     "), true);
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/wallet/walletedit.php? error'; 
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

$newWalletedit = new Walletedit();
?>
