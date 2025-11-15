<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

class Wallet{
    public function userWallet(){
        try{
            global $walletTable;
            global $walletTableId;
            global $conn;

                //check if user already exist
                $q = $conn->prepare("SELECT * FROM $walletTable WHERE Email=:em");
                $q->bindParam(":em", $status, PDO::PARAM_STR);
                $q->execute();
                $qrow=$q->rowCount();
                if($qrow > 0){
                    $qrow=$q->fetch(PDO::FETCH_ASSOC);

                    $email=$qrow['Email'];
                    $ban=$qrow['Balance'];
                    $dat=$qrow['Dat'];
                    $tdep=$qrow['Totaldeposit'];
                    $tspent=$qrow['Totalspent'];
                    $cur=$qrow['Currency'];

                    $store = array(
                        "email"=>$email,
                        "balance"=>$ban,
                        "date"=>$dat,
                        "totaldeposit"=>$tdep,
                        "totalspent"=>$tspent,
                        "currency"=>$cur
                    );

                    return json_encode(array("status"=>"success", "response"=>$store), true);
                }
        }
        catch(Exception $e){

        }
    }

    public function updateWallet(){
        try{
            global $walletTable;
            global $walletTableId;
            global $conn;

            $userWallet = $this->userWallet();
            $ResponseDecode = json_decode($userWallet, true);

            if($ResponseDecode["status"] =="success"){
                $balance = $ResponseDecode["response"]["balance"];
                $Tspent = $ResponseDecode["response"]["totalspent"];
                $updateTspent = (float) $Tspent + (float) $amount;
                $updateBalance = (float) $balance - (float) $amount;
                if($updateBalance){
                    $q=$conn->prepare("UPDATE $walletTable SET Balance=:bb AND Totalspent=:ts WHERE Email=:em");
                    $q->bindparam(":bb", $updateBalance, PDO::PARAM_STR);
                    $q->bindparam(":ts", $updateTspent, PDO::PARAM_STR);
                    $q->bindparam(":em", $email, PDO::PARAM_STR);
                    $q->execute();
                }
            }
        }
        catch(Exception $e){

        }
    }

}
$newWallet = new Wallet();
?>