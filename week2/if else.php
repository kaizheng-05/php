<!DOCTYPE html>
<html>
    <style>
        .big{font-weight: bold; font-size: 100px;}
    </style>
    <body>
    <?php
    $num1=rand(1,100);
    $num2=rand(1,100);
    $big=0;
    $small=0;
    if ($num1 > $num2) {  
     $big=$num1;
     $small=$num2;
     }
     else{
         $big=$num2;
         $small=$num1;
     }
     echo "<p class=big> $big </p>";
     echo "<p>$small</p>";
    ?>
    </body>
</html>