<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Admin/Paymentgateway/Paymentdelete.php");

if(isset($_GET["user"])){
    $gatewaytodelete = trim(htmlspecialchars($_GET["user"]));
}
echo $backendResponse = $newPaymentdel->userPaymentdel($gatewaytodelete);
?>
<script>
    window.location="/Admin/payment_gateway/index.php";
</script>
<?php
return;   
?>