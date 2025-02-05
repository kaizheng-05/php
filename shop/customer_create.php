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
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="product_create.php">create product</a>
        <a class="nav-link" href="product_listing">product listing</a>
        <a class="nav-link" href="customer_create.php">create customer</a>
        <a class="nav-link" href="customer_listing.php">customer listing</a>
      </div>
    </div>
  </div>
</nav>
        <?php
if($_POST){
    // include database connection
    include 'config/database.php';
    try{
// posted values
        $email=$_POST['email'];
        $password=$_POST['password'];
        $firstname=$_POST['first_name'];
        $lastname=$_POST['last_name'];
        $gender=$_POST['gender'];
        $dateofbirth=$_POST['date_of_birth'];
        // insert query
        $query = "INSERT INTO products SET email=:email, password=:password, first_name=:first_name, last_name=:last_name, gender=:gender, date_of_birth=:date_of_birth";
        // prepare query for execution
        $stmt = $con->prepare($query);
        // bind the parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':first_name', $firstname);
        $stmt->bindParam(':last_name', $lastname);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        // Validation
        $errors = [];
        if (empty($email)) {
            $errors[] = "email is required.";
        }
        if (empty($password)) {
            $errors[] = "password is required.";
        }
        if (empty($firstname)) {
            $errors[] = "price is required.";
        }
        if (empty($lastname)) {
            $errors[] = "lastname is required.";
        }
        if (empty($gender)) {
            $errors[] = "gender is required.";
        }
        if (empty($date_of_birth)) {
            $errors[] = "date of birth is required.";
        }
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
            <td>email</td>
            <td><input type='text' name='email' class='form-control' /></td>
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
            <td><input type='datetime' name='date_of_birth' class='form-control' /></td>
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

