<?php 
 $service = $_POST['service'];
 $duration = $_POST['duration'];
 $price = $_POST['price'];

 $conn = new mysqli('localhost', 'root', '', 'register');
 if ($conn->connect_error){
    die('Error connecting to database: ' . $conn->connect_error);
}else {

    $stmt = $conn->prepare('INSERT INTO serviceinfo (service, duration, price) VALUES (?, ?, ?)');
    $stmt->bind_param('sii', $service, $duration, $price);
    $stmt->execute();
   header('Location: services.php');
    $stmt->close();
    $conn->close();
}


?>