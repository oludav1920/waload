<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Register{
    public function userRegister($fname, $uname, $email, $dob, $nation, $pass){
        try{
            global $usersTable;
            global $usersTableId;
            global $walletTable;
            global $walletTableId;
            global $conn;

            if($fname !="" && $uname !="" && $email !="" && $dob !="" && $nation !="" && $pass !=""){
                //check if user already exist
                $q = $conn->prepare("SELECT Email FROM $usersTable WHERE Email=:em");
                $q->bindParam(':em', $email, PDO::PARAM_STR);
                $q->execute();
                if($q->rowCount() < 1){
                    //hash the password
                    $repass = md5($pass);
                    $otp = "";
                    $qq = $conn->prepare("INSERT INTO $usersTable(
                    Fullname, Username, Email, Dob, Nationality, Passwod, OTP) VALUES(
                    :fn, :un, :em, :do, :na, :pd, :ot
                    )");
                    $qq->bindParam(':fn', $fname, PDO::PARAM_STR);
                    $qq->bindParam(':un', $uname, PDO::PARAM_STR);
                    $qq->bindParam(':em', $email, PDO::PARAM_STR);
                    $qq->bindParam(':do', $dob, PDO::PARAM_STR);
                    $qq->bindParam(':na', $nation, PDO::PARAM_STR);
                    $qq->bindParam(':pd', $repass, PDO::PARAM_STR);
                    $qq->bindParam(':ot', $otp, PDO::PARAM_STR);
                    $qq->execute();

                    $balance ="";
                    $totaldeposit ="";
                    $totalspent ="";
                    $currency ="";
                    $ww = $conn->prepare("INSERT INTO $walletTable(
                     Email, Balance, Totaldeposit, Totalspent, Currency) VALUES(
                     :em, :ba, :td, :ts, :cu
                    )");
                    $ww->bindParam(':em', $email, PDO::PARAM_STR);
                    $ww->bindParam(':ba', $balance, PDO::PARAM_STR);
                    $ww->bindParam(':td', $totaldeposit, PDO::PARAM_STR);
                    $ww->bindParam(':ts', $totalspent, PDO::PARAM_STR);
                    $ww->bindParam(':cu', $currency, PDO::PARAM_STR);
                    $ww->execute();

                    if($qq){
                        return json_encode(array("status"=>"success", "response"=>""), true);
                    }
                    else{
                        return json_encode(array("status"=>"failed", "response"=>"oops!! something went wront"), true);
                    }
                }
                else{
                    return json_encode(array("status"=>"failed", "response"=>"This email has already been registered"), true);
                }
            }
            else{
                $output = array("status"=>"failed", "response"=>"Fill all box");
                return json_encode($output, true);
            }
        }
        catch(Exception $e){
            $output = array("status"=>"failed", "response"=>$e->getMessage());
            return json_encode($output, true);
        }
    }
}

$newRegister = new Register();
?>