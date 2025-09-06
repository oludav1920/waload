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
        <h1>Transfer Fund To Another User</h1>
        <fieldset class="divr">
<form action="" method="" enctype="multipart/form-data" >
<P><tr><label class="lab">Recipient Email:</label><br/>
<input type="text" class="input" placeholder="type the email he/she registered with"/><br/></P><hr/>
<P><tr><label class="lab">Amount To Transfer:</label><br/>
    <input type="number" class="input" placeholder="type the amount"/><br/></P><hr/>
<P><label class="lab">Password:</label><br/>
<input type="password" class="input" placeholder="insert your password" value=""/><br/></P><hr/>
</tr>
<button class="regbtn">Transfer</button>
</form>
</fieldset>

</div>
<footer>
    
</footer>
    </body>
</html>