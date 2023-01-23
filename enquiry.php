<?php 
header('Access-Control-Allow-Origin: *');
// require("./connection.php");

// Connection
$database = 'mysql:host=localhost;dbname=enquiry;charset=utf8';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO($database, $username, $password);
} catch(PDOException $error) {
    echo 'Error: ' . $error->getMessage();
    die();
}

// Variables
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

// Query
$insertData = "INSERT INTO enquiry(name, mobile, email) VALUES (?, ?, ?)";
$insertQuery = $pdo->prepare($insertData);
$resultQuery = $insertQuery->execute(array($name, $mobile, $email));

if ($resultQuery) {
    echo 'Success!';
} else {
    echo 'Error';
}

$pdo = NULL;