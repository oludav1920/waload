<?php
session_start();
//include("connect.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oludav must serious</title>
    <link rel="stylesheet" href="/Show/airtime.css"/>
    <script src="/Show/jquery.js"></script>
</head>
<body style="background-color: rgb(230, 235, 240);">
  <table><tr>
    <td><img src="/Image/imageod1.jpg" alt="image here" class="img"/></td>
    <td><span>Hi,
      <?php
      echo $_SESSION['USERNAME'];
      ?>

    </span></td>
  </tr></table>
        
        <div class="div1">

          <ul type="none" class="ull">
            <li><span class="sp1">balance</span></li>
            <li><a href="history.php" class="td1">History </a></li>
          </ul>
          <ul type="none" class="ull">
            <li><span class="sp2">0.00</span></li>
            <li><button class="b1"><a href="depo.html" style="text-decoration: none;">+ Deposit</a></button></li>
          </ul>
          
        </div>

    <div style="text-align: center; color: navy;">
        <h1>Electricity</h1>
        <fieldset class="divr">
<form action="" method="" enctype="multipart/form-data" >
    <P><label class="lab">Select Electricity:</label><br/>
    <select class="input" name="electricitytype">
        <option value="">Choose One</option><hr/>
        <option value="">ABUJA_ELECTRICITY</option><hr/>
        <option value="">BENIN_ELECTRICITY (BEDC)</option><hr/>
        <option value="">EKO_ELECTRICITY</option><hr/>
        <option value="">ENUGU_ELECTRICITY_EEDC</option><hr/>
        <option value="">IBADAN_ELECTRICITY</option><hr/>
        <option value="">IKEJA_ELECTRICITY</option><hr/>
        <option value="">JOS_ELECTRICITY</option><hr/>
        <option value="">KADUNA_ELECTRICITY</option><hr/>
        <option value="">KANO_ELECTRICITY</option><hr/>
        <option value="">PORT_HARCOURT_ELECTRICITY</option><hr/>
    </select><br/></P><hr/>
    <P><label class="lab">Meter Type:</label><br/>
    <select class="input" name="metertype">
        <option value="">Choose One</option>
        <option value="">Prepaid</option>
        <option value="">Postpaid</option>
    </select><br/></P><hr/>
    <P><label class="lab">Meter Number:</label><br>
<input type="number" name="meternumber" class="input" placeholder="insert the meter number" value=""/><br/></P><hr/>
<P><label class="lab">Amount:</label><br>
<input type="number" name="amount" class="input" placeholder="insert the amount" value=""/><br/></P><hr/>
<input type="hidden" id="email" name="ema" value="<?php echo $_SESSION['EMAIL'] ?>"/>
<button class="regbtn">submit</button>
</form>
</fieldset>
    </div>
    <footer>
        
    </footer>
    <script src="oludav.js"></script>
</body>
</html>