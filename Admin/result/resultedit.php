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
       
        if(isset($_GET["net"])){
        $electtoedit = trim(htmlspecialchars($_GET["net"]));
         //echo $dplantoedit;
         
        //check if the api exist
        $q = $conn->prepare("SELECT * FROM result WHERE Index_Id=:em");
        $q->bindParam(':em', $electtoedit, PDO::PARAM_STR);
        $q->execute();
        if($q->rowCount() > 0){
            $qrow=$q->fetch(PDO::FETCH_ASSOC);
                        $ind=$qrow['Index_Id'];
                        $nat=$qrow['Resultplan'];
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
        <h1>RESULT EDIT PAGE</h1>
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
<form action="/Controller/ResulteditController.php" method="POST" enctype="multipart/form-data" >
      <P><label class="lab">ResultPlan:</label></br>
    <select id="net" name="net" class="input">
        <option value="<?php echo $nat; ?>"><?php echo $nat; ?></option><hr/>
        <option value="NABTEB">NABTEB</option>
        <option value="NECO">NECO</option>
        <option value="WAEC">WAEC</option>
    </select><br/></P><hr/>
   <P><tr><label class="lab">Discount:</label><br/>
    <input type="number" name="dis" class="input" value="<?php echo $dist; ?>"/><br/></P><hr/>
    <P><tr><label class="lab">API:</label><br/>
    <input type="text" name="api" class="input" value="<?php echo $at; ?>"/><br/></P><hr/>
        <P><label  class="lab">Satus:</label><br/>
    <select name="status" class="input">
        <option value="<?php echo $stat; ?>"><?php echo $stat; ?></option>
        <option value="ON">ON</option>
        <option value="OFF">OFF</option>
    </select><br/></P><hr/>
<button type="submit" value="result" name="resultedit" class="regbtn">Submit</button>
</form>
</fieldset>
    </div>

</div>



<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/foot.php") ?>