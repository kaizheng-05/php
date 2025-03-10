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
    $query = "SELECT * FROM products WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $product_cat = $row['product_cat'];
    $promotion_price = $row['promotion_price'];
    $manufacture_date = $row['manufacture_date'];
    $expired_date = $row['expired_date'];
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
        $query = "UPDATE products SET name=:name, description=:description,price=:price,product_cat=:product_cat,promotion_price=:promotion_price,manufacture_date=:manufacture_date ,expired_date=:expired_date WHERE id = :id";
        // prepare query for excecution
        $stmt = $con->prepare($query);
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
    	$description=htmlspecialchars(strip_tags($_POST['description']));
        $price=htmlspecialchars(strip_tags($_POST['price'])); 
        $product_cat=htmlspecialchars(strip_tags($_POST['product_cat'])); 
        $promotion_price=htmlspecialchars(strip_tags($_POST['promotion_price']));
        $manufacture_date=htmlspecialchars(strip_tags($_POST['manufacture_date']));
        $expired_date=htmlspecialchars(strip_tags($_POST['expired_date']));
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':product_cat', $product_cat);
        $stmt->bindParam(':promotion_price', $promotion_price);
        $stmt->bindParam(':manufacture_date', $manufacture_date);
        $stmt->bindParam(':expired_date', $expired_date);
        $stmt->bindParam(':id', $id);
        // Validation
        $errors = [];
        if (empty($name)) {
            $errors[] = "Name is required.";
        }
        if (empty($description)) {
            $errors[] = "description is required.";
        }
        if (empty($price)) {
            $errors[] = "price is required.";
        }
        if (empty($product_cat)) {
            $errors[] = "product_cat is required.";
        }
        if (empty($promotion_price < $price)) {
            $errors[] = "promotion_price is required.";
        }
        if (empty($manufacture_date)) {
            $errors[] = "manufacture_date is required.";
        }
        if (empty($expired_date < $manufacture_date)) {
            $errors[] = "expired_date is required.";
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
            <td>Name</td>
            <td><input type='text' name='name' value="<?php echo $name;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'><?php echo $description;  ?></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='double' name='price' value="<?php echo $price;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>product category</td>
            <td><input type='text' name='product_cat' value="<?php echo $product_cat;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>promotion Price</td>
            <td><input type='double' name='promotion_price' value="<?php echo $promotion_price;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>manufacture date</td>
            <td><input type='date' name='manufacture_date' value="<?php echo $manufacture_date;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>expired date</td>
            <td><input type='date' name='expired_date' value="<?php echo $expired_date;  ?>" class='form-control' /></td>
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

