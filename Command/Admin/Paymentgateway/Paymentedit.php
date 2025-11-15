<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Paymentedit{
    public function userPaymentedit($net, $dis, $api, $sta){
        try{
            global $paymentTable;
            global  $paymentTableId;
            global $conn;

            if($net !="" && $dis !="" && $api !="" && $sta !=""){
                //update the paymentgateway table
                $q=$conn->prepare("UPDATE  $paymentTable
                SET Paymentplan=:fu, Discount=:em, Api=:do, Statu=:us 
                WHERE Paymentplan=:fu AND Api=:do");
                $q->bindparam(":fu", $net, PDO::PARAM_STR);
                $q->bindparam(":em", $dis, PDO::PARAM_STR);
                $q->bindparam(":do", $api, PDO::PARAM_STR);
                $q->bindparam(":us", $sta, PDO::PARAM_STR);
                $q->execute();

                    return json_encode(array("status"=>"success", "response"=>"
                     ?> 
                     <script>
                     window.location='/Admin/payment_gateway/index.php'; 
                     </script> 
                     <?php 
                     exit(); 
                     "), true);
            }
            else{
                return json_encode(array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/payment_gateway/paymentedit.php? error'; 
                </script> 
                <?php 
                exit();"), true);
            }
        }
        catch(Exception $e){
            $output = array("status"=>"failed", "response"=>$e->getMessage());
            return json_encode($output, true);
        }
    }
}

$newPaymentedit = new Paymentedit();
?>