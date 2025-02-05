<!DOCTYPE HTML>
<html>
<?php include 'menu.php'?>
<head>
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
 
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Read deatils</h1>
        </div>
         
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$email=isset($_GET['email']) ? $_GET['email'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM customer WHERE email = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this refer to the first question mark
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


 
        <!--we have our html table here where the record will be displayed-->
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>email</td>
        <td><?php echo $email;  ?></td>
    </tr>
    <tr>
        <td>password</td>
        <td><?php echo $password;  ?></td>
    </tr>
    <tr>
        <td>first name</td>
        <td><?php echo $firstname;  ?></td>
    </tr>
    <tr>
        <td>last name</td>
        <td><?php echo $lastname;  ?></td>
    </tr>
    <tr>
        <td>gender</td>
        <td><?php echo $gender;  ?></td>
    </tr>
    <tr>
        <td>date of birth</td>
        <td><?php echo $date_of_birth;  ?></td>
    </tr>
    <tr>
        <td>Registration Date and time</td>
        <td><?php echo $registration_date_and_time;  ?></td>
    </tr>
    <tr>
        <td>Account status</td>
        <td><?php echo $account_status;  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='customer_listing.php' class='btn btn-danger'>Back to read products</a>
        </td>
    </tr>
</table>


 
    </div> <!-- end .container -->
 
</body>
</html>

