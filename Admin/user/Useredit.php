<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>

 <?php
        include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
        include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

        $full;
        $use;
        $ema;
        $dob;
        $nat;
        $pas;
        $top;

        if(isset($_GET["user"])){
        $usertoedit = trim(htmlspecialchars($_GET["user"]));
        //echo $usertoedit;

        //check if the email was registered
        $q = $conn->prepare("SELECT * FROM odbest_reg WHERE Email=:em");
        $q->bindParam(':em', $usertoedit, PDO::PARAM_STR);
        $q->execute();
        if($q->rowCount() > 0){
            $qrow=$q->fetch(PDO::FETCH_ASSOC);
                        $full=$qrow['Fullname'];
                        $use=$qrow['Username'];
                        $ema=$qrow['Email'];
                        $dob=$qrow['Dob'];
                        $nat=$qrow['Nationality'];
                        $pas=$qrow['Passwod'];
                        $top=$qrow['OTP'];
            }
            else{
            
            }
    }
    ?> 

 <div class="columns2-unequal-middle-div white-bg">
    <h1>REGISTRATION PAGE</h1>
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
<form action="/Controller/UsereditController.php" method="POST" enctype="multipart/form-data" >
   <P><tr><label class="lab">FULLNAME:</label><br/>
    <input type="text" name="fname" class="input" value="<?php echo $full; ?>"/><br/></P><hr/>
   <P><label  class="lab">USERNAME:</label><br/>
    <input type="text" name="uname" class="input" value="<?php echo $use; ?>"/><br/></P><hr/>
    <P><label  class="lab">EMAIL:</label><br/>
        <input type="email" name="semail" class="input" value="<?php echo $ema; ?>"/><br/></P><hr/>
    <P><label  class="lab">DATE OF BIRTH:</label><br/>
    <input type="date" name="dob" class="input" value="<?php echo $dob; ?>"/><br/></P><hr/>
    <P><label  class="lab">NATIONALITY:</label><br/>
    <select name="country" class="input">
        <option value="<?php echo $nat; ?>"><?php echo $nat; ?></option>
        <option value="Algeria">Algeria</option>
        <option value="Cameroon">Cameroon</option>
        <option value="Ghana">Ghana</option>
        <option value="Nigeria">Nigeria</option>
        <option value="South Africa">South Africa</option>
    </select><br/></P><hr/>
<P><label  class="lab">PASSWORD:</label><br/>
<input type="password" name="ypass" class="input" value="<?php echo $pas; ?>"/><br/></P><hr/>
<button type="submit" value="edit" name="edit_user" class="regbtn">Submit</button>
</form>
</fieldset>
    </div>
</div>



<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/foot.php") ?>