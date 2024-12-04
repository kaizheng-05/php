<!DOCTYPE HTML>
<html>  
  <body>

    <form action="<?php echo $_SERVER["PHP_SELF"]?>"  method="post">
    Name: <input type="text"name="name"><br>
    password: <input type="text"name="password"><br>
<input type="submit">
    </form>

  </body>
</html>
<?php 
if(!empty($_POST))
{
    if($_POST["name"]=="admin" && $_POST["password"]=="1234")
    {
        echo "<p>Login successful!</p>";
    }
    elseif($_POST["name"]!="admin")
    {
        echo "<p>Invalid username</p>";
    }
    else
    {
        echo "<p>Invalid password</p>";
    }
}
?>