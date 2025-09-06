
<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>

<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

$ind;
$pay;
$dis;
$api;
$sta;

if(isset($_GET["net"])){
    $paymenttoedit= trim(htmlspecialchars($_GET["net"]));

    $qq=$conn->prepare("SELECT * FROM payment_gateway WHERE Index_Id=:id");
    $qq->bindParam(":id", $paymenttoedit, PDO::PARAM_STR);
    qq->execute();

    if($qq->rowCount() > 0){
        $row=$qq->fetch(PDO::FETCH_ASSOC);
        $ind=$row['Index_Id'];
        $pay=$row['Paymentplan'];
        $dis=$row['Discount'];
        $api=$row['Api'];
        $sta=$row['Status'];
    }

    else{

    }
}
?>

 <div class="columns2-unequal-middle-div white-bg">      
                     <div class="div3">
    <img src="/Image/imageod1.jpg" alt="image here" class="img1"/>
        <h1>PAYMENT-GATEWAY ADMIN PAGE</h1>
        <div style="text-align: center;">
        <?php
        if(isset($_GET['error']))
        {
          echo '<font style="color: red;">';
            echo "Fill all box";
            echo "</font>";
        }
        ?>

        </div>
        <fieldset class="divr" style="">
<form action="/Controller/PaymenteditController.php" method="POST" enctype="multipart/form-data" >
      <P><label class="lab">Payment_Gateway:</label></br>
    <select id="net" name="net" class="input">
        <option value="<?php echo $pay; ?>"><?php echo $pay ?></option>
        <option value="PayPal">PayPal</option>
        <option value="Payoneer">Payoneer</option>
        <option value="Mollie">Mollie</option>
    </select><br/></P><hr/>
   <P><tr><label class="lab">Discount:</label><br/>
    <input type="number" name="dis" class="input" <?php echo $dis; ?>/><br/></P><hr/>
    <P><tr><label class="lab">API:</label><br/>
    <input type="text" name="api" class="input" <?php echo $api; ?>/><br/></P><hr/>
        <P><label  class="lab">Satus:</label><br/>
    <select name="sta" class="input">
        <option value="<?php echo $pay ?>"><?php echo $sta; ?></option>
        <option value="ON">ON</option>
        <option value="OFF">OFF</option>
    </select><br/></P><hr/>
<button type="submit" value="payment" name="payment_edit" class="regbtn">Submit</button>
</form>
</fieldset>
    </div>

</div>



<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/foot.php") ?>