<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Admin/Cable/Cabletypedelete.php");

if(isset($_GET["user"])){
    $cabletypetodelete = trim(htmlspecialchars($_GET["user"]));
}
echo $backendResponse = $newCTdel->userCTdel($cabletypetodelete);
?>
<script>
    window.location="/Admin/cable/cable-type.php";
</script>
<?php
return;   
?>