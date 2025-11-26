<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>

 <?php
        include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
        include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");
        
        $ind;
        $ema;
        $bal;
        $tod;
        $tos;
        $cur;
       
        if(isset($_GET["net"])){
            $wallettoedit = trim(htmlspecialchars($_GET["net"]));
            //echo $dplantoedit;
         
            //check if the api exist
            $q = $conn->prepare("SELECT * FROM wallet WHERE Wallet_id=:em");
            $q->bindParam(':em', $wallettoedit, PDO::PARAM_STR);
            $q->execute();
            if($q->rowCount() > 0){
                $qrow=$q->fetch(PDO::FETCH_ASSOC);
                    $ind=$qrow['Wallet_id'];
                    $ema=$qrow['Email'];
                    $bal=$qrow['Balance'];
                    $tod=$qrow['Totaldeposit'];
                    $tos=$qrow['Totalspent'];
                    $cur=$qrow['Currency'];
                            
            }
            else{
                
            }
        }
    ?> 


 <div class="columns2-unequal-middle-div white-bg">      
                     <div class="div3">
    <img src="/Image/imageod1.jpg" alt="image here" class="img1"/>
        <h1>WALLET EDIT PAGE</h1>
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
<form action="/Controller/Admin/Wallet/WalleteditController.php" method="POST" enctype="multipart/form-data" >
    <P><tr><label class="lab">Email:</label><br/>
    <input type="email" name="ema" class="input" value="<?php echo $ema; ?>"/><br/></P><hr/>
    <P><tr><label class="lab">Balance:</label><br/>
    <input type="number" name="bal" class="input" value="<?php echo $bal; ?>"/><br/></P><hr/>
   <P><tr><label class="lab">Total Deposit:</label><br/>
    <input type="number" name="tod" class="input" value="<?php echo $tod; ?>"/><br/></P><hr/>
    <P><tr><label class="lab">Total Spent:</label><br/>
    <input type="number" name="tos" class="input" value="<?php echo $tos; ?>"/><br/></P><hr/>
        <P><label  class="lab">Currency:</label><br/>
    <select name="cur" class="input">
        <option value="<?php echo $cur; ?>"><?php echo $cur; ?></option>
        <option value="NGN">NGN</option>
        <option value="USD">USD</option>
    </select><br/></P><hr/>
    <button type="submit" value="wallet" name="walletedit" class="regbtn">Submit</button>
</form>
</fieldset>
    </div>

</div>



<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/foot.php") ?>