<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a customer - PHP CRUD Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>  
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Create customer</h1>
        </div>
      
        <?php
if($_POST){
    // include database connection
    include 'config/database.php';
    try{
// posted values
        $username=$_POST['username'];
        $password=$_POST['password'];
        $firstname=$_POST['first_name'];
        $lastname=$_POST['last_name'];
        $gender=$_POST['gender'];
        $dateofbirth=$_POST['date_of_birth'];
        // insert query
        $query = "INSERT INTO products SET username=:username, password=:password, first_name=:first_name, last_name=:last_name, gender=:gender, date_of_birth=:date_of_birth";
        // prepare query for execution
        $stmt = $con->prepare($query);
        // bind the parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':first_name', $firstname);
        $stmt->bindParam(':last_name', $lastname);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':date_of_birth', $dateofbirth);
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Product was added.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        } 
    }
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>

<!-- html form here where the product information will be entered -->
<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>username</td>
            <td><input type='text' name='username' class='form-control' /></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type='password' name="password" class='form-control'></td>
        </tr>
        <tr>
            <td>first name</td>
            <td><input type='text' name='first_name' class='form-control' /></td>
        </tr>
        <tr>
        <tr>
            <td>last name</td>
            <td><input type='text' name='last_name' class='form-control' /></td>
        </tr>
        <tr>
            <td>gender</td>
            <td><input type="radio" id="male" name="gender" value="Male"  />male<br>
            <input type="radio" id="female" name="gender" value="female"  />female</td>
        </tr>
        <tr>
            <td>date of birth</td>
            <td><input type='date' name='date_of_birth' class='form-control' /></td>
        </tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to read customer</a>
            </td>
        </tr>
    </table>
</form>


    </div> 
    <!-- end .container -->  
</body>
</html>

