<?php
session_start();
?>
<html>
    <head></head>

    <body>
        <form action="pro.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="photo"/>
            <input type="hidden" name="email" value="<?php echo $_SESSION['EMAIL'] ?>"/>
            <button type="submit">Upload</button>
        </form>
    </body>
</html>