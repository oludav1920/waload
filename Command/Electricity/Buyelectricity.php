<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");
include($_SERVER["DOCUMENT_ROOT"]."/Command/NetworkProvider/Roksub.php");
include($_SERVER["DOCUMENT_ROOT"]."/Command/NetworkProvider/Husmodata.php");
include($_SERVER["DOCUMENT_ROOT"]."/Command/NetworkProvider/Gladtidings.php");
include($_SERVER["DOCUMENT_ROOT"]."/Command/NetworkProvider/Legitdataway.php");
include($_SERVER["DOCUMENT_ROOT"]."/Command/NetworkProvider/Vtpass.php");
include($_SERVER["DOCUMENT_ROOT"]."/Command/NetworkProvider/Zoedata.php");
include($_SERVER["DOCUMENT_ROOT"]."/Command/Wallet/Wallet.php");

//get users input
Class Buyelectricity{
    public function userBuyelectricity($net, $num, $amount,$email){
        try{
            global $historyTable;
            global $historyTableId;
            global $conn;

            if($net !="" && $num !="" && $email !="" && $amount >=50){
                //get any active api provider
                /*$headers=[
                        "content-Type:application/json"
                ];
                $dataToSend ="";
                $url="/Query/NetworkProvider/Networkprovider.php";
                $curl=curl_init($url);
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curl,CURLOPT_POST,true);
                curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($dataToSend));
                curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);

                $response=curl_exec($curl);
                curl_close($curl);
                */

                $networkProvider = new Netprovider();
                $ResponseDecode = json_decode($networkProvider->userApiNet(), true);

                if($ResponseDecode["status"] =="success"){
                    //check users balance
                    $checkWallet = new wallet();
                    $ResponseDecode = json_decode($checkWallet->userWallet(), true);

                    if($ResponseDecode["status"] =="success"){
                        $balance = $ResponseDecode["response"]["balance"];
                        if($balance >= $amount){
                            //send request to api

                            if($apiname ==="roksub"){
                                $newRksub = new Roksub();
                                $buy = $newRksub->buyData();
                                $res = json_decode($buy, true);
                            }
                            elseif($apiname ==="husmodata"){
                                $newHus = new Husmodata();
                                $buy = $newHus->buyData();
                                $res = json_decode($buy, true);
                            }
                            elseif($apiname ==="gladtidings"){
                                $newGlad = new Gladtidings();
                                $buy = $newGlad->buyData();
                                $res = json_decode($buy, true);
                            }
                            elseif($apiname ==="legitdataway"){
                                $newLegit = new Legitdataway();
                                $buy = $newLegit->buyData();
                                $res = json_decode($buy, true);
                            }
                            elseif($apiname ==="vtpass"){
                                $newVt = new Vtpass();
                                $buy = $newvt->buyData();
                                $res = json_decode($buy, true);
                            }
                            elseif($apiname ==="zoedata"){
                                $newZoe = new Zoedata();
                                $buy = $newZoe->buyData();
                                $res = json_decode($buy, true);
                            }
                            else{
                                
                            }
                            //debit the user
                            $updateWallet = new wallet();
                            $ResponseDecode = json_decode($updateWallet->updateWallet(), true);

                            if($ResponseDecode["status"] =="success"){
                                //save record into transaction table
                                $transactionType="Airtime";
                                $date = date("y-m-d H:i:s");
                                $qq = $conn->prepare("INSERT INTO $historyTable(
                                Email, Transaction_type, Transaction_destination, Amount, Qantity,Date ) VALUES(
                                :em, :ty, :td, :am, :qt, :dt
                                )");
                                $qq->bindParam(':em', $email, PDO::PARAM_STR);
                                $qq->bindParam(':ty', $transactionType, PDO::PARAM_STR);
                                $qq->bindParam(':td', $num, PDO::PARAM_STR);
                                $qq->bindParam(':am', $amount, PDO::PARAM_STR);
                                $qq->bindParam(':qt', $quantity, PDO::PARAM_STR);
                                $qq->bindParam(':dt', $date, PDO::PARAM_STR);
                                $qq->execute();

                                if($qq){
                                    //return response to front end
                                    return json_encode(array("status"=>"success", "response"=>"
                                    ?> 
                                    <script>
                                    window.location='/View/public/elect.php'; 
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

                            }   
                        }
                        else{

                        }
                    }
                    else{

                    }
                }
                else{

                }

            }
            else{

            }
        }
        catch(Exception $e){

        }
    }
}
$newBuyelectricity= new Buyelectricity();

?>