<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Admin/Data/Dataplandelete.php");

if(isset($_GET["user"])){
    $dataplantodelete = trim(htmlspecialchars($_GET["user"]));
}
echo $backendResponse = $newDPdel->userDPdel($dataplantodelete);
?>
<script>
    window.location="/Admin/data/data-plan.php";
</script>
<?php
return;   
?>