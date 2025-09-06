<?php
session_start();
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
    <link rel="stylesheet" href="/Show/vtu.css"/>
    <!--<link rel="stylesheet" href="drop.css"/>-->
</head>
<body>
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
            <li><button class="b1"><a href="/View/public/deposit.php" style="text-decoration: none;">+ Deposit</a></button></li>
          </ul>
          
        </div>
                
    <form action="" method="POST" enctype="multipart/form-data">
        <p><label style="color: navy;">History</label></p>
            <input type="search" placeholder="Search History" style="border-radius: 5px; height: 40px; width: 70%;"/>
            <button style="background-color: navy; border-radius: 5px; color: aliceblue; height: 40px; width: 90px;">Search</button>
    </form>
    <hr/>
    <div>

    </div>
</body>
</html>