<?php
$username = $_POST['username'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$conn = new mysqli('localhost', 'root', '', 'register');
if ($conn->connect_error){
    die('Error connecting to database: ' . $conn->connect_error);
} else {

    $stmt = $conn->prepare('INSERT INTO userprofile (username, address, phone, password) VALUES (?, ?, ?, ?)');
   
    $stmt->bind_param('ssis', $username, $address, $phone, $password);
    $stmt->execute();
    header("Location: index.php");
    $stmt->close();
    $conn->close();
}
?>
