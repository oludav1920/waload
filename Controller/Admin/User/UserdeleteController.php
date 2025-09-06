<?php
include($_SERVER["DOCUMENT_ROOT"]."/Register/Query/UserDelete.php");

if(isset($_GET["user"])){
    $usertodelete = trim(htmlspecialchars($_GET["user"]));
}
echo $backendResponse = $newUdel->userUdel($usertodelete);
?>
<script>
    window.location="/Admin/user/index.php";
</script>
<?php
return;   
?>