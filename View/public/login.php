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
        <h1>LOGIN PAGE</h1>
    <div style="text-align: center;">
        <?php
        if(isset($_GET['ERROR']))
        {
          echo '<font style="color: red;">';
            echo "Incorrect Email or Password";
            echo "</font>";
        }
        ?>
        <?php
        if(isset($_GET['ERRORPASS']))
        {
          echo '<font style="color: red;">';
            echo "Fill all empty box";
            echo "</font>";
        }
        ?>
        </div>

    <fieldset class="divr" >
<form action="/Controller/Login/LoginController.php" method="POST" enctype="multipart/form-data" >
<P><tr><label class="lab">EMAIL:</label><br/>
<input type="text" name="semail" class="input"/ placeholder="insert your registered email" ><br/></P><hr/>
<P><label class="lab">PASSWORD:</label><br/>
<input type="password" name="ypass" class="input" placeholder="insert your password" value=""/><br/></P><hr/>
</tr>
<button type="submit" value="Login" name="login_user" class="regbtn">Login</button>
</form>
</fieldset>
<p>Forget Password? <a href="/View/public/resetp1.php" style="text-decoration: none;">Click Here</a></p>
<P>You've not register? <a href="/View/public/registration.php" style="text-decoration: none;">Register Here</a></P>
<p>Login with your google account<a href="" style="text-decoration: none;">&nbsp &nbspGOOGLE</a></p>
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