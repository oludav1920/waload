<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
?>
<!DOCTYPE html>
<html>
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
        <h1>Airtime</h1>
        <div id="dis" ></div>
        <?php
        if(isset($_GET['error']))
        {
          echo '<font style="color: red;">';
          echo "Fill all box";
          echo "</font>";
        }

        if(isset($_GET['alert']))
        {
          echo "<script>";
          echo 'window.alert("Are you sure the datas are correct?")';
          echo "</script>";
        }
        ?>
        <fieldset class="divr">
<form>
    <P><label class="lab">Network:</label></br>
    <select id="net" class="input">
        <option value="">Choose One</option>
        <option value="9Mobile">9Mobile</option>
        <option value="MTN">MTN</option>
        <option value="GLO">GLO</option>
        <option value="Airtel">Airtel</option>
    </select><br/></P><hr/>
    <P><label class="lab">Number:</label></br>
<input type="number" id="num" class="input" placeholder="insert number" value=""/><br/></P><hr/>
<P><label class="lab">Amount:</label></br>
<input type="number" id="numb" class="input" placeholder="insert the amount" value=""/><br/></P><hr/>
<input type="hidden" id="email" value="<?php echo $_SESSION['EMAIL'] ?>"/>
<button onclick="openModal()" type="submit" class="regbtn">submit</button>
</form>
</fieldset>
    </div>

    <footer>
        
    </footer>
    <script src="oludav.js"></script>

  <style>
    #modal{
      position: fixed;
      top:0;
      left:0;
      width: 100%;
      z-index: 100;
      opacity: 1.0;
      display:none;
      background-color:#00f;
      height:400px;
      box-shadow:3px 4px 8px 6px rgba(0,0,0,0.5);
    }

    #modal-inner{
      width:80%;
      margin-left:10%;
      height:180px
    }

    #closediv{
      width:100%;
    }

    #closebtn{
      max-height:100px;
      max-width:100px;
      background-color:red;
      color:white;
      cursor:pointer;
    }
  </style>
  <script>
      
    function openModal(){
      event.preventDefault();
      let net = document.getElementById('net').value;
      let num = document.getElementById('num').value;
      let numb = document.getElementById('numb').value;
      let email = document.getElementById('email').value;

      if(net ==="" || net ==="null" || net ==="undefined" || num ==="" || num ==="null" || num ==="undefined" 
      || numb==="" || numb==="null" || numb==="undefined"){
        document.getElementById('dis').innerHTML="Fill all box";
        document.getElementById('dis').style.color="red";
        return;
      }
      //else if(net !=="" && net!=="null" && net !=="undefined" && num !=="" && num !=="null" && num !=="undefined
       //&& numb !=="" && numb !=="null" && numb !=="undefined"){

      document.getElementById('modal').style.display="block";
      document.getElementById('modal-inner').innerHTML=`
      <div style="text-align:center; padding:20px;">
      Your Inputs: <br />
      Network : ${net} <br />
      Number : ${num} <br />
      Amount : ${numb} <br />
      Are you sure the data are correct and you want to continue ?
      <br /> 
      <button id="ldt" onclick="takeItToProcess('${net}', '${num}', '${numb}', '${email}')">Yes Continue</button> &nbsp;&nbsp;&nbsp;&nbsp; <button onclick="closeModal()">Cancel</button>
      </div>
      `;
    }

    function closeModal(){
      event.preventDefault();
      document.getElementById('modal').style.display="none";
    }

    function takeItToProcess(w, x, y, z){
      event.preventDefault()
      let dataToSend =`net=${net}&num=${num}&numb=${numb}&email=${email}`;
        $.ajax({
          url:"/Airtime/Query/airtimebackend.php",
          method:"POST",
          data: dataToSend,
          dataType:"html",
          cache:false,
          beforeSend:function(){
            document.getElementById('ldt').textContent="Loading...";
          },
          success:function(result){
            document.getElementById('ldt').innerHTML=result;
          }
        });
    }
  //}
  
  </script>
  <div id="modal">
    <div id="closediv">
      <button id="closebtn" onclick="closeModal()">X</button>
    </div>
    <div id="modal-inner">
    </div>
  </div>
</body>
</html>