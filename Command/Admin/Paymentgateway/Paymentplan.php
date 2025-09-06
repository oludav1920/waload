<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

class Paymentplan{
    public function userPayment($pay,$dis,$api,$sta){
        try{
            global $paymentTable;
            global $paymentTableId;
            global $conn;
            if($pay !="" && $dis !="" && $api !="" && $sta !=""){

                $qq=$conn->prepare("INSERT INTO $paymentTable(Paymentplan, Discount, Api, Statu)
                 VALUES(:pa, :di, :ap, :st)");
                 $qq->bindParam(':pa',$pay,PDO::PARAM_STR);
                 $qq->bindParam(':di',$dis,PDO::PARAM_STR);
                 $qq->bindParam(':ap',$api,PDO::PARAM_STR);
                 $qq->bindParam(':st',$sta,PDO::PARAM_STR);
                 $qq->execute();

                 if($qq){
                    return json_encode(array("status"=>"success","response"=>"?>
                    <script>
                    window.location='/Admin/payment_gateway/index.php';
                    </script>
                    <?php
                    exit();
                    "), true);
                }
                else{
                    return json_encode(array("status"=>"failed","response"=>"oops!! Something went wrong"), true);
                }
            }
            else{
                return json_encode(array("status"=>"failed","response"=>"
                ?>
                <script>
                window.location='/Admin/payment_gateway/paymentform.php? error';
                </script>
                <?php
                exit();
                "), true);
            }
        }
        catch(Exception $e){
            return json_encode(array("status"=>"failed", "response"=>$e->getMessage), true);
        }
    }
}
$newPayment= new Paymentplan()
?>