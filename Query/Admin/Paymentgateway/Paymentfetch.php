<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

class Paymentfetch{
    public function userPaymentfetch(){
        try{
            global $paymentTable;
            global $paymentTableId;
            global $conn;

            $qq=$conn->prepare("SELECT * FROM $paymentTable ORDER BY Index_Id ASC");
            $qq->execute();
            $row=$qq->rowCount();

            $any=[];
            if($row > 0){
                while($row=$qq->fetch(PDO::FETCH_ASSOC)){
                    $ind=$row['Index_Id'];
                    $pay=$row['Paymentplan'];
                    $dis=$row['Discount'];
                    $api=$row['Api'];
                    $sta=$row['Statu'];

                    $store=array(
                        "index"=>$ind,
                        "payment"=>$pay,
                        "discount"=>$dis,
                        "api"=>$api,
                        "status"=>$sta
                    );
                     $any[] = $store;
                }
                return json_encode(array("status"=>"success", "response"=>$any), true);
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>
                <script>
                window.location='/Admin/? ERROR';
                </script>
                <?php
                exit();
                "), true);
            }

        }
        catch(Exception $e){
            return json_encode(array("status"=>"failed", "response"=>$e->getMessage()), true);
        }
    }
}

$newPaymentfetch = new Paymentfetch();
?>