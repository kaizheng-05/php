<?php
// used to connect to the database
$host = "localhost";
$db_name = "online_store";
$username = "root";
$password = "";
  
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
  
// show error
catch(PDOException $exception){
    echo "Connection error: ".$exception->getMessage();
}
?>

