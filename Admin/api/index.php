<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>


 <div class="columns2-unequal-middle-div white-bg">      
    <?php
    echo "<hr/>";
        include($_SERVER["DOCUMENT_ROOT"]."/Controller/Admin/Api/ApiqController.php");
        $backendResponseDecode = json_decode($backendResponse, true);
        if($backendResponseDecode["status"] =="success"){
            $response = $backendResponseDecode["response"];

            echo '<table style="width:100%;">';
                echo '<th>';
                echo '<tr>';
                echo '<th>'; 
                echo 'APIKEY';
                echo '</th>';
                echo '<th>'; 
                echo 'APIKEY';
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
                $ind = $response[$i]["id"];
                $neto = $response[$i]["apiname"];
                $stato = $response[$i]["apikey"];
                $disto = $response[$i]["statu"];
                
                
                echo '<tr style="text-align: center;">';
                echo '<td>'; 
                echo $neto;
                echo '</td>';
                echo '<td>'; 
                echo $stato;
                echo '</td>';
                echo '<td>'; 
                echo $disto;
                echo '</td>';
                echo '<td>'; 
                echo '<a href="/Admin/api/apiedit.php? inx='.$ind.'">';
                echo '<button>Edit</button>';
                echo '';
                echo '</td>';
                echo '<td>'; 
                echo '<button>Delete</button>';
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