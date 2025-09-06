<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>


 <div class="columns2-unequal-middle-div white-bg">      
    <?php
    echo "<hr/>";
        include($_SERVER["DOCUMENT_ROOT"]."/Controller/Admin/Airtime/AirtimefetchController.php");
        $backendResponseDecode = json_decode($backendResponse, true);
        if($backendResponseDecode["status"] =="success"){
            $response = $backendResponseDecode["response"];

            echo '<table style="width:100%;">';
                echo '<th>';
                echo '<tr>';
                echo '<th>'; 
                echo 'NETWORK';
                echo '</th>';
                echo '<th>'; 
                echo 'STATUS';
                echo '</th>';
                echo '<th>'; 
                echo 'DISCOUNT';
                echo '</th>';
                echo '<th>'; 
                echo 'API';
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
                $nato = $response[$i]["network"];
                $stato = $response[$i]["stat"];
                $disto = $response[$i]["discount"];
                $ato = $response[$i]["api"];
                //echo "$nato $stato $disto $ato";
                //echo "<hr/>";
                
                echo '<tr style="text-align: center;">';
                echo '<td>'; 
                echo $nato;
                echo '</td>';
                echo '<td>'; 
                echo $stato;
                echo '</td>';
                echo '<td>'; 
                echo $disto;
                echo '</td>';
                echo '<td>'; 
                echo $ato;
                echo '</td>';
                echo '<td>'; 
                echo '<a href="/Admin/airtime/airtimeedit.php?idx='.$ind.'">';
                echo '<button>Edit</button>';
                echo '</a>';
                echo '</td>';
                echo '<td>'; 
                echo '<a href="/Controller/Admin/Airtime/AirtimedeleteController.php?user='.$ind.'">';
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