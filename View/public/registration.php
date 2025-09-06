
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/icon" href="/Image/imageod1.jpg" />
    <title>Odbest.com</title>
    <link rel="stylesheet" href="/Show/reg_login.css"/>
    <!--<link rel="stylesheet" href="drop.css"/>-->
</head>
<body>
  <div class="div">
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
  </div>
        
    <div class="div3">
    <img src="/Image/imageod1.jpg" alt="image here" class="img1"/>
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
<form action="/Controller/RegisterController.php" method="POST" enctype="multipart/form-data" >
   <P><tr><label class="lab">FULLNAME:</label><br/>
    <input type="text" name="fname" class="input" placeholder="type your fullname"/><br/></P><hr/>
   <P><label  class="lab">USERNAME:</label><br/>
    <input type="text" name="uname" class="input"placeholder="type your username"/><br/></P><hr/>
    <P><label  class="lab">EMAIL:</label><br/>
        <input type="email" name="semail" class="input" placeholder="insert your email" value=""/><br/></P><hr/>
    <P><label  class="lab">DATE OF BIRTH:</label><br/>
    <input type="date" name="dob" class="input" placeholer="type your DOB"/><br/></P><hr/>
    <P><label  class="lab">NATIONALITY:</label><br/>
    <select name="country" class="input">
        <option value="">Choose One</option>
        <option value="Algeria">Algeria</option>
        <option value="Cameroon">Cameroon</option>
        <option value="Ghana">Ghana</option>
        <option value="Nigeria">Nigeria</option>
        <option value="South Africa">South Africa</option>
    </select><br/></P><hr/>
<P><label  class="lab">PASSWORD:</label><br/>
<input type="password" name="ypass" class="input" placeholder="insert your password" value=""/><br/></P><hr/>
<P><label  class="lab">RE-PASSWORD:</label><br/>
<input type="password" name="yypass" class="input" placeholder="Confirm your password"/><br/></P><hr/>
<button type="submit" value="Register" name="register_user" class="regbtn">Submit</button>
</form>
</fieldset>
<P>Have you registered before? <a href="/View/public/login.php" style="text-decoration: none;">LOGIN</a></P>
<p>Register with your google account.<a href="" style="text-decoration: none;">&nbsp GOOGLE</a></p>
<p>Register with your facebook account.<a href="" style="text-decoration: none;">&nbsp FACEBOOK</a></p>
    </div>
    <footer>

    </footer>
    <script src="oludav.js"></script>
    <script>
      function display(){
        event.preventDefault();
        document.getElementById('can').style.display="block";
        document.getElementById('no1').style.display="block";
        document.getElementById('no2').style.display="block";
        document.getElementById('no3').style.display="block";
        document.getElementById('no4').style.display="block";
        document.getElementById('but').style.display="none";
      }
      function back(){
        document.getElementById('can').style.display="none";
        document.getElementById('no1').style.display="none";
        document.getElementById('no2').style.display="none";
        document.getElementById('no3').style.display="none";
        document.getElementById('no4').style.display="none";
        document.getElementById('but').style.display="block";
      }
    </script>
</body>
</html>