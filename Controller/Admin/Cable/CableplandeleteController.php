<?php
include($_SERVER["DOCUMENT_ROOT"]."/Cable/Query/Cableplandelete.php");

if(isset($_GET["user"])){
    $cableplantodelete = trim(htmlspecialchars($_GET["user"]));
}
echo $backendResponse = $newCPdel->userCPdel($cableplantodelete);
?>
<script>
    window.location="/Admin/cable/cable-plan.php";
</script>
<?php
return;   
?>