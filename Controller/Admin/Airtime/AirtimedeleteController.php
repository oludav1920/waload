<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Admin/Airtime/Airtimedelete.php");

if(isset($_GET["user"])){
    $airtimetodelete = trim(htmlspecialchars($_GET["user"]));
}
echo $backendResponse = $newAdel->userAdel($airtimetodelete);
?>
<script>
    window.location="/Admin/airtime/index.php";
</script>
<?php
return;   
?>