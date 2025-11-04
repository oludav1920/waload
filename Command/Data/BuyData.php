<?php
//get users input
if(isset($_POST["net"]) && isset($_POST["num"]) && isset($_POST["numb"])){
$netwok=htmlspecialchars(trim($_POST['net']));
$phone=htmlspecialchars(trim($_POST['num']));
$amount=(float)htmlspecialchars(trim($_POST['numb']));
}
//get any active api provider

//check users balance
//send request to api
//debit the user
//save record into transaction table
//return response to front end
?>