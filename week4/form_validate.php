<!DOCTYPE HTML>
<html>  
  <body>

    Welcome <?php echo $_POST["name"]; ?><br>
    Your Email: <?php $mail= $_POST["email"];
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      echo "$mail is a valid email address";
    } 
    else {
      echo "$mail is not a valid email address";
    }
     ?><br>
    age: <?php $age=$_POST["age"];
    if ($age >= 18 && $age < 100){
      echo "$age is a numeric value";
    }
    else{
      echo "$age is not a numeric value";
    }?>
    <br>
  </body>
</html>