<?php
if(isset($_POST["net"]) && isset($_POST["num"]) && isset($_POST["numb"])){
$netwok=htmlspecialchars(trim($_POST['net']));
$phone=htmlspecialchars(trim($_POST['num']));
$amount=(float)htmlspecialchars(trim($_POST['numb']));

$dataApiKey;
$q = $conn->prepare("SELECT Apikey, Apiname FROM apitable WHERE Apiname='husmo'");
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

$url="https://husmodataapi.com/api/topup/";
$curl=curl_init($url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode(dataToSend));
curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);

$response=curl_exec($curl);
curl_close($curl);

echo $response;
}
else{
    echo "something went wrong";
}
?>