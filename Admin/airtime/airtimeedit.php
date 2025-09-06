<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>

 <?php
        include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
        include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");
        
        $ind;
        $nat;
        $stat;
        $dist;
        $at;
       
        if(isset($_GET["idx"])){
        $airtoedit = trim(htmlspecialchars($_GET["idx"]));
         echo $airtoedit;
         
        //check if the api exist
        $q = $conn->prepare("SELECT * FROM airtime WHERE Index_Id=:em");
        $q->bindParam(':em', $airtoedit, PDO::PARAM_STR);
        $q->execute();
        if($q->rowCount() > 0){
            $qrow=$q->fetch(PDO::FETCH_ASSOC);
                        $ind=$qrow['Index_Id'];
                        $nat=$qrow['Network'];
                        $stat=$qrow['Stat'];
                        $dist=$qrow['Discount'];
                        $at=$qrow['Api'];
                        
            }
            else{
            
            }
    }
    ?> 


 <div class="columns2-unequal-middle-div white-bg">      
                     <div class="div3">
    <img src="/Image/imageod1.jpg" alt="image here" class="img1"/>
        <h1>AIRTIME ADMIN PAGE</h1>
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
<form action="/Controller/AirtimeeditController.php" method="POST" enctype="multipart/form-data" >
      <P><label class="lab">Network:</label></br>
    <select id="net" name="net" class="input">
        <option value="<?php echo $nat; ?>"><?php echo $nat; ?></option>
        <option value="MTN">MTN</option>
        <option value="GLO">GLO</option>
        <option value="Airtel">Airtel</option>
        <option value="9Mobile">9Mobile</option>
    </select><br/></P><hr/>
    <P><label  class="lab">Satus:</label><br/>
    <select name="status" class="input">
        <option value="<?php echo $stat; ?>"><?php echo $stat; ?></option>
        <option value="ON">ON</option>
        <option value="OFF">OFF</option>
    </select><br/></P><hr/>
   <P><tr><label class="lab">Discount:</label><br/>
    <input type="number" name="dis" class="input" value="<?php echo $dist; ?>"/><br/></P><hr/>
    <P><tr><label class="lab">API:</label><br/>
    <input type="text" name="api" class="input" value="<?php echo $at; ?>"/><br/></P><hr/>
    <P>
    <input type="hidden" name="idn" class="input" value="<?php echo $ind; ?>"/><br/></P>
<button type="submit" value="airtimeedit" name="airtime_edit" class="regbtn">Submit</button>
</form>
</fieldset>
    </div>

</div>



<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/foot.php") ?>