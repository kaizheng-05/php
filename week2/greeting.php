<!DOCTYPE html>
<html>
    <style>
        
    </style>
    <body>
    <?php
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $hour=date("G");
    if($hour >=5 && $hour<=11)
    {
        echo "<p>good morning</p>";
    }
    elseif($hour >=12 && $hour<=17)
    {
        echo "<p>good afternoon</p>";
    }
    elseif($hour >=18 && $hour<=21)
    {
        echo "<p>good evening</p>";
    }
    else{
        echo "<p>good night</p>";
    }
    ?>
    </body>
</html>