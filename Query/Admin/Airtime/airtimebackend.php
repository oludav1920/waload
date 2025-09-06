<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

$network=trim(str_replace(","," ",$_POST['net']));
$num=trim(str_replace(","," ",$_POST['num']));
$numb=(float) trim(str_replace(","," ",$_POST['numb']));
$email=htmlspecialchars(trim($_POST['email']));

if($network=="" || $num=="" || $numb=="" || $email=="")
{
   // echo '<font style="">';
    echo "Fill all box";
    //echo "</font>"
    exit();
}
else if($network !="" && $num !="" && $numb !="" && $email !="")
{
    $query = $con->prepare("SELECT * FROM wallet WHERE Email=:em");
    $query->bindParam(":em",$email,PDO::PARAM_STR);
    $query->execute();
    $row = $query->rowcount();
    if($row > 0)
    {

        $row = $query->fetch(PDO::FETCH_ASSOC);

        $emailp = $row['Email'];
        (float) $baln = $row['Balance'];
        $datp = $row['Dat'];
        (float) $tdp = $row['Totaldeposit'];
        (float) $tsp = $row['Totalspent'];
        $curp = $row['Currency'];

        if($baln >= $numb){
            // code to debit the balance of the user
            // code to credit his/her line
            // code to update the totalspent in the database
        }
        else{
            echo '<font style="">';
            echo "Insuficient Balance";
            echo "</font>";
            exit();
        }
    }
    elseif($row < 1)
    {
        $baln = 0;
        $dat = strtotime(date('Y-m-d H:i:s'));
        $td = 0;
        $ts = 0;
        $cur = "NGN";
        $ins = $con->prepare("INSERT INTO wallet (Email,Balance,Dat,Totaldeposit,Totalspent,Currency)
        VALUES (:email,:bal,:dt,:td,:ts,:cu)");
        $ins->bindParam(':email',$email, PDO:: PARAM_STR);
        $ins->bindParam(':bal',$baln, PDO:: PARAM_STR);
        $ins->bindParam(':dt',$dat, PDO:: PARAM_STR);
        $ins->bindParam(':td',$td, PDO:: PARAM_STR);
        $ins->bindParam(':ts',$ts, PDO:: PARAM_STR);
        $ins->bindParam(':cu',$cur, PDO:: PARAM_STR);
        $ins->execute();
        
            echo '<font style="">';
            echo "Insuficient Balance";
            echo "</font>";
        exit();
    }
}
?>