<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

class Zoedata{
    //For Airtime
    public function buyAirtime($network, $phone, $amount){
        $dataApiKey;
        $q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='zoedata'");
        $q->execute();
        if($q->rowCount() > 0){
            $rq = $q->fetch(PDO::FETCH_ASSOC);
            $dataApiKey = trim($rq["Apikey"]);
        }


        if($network !="" && $phone !="" && $amount !="" && $amount >=50){
            $refrence=md5($phone.strtotime(date("Y-m-d")));
            $amountToApi=$amount-2;
            $dataToSend=array("amount" => $amount,
                                "product_code" => "$network._custom",
                                "phone_number" => "$phone",
                                "action"=> "vend",
                                "user_reference" => "$refrence",
                                "bypass_network" => "yes"
                            );
        }
        $headers=[
            "content-Type:application/json",
            "api:$dataApiKey"
        ];

        $url='https://zoedata.ng/autobiz_vending_index.php';
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
    public function buyData($network, $phone, $amount){
        $dataApiKey;
        $q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='zoedata'");
        $q->execute();
        if($q->rowCount() > 0){
            $rq = $q->fetch(PDO::FETCH_ASSOC);
            $dataApiKey = trim($rq["Apikey"]);
        }

        if($netwok !="" && $phone !="" && $amount !="" && $amount >=50){
            $refrence=md5($phone.strtotime(date("Y-m-d")));
            $amountToApi=$amount-2;
            $dataToSend=array("amount" => $amount,
                                "product_code" => "$network._custom",
                                "phone_number" => "$phone",
                                "action"=> "vend",
                                "user_reference" => "$refrence",
                                "bypass_network" => "yes");
        }
        $headers=[
            "content-Type:application/json",
            "api:$dataApiKey"
        ];

        $url='https://zoedata.ng/autobiz_vending_index.php';
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
    public function buyCable($cabletype, $cablenumber, $amount){
        $dataApiKey;
        $q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='zoedata'");
        $q->execute();
        if($q->rowCount() > 0){
            $rq = $q->fetch(PDO::FETCH_ASSOC);
            $dataApiKey = trim($rq["Apikey"]);
        }

        if($cabletype !="" && $cablenumber !="" && $amount !="" && $amount >=50){
            $refrence=md5($phone.strtotime(date("Y-m-d")));
            $amountToApi=$amount-2;
            $dataToSend=array("product_code" => "$cabletype_jinja",
                                "phone_number" => "08097238712",
                                "smartcard_number" => "$cablenumber",
                                "amount" => "$amountToApi",
                                "user_reference" => "$refrence",
                                "action" => "vend");
        }
        $headers=[
            "content-Type:application/json",
            "api:$dataApiKey"
        ];

        $url='https://zoedata.ng/autobiz_vending_index.php';
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
    public function buyElectricity($electricitytype,$metertype,$meternumber,$amount){
                $dataApiKey;
        $q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='zoedata'");
        $q->execute();
        if($q->rowCount() > 0){
            $rq = $q->fetch(PDO::FETCH_ASSOC);
            $dataApiKey = trim($rq["Apikey"]);
        }

        if($electricitytype !="" && $metertype !="" && $meternumber !="" && $amount !="" && $amount >=50){
            $refrence=md5($phone.strtotime(date("Y-m-d")));
            $amountToApi=$amount-2;
            $dataToSend=array("product_code" => "$electricitytype_prepaid_custom",
                                "meter_number" => "$meternumber",
                                "amount" => "$amount",
                                "user_reference" => "$refrence",
                                "action" => "vend",
                                //"MeterType"=>metertype(PREPAID:1,POSTPAID:2)
                                );
        }
        $headers=[
            "content-Type:application/json",
            "api:$dataApiKey"
        ];
        

        $url='https://zoedata.ng/autobiz_vending_index.php';
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
         $dataApiKey;
        $q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='zoedata'");
        $q->execute();
        if($q->rowCount() > 0){
            $rq = $q->fetch(PDO::FETCH_ASSOC);
            $dataApiKey = trim($rq["Apikey"]);
        }

        if($netwok !="" && $phone !="" && $amount !="" && $amount >=50){
            $amountToApi=$amount-2;
            $dataToSend=array("product_code" => "gotv_jinja",
                                "phone_number" => "08097238712",
                                "smartcard_number" => "1233445543hello",
                                "action" => "verify"
                                );
        }
        $headers=[
            "content-Type:application/json",
            "api:$dataApiKey"
        ];
        

        $url='https://zoedata.ng/autobiz_vending_index.php';
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode(dataToSend));
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);

        $response=curl_exec($curl);
        curl_close($curl);

        echo $response;
        
    }
    public function verifyMeternumber(){
         $dataApiKey;
        $q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='zoedata'");
        $q->execute();
        if($q->rowCount() > 0){
            $rq = $q->fetch(PDO::FETCH_ASSOC);
            $dataApiKey = trim($rq["Apikey"]);
        }

        if($netwok !="" && $phone !="" && $amount !="" && $amount >=50){
            $refrence=md5($phone.strtotime(date("Y-m-d")));
            $amountToApi=$amount-2;
            $dataToSend=array("product_code" => "ibedc_prepaid_custom",
                                "meter_number" => "1222233wwsaa",
                                "amount" => "$amount",
                                "user_reference" => "$refrence",
                                "action" => "vend",
                                //"MeterType"=>metertype(PREPAID:1,POSTPAID:2)
                                );
        }
        $headers=[
            "content-Type:application/json",
            "api:$dataApiKey"
        ];
        

        $url='https://zoedata.ng/autobiz_vending_index.php';
        $curl=curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode(dataToSend));
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);

        $response=curl_exec($curl);
        curl_close($curl);

        echo $response;
        
    }
}

$newZoedata = new Zoedata();
?>