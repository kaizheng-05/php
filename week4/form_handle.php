<?php 
if(!empty($_POST))
{
    echo $_POST["name"]."<br>";
    echo $_POST["email"]."<br>";
    echo $_POST["age"]."<br>";
}
?>
<!DOCTYPE HTML>
<html>  
  <body>

    <form action="<?php echo $_SERVER["PHP_SELF"]?>"  method="post">
    Name: <input type="text"name="name"><br>
    E-mail: <input type="text"name="email"><br>
    age: <input type="text"name="age"><br>
<input type="submit">
    </form>

  </body>
</html>