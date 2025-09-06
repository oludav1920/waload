<?php
include("connect.php");

$folder="picsload/";

$img = $_FILES["photo"]["name"];
$base = $folder.basename($img);
$ext = pathinfo($base, PATHINFO_EXTENSION);
$extlower=strtolower($ext);

if(file_exists($base)){
    echo "file already exist";
    exit();
}
$fls=$_FILES["photo"]["size"];
if($fls > 1000000){
    echo "file is too big";
    exit();
}
/*if($extlower!="png" || $extlower!="jpg"){
    echo "file not allowed";
    exit();
}*/

$oldfile=$_FILES["photo"]["tmp_name"];
$time=strtotime(date("Y-m-d H:i:s"));
$timehash=md5($time);
$dot=".";
$newfile=$base.$timehash.$dot.$extlower;

$email=htmlspecialchars(trim($_POST['email']));

if(move_uploaded_file($_FILES['photo']['tmp_name'],$newfile)){
    $q=$con->prepare("UPDATE oludavreg SET Profilepix=:pp WHERE Email=:em");
    $q->bindparam(":pp", $newfile, PDO::PARAM_STR);
    $q->bindparam(":em", $email, PDO::PARAM_STR);
    $q->execute();
}
else{
    echo "Not Successul";
    exit();
}

?>