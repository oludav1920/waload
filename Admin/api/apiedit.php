<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>

 <?php
        include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
        include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");
        
        $ind;
        $apin;
        $apik;
        $stat;
       
        if(isset($_GET["idx"])){
        $apitoedit = trim(htmlspecialchars($_GET["idx"]));
         echo $apitoedit;
         
        //check if the api exist
        $q = $conn->prepare("SELECT * FROM api_table WHERE Index_Id=:em");
        $q->bindParam(':em', $apitoedit, PDO::PARAM_STR);
        $q->execute();
        if($q->rowCount() > 0){
            $qrow=$q->fetch(PDO::FETCH_ASSOC);
                        $ind=$qrow['Index_Id'];
                        $apin=$qrow['Apiname'];
                        $apik=$qrow['Apikey'];
                        $stat=$qrow['Statu'];
                        
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
<form action="/Controller/Admin/Api/ApieditController.php" method="POST" enctype="multipart/form-data" >
    <P><tr><label class="lab">APINAME:</label><br/>
    <input type="text" name="apiname" class="input" value="<?php echo $apin; ?>" placeholder="type your apiname"/><br/></P><hr/>
    <P><label  class="lab">APIKEY:</label><br/>
    <input type="text" name="apikey" class="input" value="<?php echo $apik; ?>" placeholder="type your apikey"/><br/></P><hr/>
    <P><label  class="lab">STATUS:</label><br/>
    <select name="status" class="input">
        <option value="<?php echo $stat; ?>"><?php echo $stat; ?></option>
        <option value="ON">ON</option>
        <option value="OFF">OFF</option>
    </select><br/></P><hr/>
    <P>
    <input type="hidden" name="idn" class="input" value="<?php echo $ind; ?>"/><br/></P>
    <button type="submit" value="apiedit" name="api_edit" class="regbtn">Submit</button>
</form>
</fieldset>
    </div>

</div>



<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/foot.php") ?>