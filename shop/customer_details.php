<!DOCTYPE HTML>
<html>
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
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM customer WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this refer to the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $username = $row['username'];
    $password = $row['password'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $gender = $row['gender'];
    $date_of_birth = $row['date_of_birth'];
    $Registration_Date_and_time = $row['Registration_Date_&_time'];
    $Account_status = $row['Account_status'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>


 
        <!--we have our html table here where the record will be displayed-->
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>username</td>
        <td><?php echo $username;  ?></td>
    </tr>
    <tr>
        <td>password</td>
        <td><?php echo $password;  ?></td>
    </tr>
    <tr>
        <td>first_name</td>
        <td><?php echo $descrfirst_nameiption;  ?></td>
    </tr>
    <tr>
        <td>last_name</td>
        <td><?php echo $last_name;  ?></td>
    </tr>
    <tr>
        <td>gender</td>
        <td><?php echo $gender;  ?></td>
    </tr>
    <tr>
        <td>date_of_birth</td>
        <td><?php echo $date_of_birth;  ?></td>
    </tr>
    <tr>
        <td>Registration Date & time</td>
        <td><?php echo $Registration_Date_and_time;  ?></td>
    </tr>
    <tr>
        <td>Account_status</td>
        <td><?php echo $Account_status;  ?></td>
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

