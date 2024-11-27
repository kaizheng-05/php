<?php 
if(!empty($_POST))
{
  echo $_POST["name"]."<br>";
  $mail= $_POST["email"];
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      echo "$mail is a valid email address"."<br>";
    } 
    else {
      echo "$mail is not a valid email address"."<br>";
    }
  $age=$_POST["age"];
    if ($age >= 18 && $age < 100){
      echo "$age is a numeric value"."<br>";
    }
    else{
      echo "$age is not a numeric value"."<br>";
    } 
}?>
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