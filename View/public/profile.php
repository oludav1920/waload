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
    <div style="margin-top: 20px;">
      <ul type="none" style="justify-content: space-between; display: flex;">
        <li><svg xmlns="http://www.w3.org/2000/svg" style=" " width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
              </svg>
        </li>
        <li><span class="" style="">Contact Us</span></li>
        <li><svg xmlns="http://www.w3.org/2000/svg" style="" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
              </svg></li>
      </ul>

    </div>
    <?php
      //echo $_SESSION['PROFILEPIX'];
      ?>

    <footer>
        
    </footer>
    <script src="oludav.js"></script>
</body>
</html>