<!DOCTYPE HTML>
<html>
<?php include 'menu.php'?>
<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Update customer</h1>
        </div>
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$email = isset($_GET['email']) ? $_GET['email'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM customer WHERE email = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $email);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $email = $row['email'];
    $password = $row['password'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $gender = $row['gender'];
    $date_of_birth = $row['date_of_birth'];
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
        $query = "UPDATE customer SET email=:email, password=:password, firstname=:firstname, lastname=:lastname, gender=:gender, date_of_birth=:date_of_birth, registration_date_and_time=:registration_date_and_time, account_status=:account_status WHERE email = :email";
        // prepare query for excecution
        $stmt = $con->prepare($query);
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['email']));
    	$description=htmlspecialchars(strip_tags($_POST['password']));
        $price=htmlspecialchars(strip_tags($_POST['firstname'])); 
        $product_cat=htmlspecialchars(strip_tags($_POST['lastname'])); 
        $promotion_price=htmlspecialchars(strip_tags($_POST['gender']));
        $manufacture_date=htmlspecialchars(strip_tags($_POST['date_of_birth']));
        $expired_date=htmlspecialchars(strip_tags($_POST['registration_date_and_time']));
        $expired_date=htmlspecialchars(strip_tags($_POST['account_status']));
        // bind the parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':registration_date_and_time', $registration_date_and_time);
        $stmt->bindParam(':account_status', $account_status);
        // Validation
        $errors = [];
        if (empty($email)) {
            $errors[] = "email is required.";
        }
        if (empty($password)) {
            $errors[] = "password is required.";
        }
        if (empty($firstname)) {
            $errors[] = "first name is required.";
        }
        if (empty($lastname)) {
            $errors[] = "last name is required.";
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?email={$email}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>email</td>
            <td><input type='text' name='email' value="<?php echo $email;  ?>" class='form-control' /></td>
        </tr>
        
        <tr>
            <td>firstname</td>
            <td><input type='text' name='first_name' value="<?php echo $firstname;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>lastname</td>
            <td><input type='text' name='last_name' value="<?php echo $lastname;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>gender</td>
            <td><?php echo $gender;  ?>
            <input type='radio' name='gender'  />male
            <input type='radio' name='gender'  />female</td>
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
            <td><?php echo $account_status;  ?>
            <input type='radio' name='gender'  />active
            <input type='radio' name='gender'  />inactive</td>
        </tr>
        <tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='customer_listing.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>
<h1>change password</h1>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>old password</td>
            <td><?php echo $password;  ?></td>
        </tr>
        <tr>
            <td>new password</td>
            <td><input type="password" name='password' class='form-control'></input>
            </td>
        </tr>
        <tr>
            <td>comfirm password</td>
            <td><input type="password" name='password' class='form-control'></input></td>
        </tr>
    </table>
   </div> 
   <!-- end .container --> 
</body>
</html>

