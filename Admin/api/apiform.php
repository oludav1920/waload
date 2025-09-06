<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>


 <div class="columns2-unequal-middle-div white-bg">      
<div class="div3">
    <img src="/Image/imageod1.jpg" alt="image here" class="img1"/>
        <h1>API FORM PAGE</h1>
        <div style="text-align: center;">
        <?php
        if(isset($_GET['error']))
        {
          echo '<font style="color: red;">';
            echo "Fill all box";
            echo "</font>";
        }
        ?>

<?php
        if(isset($_GET['Errorgg']))
        {
          echo '<font style="color: red;">';
            echo "This email has already been registered";
            echo "</font>";
        }
        ?>
        </div>
        <fieldset class="divr" style="">
<form action="/Controller/ApiController.php" method="POST" enctype="multipart/form-data" >
   <P><tr><label class="lab">APINAME:</label><br/>
    <input type="text" name="apiname" class="input" placeholder="type your apiname"/><br/></P><hr/>
   <P><label  class="lab">APIKEY:</label><br/>
    <input type="text" name="apikey" class="input"placeholder="type your apikey"/><br/></P><hr/>
    <P><label  class="lab">STATUS:</label><br/>
    <select name="status" class="input">
        <option value="">Choose One</option>
        <option value="ON">ON</option>
        <option value="OFF">OFF</option>
    </select><br/></P><hr/>
<button type="submit" value="api" name="api_submit" class="regbtn">Submit</button>
</form>
</fieldset>
    </div>

</div>



<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/foot.php") ?>