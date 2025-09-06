
<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>


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
<form action="/Controller/PaymentController.php" method="POST" enctype="multipart/form-data" >
      <P><label class="lab">Payment_Gateway:</label></br>
    <select id="net" name="net" class="input">
        <option value="">Choose One</option>
        <option value="PayPal">PayPal</option>
        <option value="Payoneer">Payoneer</option>
        <option value="Mollie">Mollie</option>
    </select><br/></P><hr/>
   <P><tr><label class="lab">Discount:</label><br/>
    <input type="number" name="dis" class="input" placeholder="type your discount"/><br/></P><hr/>
    <P><tr><label class="lab">API:</label><br/>
    <input type="text" name="api" class="input" placeholder="type the api name"/><br/></P><hr/>
        <P><label  class="lab">Satus:</label><br/>
    <select name="sta" class="input">
        <option value="">Choose One</option>
        <option value="ON">ON</option>
        <option value="OFF">OFF</option>
    </select><br/></P><hr/>
<button type="submit" value="payment" name="payment" class="regbtn">Submit</button>
</form>
</fieldset>
    </div>

</div>



<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/foot.php") ?>