<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Update Product</h1>
        </div>
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM customer WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $username = $row['username'];
    $password = $row['password'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $gender = $row['gender'];
    $dateofbirth = $row['date_of_birth'];
    $registration_date_and_time = $row['registration_date_and_time'];
    $account_status = $row['account_status'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>

<?php
// check if form was submitted
if($_POST){
    try{
        // write update query
        // in this case, it seemed like we have so many fields to pass and
        // it is better to label them and not use question marks
        $query = "UPDATE products SET username=:username, password=:password, firstname=:firstname, lastname=:lastname, gender=:gender, date_of_birth=:date_of_birth, registration_date_and_time=:registration_date_and_time, account_status=:account_status WHERE id = :id";
        // prepare query for excecution
        $stmt = $con->prepare($query);
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['username']));
    	$description=htmlspecialchars(strip_tags($_POST['password']));
        $price=htmlspecialchars(strip_tags($_POST['firstname'])); 
        $product_cat=htmlspecialchars(strip_tags($_POST['lastname'])); 
        $promotion_price=htmlspecialchars(strip_tags($_POST['gender']));
        $manufacture_date=htmlspecialchars(strip_tags($_POST['date_of_birth']));
        $expired_date=htmlspecialchars(strip_tags($_POST['registration_date_and_time']));
        $expired_date=htmlspecialchars(strip_tags($_POST['account_status']));
        // bind the parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':registration_date_and_time', $registration_date_and_time);
        $stmt->bindParam(':account_status', $account_status);
        $stmt->bindParam(':id', $id);
        // Validation
        $errors = [];
        if (empty($username)) {
            $errors[] = "username is required.";
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
        if (empty($registration_date_and_time)) {
            $errors[] = "registration date & time is required.";
        }
        if (empty($account_status)) {
            $errors[] = "account status is required.";
        }
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was updated.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
        }         
    }
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}?>


 
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>username</td>
            <td><input type='text' name='username' value="<?php echo $username;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" name='password' class='form-control'><?php echo $password;  ?></input></td>
        </tr>
        <tr>
            <td>firstname</td>
            <td><input type='text' name='firstname' value="<?php echo $firstname;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>lastname</td>
            <td><input type='text' name='lastname' value="<?php echo $lastname;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>gender</td>
            <td><input type='radio' name='gender' value="<?php echo $gender;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>date of birth</td>
            <td><input type='date' name='date_of_birth' value="<?php echo $date_of_birth;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>registration date and time</td>
            <td><input type='datetime' name='registration_date_and_time' value="<?php echo $registration_date_and_time;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>account status</td>
            <td><input type='radio' name='account_status' value="<?php echo $account_status;  ?>" class='form-control' /></td>
        </tr>
        <tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='product_listing.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>


   </div> 
   <!-- end .container --> 
</body>
</html>

