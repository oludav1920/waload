<?php
include($_SERVER["DOCUMENT_ROOT"]."/Command/Admin/Data/Datatypedelete.php");

if(isset($_GET["user"])){
    $datatypetodelete = trim(htmlspecialchars($_GET["user"]));
}
echo $backendResponse = $newDTdel->userDTdel($datatypetodelete);
?>
<script>
    window.location="/Admin/data/data-type.php";
</script>
<?php
return;   
?>