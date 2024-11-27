<!DOCTYPE html>
<html>
    <body>
    <?php
    $username="kai";
    $password="0030";
    $inputn="kai";
    $inputp="0030";
    if($inputn==$username && $inputp==$password)
    {
        echo "<p>Login successful!</p>";
    }
    elseif($inputn!=$username)
    {
        echo "<p>Invalid username</p>";
    }
    else
    {
        echo "<p>Invalid password</p>";
    }
    ?>
    </body>
</html>