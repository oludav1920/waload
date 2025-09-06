<?php
include($_SERVER["DOCUMENT_ROOT"]."/Schema/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/Schema/tables.php");

Class Api{
    public function userApi($apin, $apik, $stat){
        try{
            global $apiTable;
            global $apiTableId;
            global $conn;

            if($apin !="" && $apik !="" && $stat !=""){

                    $qq = $conn->prepare("INSERT INTO $apiTable(
                    Apiname, Apikey, Statu) VALUES(:an, :ak, :st )");
                    $qq->bindParam(':an', $apin, PDO::PARAM_STR);
                    $qq->bindParam(':ak', $apik, PDO::PARAM_STR);
                    $qq->bindParam(':st', $stat, PDO::PARAM_STR);
                    $qq->execute();

                    if($qq){
                        return json_encode(array("status"=>"success", "response"=>"
                        ?> 
                        <script>
                        window.location='/Admin/api/'; 
                        </script> 
                        <?php 
                        exit();
                        "), true);
                    }
                    else{
                        return json_encode(array("status"=>"failed", "response"=>"oops!! something went wront"), true);
                    }
            }
            else{
                $output = array("status"=>"failed", "response"=>"
                ?>  
                <script>
                window.location='/Admin/api/apiform.php? error'; 
                </script> 
                <?php 
                exit();");
                return json_encode($output, true);
            }
        }
        catch(Exception $e){
            $output = array("status"=>"failed", "response"=>$e->getMessage());
            return json_encode($output, true);
        }
    }
}

$newApi = new Api();
?>