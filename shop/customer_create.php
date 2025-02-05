<!DOCTYPE HTML>
<html>
<?php include 'menu.php'?>
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
        $email=$_POST['email'];
        $password=$_POST['password'];
        $first_name=$_POST['firstname'];
        $last_name=$_POST['lastname'];
        $gender=$_POST['gender'];
        $date_of_birth=$_POST['date_of_birth'];
        // insert query
        $query = "INSERT INTO customer SET email=:email, password=:password, firstname=:firstname, lastname=:lastname, gender=:gender, date_of_birth=:date_of_birth";
        // prepare query for execution
        $stmt = $con->prepare($query);
        // bind the parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
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
            $errors[] = "date_of_birth is required.";
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
            <td><input type='text' name='firstname' class='form-control' /></td>
        </tr>
        <tr>
        <tr>
            <td>last name</td>
            <td><input type='text' name='lastname' class='form-control' /></td>
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

