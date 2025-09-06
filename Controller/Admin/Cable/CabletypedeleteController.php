<?php
include($_SERVER["DOCUMENT_ROOT"]."/Cable/Query/Cabletypedelete.php");

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