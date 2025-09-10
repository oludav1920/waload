<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

class Roksub{
    //For Airtime
    public function buyAirtime($network, $phone, $amount){
        $dataApiKey;
        $q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='roksub'");
        $q->execute();
        if($q->rowCount() > 0){
            $rq = $q->fetch(PDO::FETCH_ASSOC);
            $dataApiKey = trim($rq["Apikey"]);
        }


        if($netwok !="" && $phone !="" && $amount !="" && $amount >=50){
            $amountToApi=$amount-2;
            $dataToSend=array("mobile_number"=>$phone,
                            "amount"=>$amountToApi,
                            "ported_number"=> true,
                            "airtime_type"=> "VTU",
                            "network"=>$network);
        }
        $headers=[
            "content-Type:application/json",
            "api:$dataApiKey"
        ];

        $url='https://roksub.com/api/topup/';
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode(dataToSend));
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);

        $response=curl_exec($curl);
        curl_close($curl);

        echo $response;
    }

    //For Data
    public function buyData(){
        $dataApiKey;
        $q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='roksub'");
        $q->execute();
        if($q->rowCount() > 0){
            $rq = $q->fetch(PDO::FETCH_ASSOC);
            $dataApiKey = trim($rq["Apikey"]);
        }

        if($netwok !="" && $phone !="" && $amount !="" && $amount >=50){
            $amountToApi=$amount-2;
            $dataToSend=array("mobile_number"=>$phone,
                            "plan"=>$amountToApi,
                            "ported_number"=> true,
                            "network"=>$network);
        }
        $headers=[
            "content-Type:application/json",
            "api:$dataApiKey"
        ];

        $url='https://roksub.com/api/data/';
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode(dataToSend));
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);

        $response=curl_exec($curl);
        curl_close($curl);

        echo $response;
    }

    //For Cable
    public function buyCable(){
        $dataApiKey;
        $q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='roksub'");
        $q->execute();
        if($q->rowCount() > 0){
            $rq = $q->fetch(PDO::FETCH_ASSOC);
            $dataApiKey = trim($rq["Apikey"]);
        }

        if($netwok !="" && $phone !="" && $amount !="" && $amount >=50){
            $amountToApi=$amount-2;
            $dataToSend=array("cablename"=>$cablename,
                                "cableplan"=> $cableplan,
                                "smart_card_number"=> $meter);
        }
        $headers=[
            "content-Type:application/json",
            "api:$dataApiKey"
        ];

        $url='https://roksub.com/api/cablesub/';
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode(dataToSend));
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);

        $response=curl_exec($curl);
        curl_close($curl);

        echo $response;
    }

    //For Electricity
    public function buyElectricity(){
                $dataApiKey;
        $q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='roksub'");
        $q->execute();
        if($q->rowCount() > 0){
            $rq = $q->fetch(PDO::FETCH_ASSOC);
            $dataApiKey = trim($rq["Apikey"]);
        }

        if($netwok !="" && $phone !="" && $amount !="" && $amount >=50){
            $amountToApi=$amount-2;
            $dataToSend=array("disco_name"=>disco,
                                "amount"=>amounttopay,
                                "meter_number"=>meternumber,
                                "MeterType"=>metertype(PREPAID:1,POSTPAID:2));
        }
        $headers=[
            "content-Type:application/json",
            "api:$dataApiKey"
        ];
        

        $url='https://roksub.com/api/billpayment/';
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode(dataToSend));
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);

        $response=curl_exec($curl);
        curl_close($curl);

        echo $response;
    }
    public function verifySmartcard(){
        
    }
    public function verifyMeternumber(){
        
    }
}

$newRoksub = new Roksub();
?>