<div class="columns2-unequal-left-div-fixed black-bg">
            
    <style>
        .dropdown{
            position: relative;
            display: inline-block;
        }
        .dropdown-button{
            background-color: navy;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        .dropdown-button:hover{
            background-color: #3e8e41;
        }
        .dropdown-content{
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            border-radius: 10px;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a{
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover{
            background-color: #f1f1f1;
            border-radius: 10px;
        }
        .dropdown:hover .dropdown-content{
            display: block;
        }
        .dropdown:hover .dropdown-button{
            background-color: #3e8e41;
        }

    </style>
    
    <!--<li>
        <div class="dropdown">
            <button class="dropdown-button">Dropdown</button>
            <div class="dropdown-content">
                <a href="#">Airtime</a><hr/>
                <a href="#">Data</a><hr/>
                <a href="#">cable</a>
            </div>
        </div>
    </li>-->
    <li><a href="" onclick="home()" style="color: white;">HOME</a></li><hr/>
    <li><div class="dropdown">
            <span style="color: white; font-size: large;">Airtime</span>
            <div class="dropdown-content">
                <a href="/Admin/airtime">View Plan</a><hr/>
                <a href="/Admin/airtime/airform.php">Add Plan</a><hr/>
        </div>
    </li><hr/>
    <li><div class="dropdown">
            <span style="color: white; font-size: large;">Data-Type</span>
            <div class="dropdown-content">
                <a href="/Admin/data/data-type.php">View Type</a><hr/>
                <a href="/Admin/data/data-typef.php">Add Type</a><hr/>
        </div>
    </li><hr/>
    <li><div class="dropdown">
            <span style="color: white; font-size: large;">Data-Plan</span>
            <div class="dropdown-content">
                <a href="/Admin/data/data-plan.php">View Data-Plan</a><hr/>
                <a href="/Admin/data/data-planf.php">Add Data-Plan</a><hr/>
        </div>
    </li><hr/>
    <li><div class="dropdown">
            <span style="color: white; font-size: large;">Cable-Type</span>
            <div class="dropdown-content">
                <a href="/Admin/cable/cable-type.php">View Type</a><hr/>
                <a href="/Admin/cable/cable-typef.php">Add Type</a><hr/>
        </div>
    </li><hr/>
    <li><div class="dropdown">
            <span style="color: white; font-size: large;">Cable-Plan</span>
            <div class="dropdown-content">
                <a href="/Admin/cable/cable-plan.php">View Cable-Plan</a><hr/>
                <a href="/Admin/cable/cable-planf.php">Add Cable-Plan</a><hr/>
        </div>
    </li><hr/>
    <li><div class="dropdown">
            <span style="color: white; font-size: large;">Electricity</span>
            <div class="dropdown-content">
                <a href="/Admin/electricity/index.php">View Plan</a><hr/>
                <a href="/Admin/electricity/electform.php">Add Plan</a><hr/>
        </div>
    </li><hr/>
        <li><div class="dropdown">
            <span style="color: white; font-size: large;">Result</span>
            <div class="dropdown-content">
                <a href="/Admin/result/index.php">View Plan</a><hr/>
                <a href="/Admin/result/resultform.php">Add Plan</a><hr/>
        </div>
    </li><hr/>
    <li><div class="dropdown">
            <span style="color: white; font-size: large;">Payment_Gateway</span>
            <div class="dropdown-content">
                <a href="/Admin/payment_gateway/index.php">View Plan</a><hr/>
                <a href="/Admin/payment_gateway/paymentform.php">Add Plan</a><hr/>
        </div>
    </li><hr/>
    <li><a href="" onclick="" style="color: white;">Bulk SMS</a></li><hr/>
    <li><a href="" onclick="" style="color: white;">Transfer</a></li><hr/>
    <li><a href="" onclick="" style="color: white;">Data Pins</a></li><hr/>
    <li><a href="" onclick="" style="color: white;">Recharge Pins</a></li><hr/>
    <li><a href="" onclick="" style="color: white;">Earn</a></li><hr/>
    <li><a href="" onclick="" style="color: white;">Affiliate</a></li><hr/>
    <li><a href="" onclick="" style="color: white;">Reward</a></li><hr/>
    <li>
        <div class="dropdown">
            <span style="color: white; font-size: large;">API-Docs</span>
            <div class="dropdown-content">
                <a href="/Admin/api/">View API</a><hr/>
                <a href="/Admin/api/apiform.php">Add API</a><hr/>
        </div>
    </li><hr/>
    <li><div class="dropdown">
            <span style="color: white; font-size: large;">Wallet</span>
            <div class="dropdown-content">
                <a href="/Admin/wallet/">View Wallet</a><hr/>
                <a href="/Admin/wallet/walletform.php">Add Wallet</a><hr/>
        </div>
    </li><hr/>
    <li><div class="dropdown">
            <span style="color: white; font-size: large;">User</span>
            <div class="dropdown-content">
                <a href="/Admin/user/">View User</a><hr/>
                <a href="/Admin/user/userform.php">Add User</a><hr/>
        </div>
    </li><hr/>
    <li><a href="" onclick="" style="color: white;">Profile</a></li><hr/>
                </ul>
</div>