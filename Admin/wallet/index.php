<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>


 <div class="columns2-unequal-middle-div white-bg">
    <?php
    include($_SERVER['DOCUMENT_ROOT']."/Controller/Admin/Wallet/WalletfetchController.php");
    $backendResponseDecode = json_decode($backendResponse, true);
    if($backendResponseDecode["status"] =="success"){
        $response=$backendResponseDecode["response"];

        echo '<table style=" width: 100%;">';
        echo '<tr>';
        echo '<th>';
        echo 'EMAIL';
        echo '</th>';
        echo '<th>';
        echo 'BALANCE';
        echo '</th>';
        echo '<th>';
        echo 'TOTAL DEPOSIT';
        echo '</th>';
        echo '<th>';
        echo 'TOTAL SPENT';
        echo '</th>';
        echo '<th>';
        echo 'CURRENCY';
        echo '</th>';
         echo '<th>';
        echo 'EDIT';
        echo '</th>';
         echo '<th>';
        echo 'REMOVE';
        echo '</th>';
        echo '</tr>';

        for($i = 0; $i < count($response); $i++){
            $ind = $response[$i]["id"];
            $ema = $response[$i]["email"];
            $bal = $response[$i]["balance"];
            $tod = $response[$i]["totaldeposit"];
            $tos = $response[$i]["totalspent"];
            $cur = $response[$i]["currency"];

        echo '<tr style="text-align: center;">';
        echo '<td>';
        echo $ema;
        echo '</td>';
        echo '<td>';
        echo $bal;
        echo '</td>';
        echo '<td>';
        echo $tod;
        echo '</td>';
        echo '<td>';
        echo $tos;
        echo '</td>';
        echo '<td>';
        echo $cur;
        echo '</td>';
        echo '<td>';
        echo '<a href="/Admin/Wallet/walletedit.php?net='.$ind.'">';
        echo '<button>Edit</button>';
        echo '</a>';
        echo '</td>';
        echo '<td>';
        echo '<a href="/Controller/Admin/Wallet/WallettdeleteController.php?user='.$ind.'">';
        echo '<button>Delete</button>';
        echo '</a>';
        echo '</td>';
        echo '</tr>';
        }
        echo '</table>';
    }
    else{
        echo $backendResponseDecode["response"];
        return;
    }
    ?>

</div>



<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/foot.php") ?>