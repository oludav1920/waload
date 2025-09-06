<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/head.php") ?>

<?php include($_SERVER["DOCUMENT_ROOT"]."/Admin/left.php") ?>


 <div class="columns2-unequal-middle-div white-bg">
        


    <?php
    echo "<hr/>";
        include($_SERVER["DOCUMENT_ROOT"]."/Controller/UserfetchController.php");
        $backendResponseDecode = json_decode($backendResponse, true);
        if($backendResponseDecode["status"] =="success"){
            $response = $backendResponseDecode["response"];

            echo '<table style="width:100%;">';
                echo '<th>';
                echo '<tr>';
                echo '<th>'; 
                echo 'FULLNAME';
                echo '</th>';
                echo '<th>'; 
                echo 'USERNAME';
                echo '</th>';
                echo '<th>'; 
                echo 'EMAIL';
                echo '</th>';
                echo '<th>'; 
                echo 'DOB';
                echo '</th>';
                echo '<th>'; 
                echo 'COUNTRY';
                echo '</th>';
                echo '<th>'; 
                echo 'PASSWORD';
                echo '</th>';
                echo '<th>'; 
                echo 'OTP';
                echo '</th>';
                echo '<th>'; 
                echo 'EDIT';
                echo '</th>';
                echo '<th>'; 
                echo 'REMOVE';
                echo '</th>';
                echo '</tr>';
                

            for($i = 0; $i < count($response); $i++){
                $neto = $response[$i]["fullname"];
                $stato = $response[$i]["username"];
                $disto = $response[$i]["email"];
                $ato = $response[$i]["dob"];
                $atan = $response[$i]["nation"];
                $pato = $response[$i]["passwod"];
                $atop = $response[$i]["otp"];
                
                
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
                echo $ato;
                echo '</td>';
                echo '<td>'; 
                echo $atan;
                echo '</td>';
                echo '<td>'; 
                echo $pato;
                echo '</td>';
                echo '<td>'; 
                echo $atop;
                echo '</td>';
                echo '<td>';
                echo '<a href="/Admin/user/Useredit.php?user='.$disto.'">';
                echo '<button>Edit</button>';
                echo '</a>';
                echo '</td>';
                echo '<td>'; 
                echo '<a href="/Controller/UserdeleteController.php?user='.$disto.'">';
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