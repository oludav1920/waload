<?php
include($_SERVER["DOCUMENT_ROOT"]."/Electricity/Query/Electdelete.php");

if(isset($_GET["user"])){
    $electtodelete = trim(htmlspecialchars($_GET["user"]));
}
echo $backendResponse = $newElectdel->userElectdel($electtodelete);
?>
<script>
    window.location="/Admin/electricity/index.php";
</script>
<?php
return;   
?>