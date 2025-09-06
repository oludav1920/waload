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
        <h1>RESET PASSWORD</h1>

    <fieldset class="divr" >
<form action="" method="POST" enctype="multipart/form-data" >
<P><tr><label class="lab">EMAIL:</label><br/>
<input type="text" name="semail" class="input" placeholder="insert your registered email" ><br/></P>
<button class="regbtn" >Send Reset Link</button>
</form>
</fieldset>
<p><a href="/View/public/login.php">Login</a></p>
<P>Don't have an account ? <a href="/View/public/registration.php">Register Here</a></P>
</div>
<footer>
    
</footer>
    </body>
</html>



<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

if(isset($_POST["semail"])){
  $uemail = trim(htmlspecialchars($_POST["semail"])) ?? "";
  //check if the email was registered
  $q = $conn->prepare("SELECT OTP, Email FROM odbest_reg WHERE Email=:em");
  $q->bindParam(':em', $uemail, PDO::PARAM_STR);
  $q->execute();
  if($q->rowCount() > 0){
    $nownow = strtotime(date("Y-m-d H:i:s"));
    $genOtp = md5($nownow.$uemail);
    $otpUsed = substr($genOtp, 0, 5);

    //UPDATE THE USER ROW WITH THE GENERATED OTP
    $qq = $conn->prepare("UPDATE odbest_reg SET OTP=:otp WHERE Email=:em");
    $qq->bindParam(':otp', $otpUsed, PDO::PARAM_STR);
    $qq->bindParam(':em', $uemail, PDO::PARAM_STR);
    $qq->execute();
    if($qq){
      //SEND LINK TO EMAIL
      //$linkToSend ="http://192.168.8.199/View/public/resetp2.php?otp=$otpUsed&email=$uemail";
      ?>
      <script>
        window.location=`/mail.php?linksend=http://192.168.8.199/View/public/resetp2.php?otp=<?php echo $otpUsed; ?>&email=<?php echo $uemail; ?>`;
      </script>
      <?php
      //include($_SERVER["DOCUMENT_ROOT"]."/mail.php");

    }
    else{
      echo "failed to generate otp";
    }
  }
  else{
    echo "Account not found";
  }

}
?>