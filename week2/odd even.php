<!DOCTYPE html>
<html>
    <style>
        
    </style>
    <body>
    <?php
    $num1=rand(1,100);
    if ($num1 % 2==0) {  
     echo "<p>$num1 is even";
     }
     else{
         echo "<p>$num1 is odd";
     }
    ?>
    </body>
</html>