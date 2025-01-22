<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Read list</h1>
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
// include database connection
include 'config/database.php';
 
// delete message prompt will be here
 
// select all data
$query = "SELECT * FROM customer ORDER BY username DESC";
$stmt = $con->prepare($query);
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
// link to create record form
echo "<a href='customer_create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";
 
//check if more than 0 record found
if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
    //creating our table heading
    echo "<tr>";
        echo "<th>username</th>";
        echo "<th>password</th>";
        echo "<th>first_name</th>";
        echo "<th>last_name</th>";
        echo "<th>gender</th>";
        echo "<th>date_of_birth</th>";
    echo "</tr>";
     
    // retrieve our table contents
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to just $firstname only
    extract($row);
    // creating new table row per record
    echo "<tr>";
        echo "<td>{$username}</td>";
        echo "<td>{$password}</td>";
        echo "<td>{$firstname}</td>";
        echo "<td>{$lastname}</td>";
        echo "<td>{$gender}</td>";
        echo "<td>{$dateofbirth}</td>";
        echo "<td>";
            // read one record
            echo "<a href='customer_details.php?id={$username}' class='btn btn-info m-r-1em'>Read</a>";
             
            // we will use this links on next part of this post
            echo "<a href='customer_update.php?id={$username}' class='btn btn-primary m-r-1em'>Edit</a>";
 
            // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_user({$username});'  class='btn btn-danger'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}


 
// end table
echo "</table>";


     
}
// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}
?>


         
    </div> <!-- end .container -->
 
    <!-- confirm delete record will be here -->
 
</body>
</html>

