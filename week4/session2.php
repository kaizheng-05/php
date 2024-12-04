<?php session_start();?>
<!DOCTYPE HTML>
<html>
    <body>
    <?php 
    echo "name:".$_SESSION["name"]."<br>";
    echo "email:".$_SESSION["email"]."<br>";
    ?> 
    </body>
</html>