<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon" href="/Image/imageod1.jpg" />
    <title>Odbest.com</title>
    <link rel="stylesheet" href="/Show/reg_login.css"/>
</head>
<body>
        <div class="div1">
          
<ul class="ul1" type="none">
            <li class="li1"><span>Odbestcheapdata</span></li>
            <li class="li2">
            <fieldset class="fieldset">
              <legend class="legend">
              <button onclick="display()" id="but" class="btn1">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-grid-3x3-gap-fill" viewBox="0 0 16 16">
                  <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                </svg>

              </button>
              </legend>
              <div class="div2">
                <button id="can" class="btn2" onclick="back()">X</button>
                <ul class="ul2">
              <p><li id="no1" class="li3"><a href="#about" class="a1">About us</a></li> </p>
              <p><li id="no2" class="li3"><a href="#contact" class="a1">Contact us</a></li></p>
              <p><li id="no3" class="li3"><button><a href="/View/public/registration.php" class="a1">Register</a></button></li></P>
              <li id="no4" class="li3"><button><a href="/View/public/login.php" class="a1">Login</a></button></li>
              </ul>
              </div>
            </fieldset>
          </li>
          </ul>
        </div>
        
    <div class="div3">
    <img src="/Image/imageod1.jpg" alt="image here" class="img1"/>
        <h1>RESET PASSWORD</h1>
    <?php
    if(isset($_GET['passerror'])){
      echo '<font style="color: red;">';
        echo "unmatched password";
        echo '</font>';
    }
    ?>
    <?php
    if(isset($_GET['errorpass'])){
      echo '<font style="color: red;">';
        echo "Fill the empty box";
        echo '</font>';
    }
    ?>
    <fieldset class="divr" >
<form action="/Controller/ForgetPassController.php" method="POST" enctype="multipart/form-data" >
      <P><label class="lab">EMAIL:</label><br/>
    <input type="text" class="input" name="semail" value="<?php if(isset($_GET["email"])){ echo htmlspecialchars($_GET["email"]); } ?>"/></p>
    <P><label class="lab">OTP:</label><br/>
    <input type="text" class="input" name="otp" value="<?php if(isset($_GET["otp"])){ echo htmlspecialchars($_GET["otp"]); } ?>"/></p>
<P><label class="lab">PASSWORD:</label><br/>
<input type="password" class="input" placeholder="insert your password" name="ypass"/><br/></P>
<P><label class="lab">RE-PASSWORD:</label><br/>
    <input type="password" class="input" placeholder="retype your password" name="passy"/><br/></P>
</tr>
<button type="submit" value="Pass" name="pass_user" class="regbtn">Reset</button>
</form>
</fieldset>
<p><a href="/View/public/login.php">Login</a></p>
<P>Don't have an account ? <a href="/View/public/registration.php">Register Here</a></P>
</div>
<footer>

</footer>
    </body>
</html>