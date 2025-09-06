<?php
include($_SERVER["DOCUMENT_ROOT"]."/Result/Query/Resultdelete.php");

if(isset($_GET["user"])){
    $resulttodelete = trim(htmlspecialchars($_GET["user"]));
}
echo $backendResponse = $newResultdel->userResultdel($resulttodelete);
?>
<script>
    window.location="/Admin/result/index.php";
</script>
<?php
return;   
?>