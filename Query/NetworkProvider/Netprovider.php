<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Netprovider{
    public function userApiNet(){
        try{
            global $apiTable;
            global $apiTableId;
            global $conn;

                //check if user already exist
                $status = "ON";
                $q = $conn->prepare("SELECT * FROM $apiTable WHERE Statu=:st");
                $q->bindParam(":st", $status, PDO::PARAM_STR);
                $q->execute();
                $qrow=$q->rowCount();
                if($qrow > 0){
                    $qrow=$q->fetch(PDO::FETCH_ASSOC);

                    $email=$qrow['Email'];
                    $aname=$qrow['Apiname'];
                    $akey=$qrow['Apikey'];
                    $stat=$qrow['Statu'];

                    $store = array(
                        "email"=>$email,
                        "apiname"=>$aname,
                        "apikey"=>$akey,
                        "statu"=>$stat
                    );

                    return json_encode(array("status"=>"success", "response"=>$store), true);
                }
        }
        catch(Exception $e){

        }
    }
}

$newNetprovider = new Netprovider();
?>