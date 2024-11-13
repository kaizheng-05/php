<!DOCTYPE html>
<html>
    <style>
        .q1{color:green; font-style: italic; font-size: 100px;}
        .q2{font-style: italic; color: blue; font-size: 100px;}
        .q3{font-weight: bold; color: red; font-size: 100px;}
        .q4{font-style: italic; font-weight: bold; font-size: 100px;}
    </style>
    <body>
        <p class=q1><?php echo(rand(100,200));?></p>
        <p class=q2><?php echo(rand(100,200));?></p>
        <p class=q3><?php echo(rand(100,200));?></p>
        <p class=q4><?php echo(rand(100,200));?></p>
    </body>
</html>