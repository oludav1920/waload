<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>


 <div class="columns2-unequal-middle-div white-bg">
    <?php
    include($_SERVER['DOCUMENT_ROOT']."/Controller/Admin/Paymentgateway/Paymentfetch.php");
    $backendResponseDecode = json_decode($backendResponse, true);
    if($backendResponseDecode["status"] =="success"){
        $response=$backendResponseDecode["response"];

        echo '<table style=" width: 100%;">';
        echo '<tr>';
        echo '<th>';
        echo 'PAYMENT GATEWAY';
        echo '</th>';
        echo '<th>';
        echo 'DISCOUNT';
        echo '</th>';
        echo '<th>';
        echo 'API';
        echo '</th>';
        echo '<th>';
        echo 'STATUS';
        echo '</th>';
         echo '<th>';
        echo 'EDIT';
        echo '</th>';
         echo '<th>';
        echo 'REMOVE';
        echo '</th>';
        echo '</tr>';

        for($i = 0; $i < count($response); $i++){
            $ind = $response[$i]["index"];
            $pay = $response[$i]["payment"];
            $dis = $response[$i]["discount"];
            $api = $response[$i]["api"];
            $sta = $response[$i]["status"];

        echo '<tr style="text-align: center;">';
        echo '<td>';
        echo $pay;
        echo '</td>';
        echo '<td>';
        echo $dis;
        echo '</td>';
        echo '<td>';
        echo $api;
        echo '</td>';
        echo '<td>';
        echo $sta;
        echo '</td>';
        echo '<td>';
        echo '<a href="/Admin/payment_gateway/paymentedit.php?net='.$ind.'">';
        echo '<button>Edit</button>';
        echo '</a>';
        echo '</td>';
        echo '<td>';
        echo '<a href="/Controller/Admin/Paymentgateway/PaymentdeleteController.php?user='.$ind.'">';
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