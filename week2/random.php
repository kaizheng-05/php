<!DOCTYPE html>
<html>
    <style>
        .q1{color:green; font-style: italic; font-size: 70px;}
        .q2{font-style: italic; color: blue; font-size: 70px;}
        .q3{font-weight: bold; color: red; font-size: 70px;}
        .q4{font-style: italic; font-weight: bold; font-size: 70px;}
    </style>
    <body>
        <?php 
        $num1=(rand(100,200));
        $num2=(rand(100,200));
        ?>
        <p class=q1><?php echo $num1 ?></p>
        <p class=q2><?php echo $num2 ?></p>
        <p class=q3><?php echo $num1+$num2 ?></p>
        <p class=q4><?php echo $num1*$num2 ?></p>
    </body>
</html>