<?php
include 'connection.php';

$services = $_POST['services']; 
$date = $_POST['date'];
$time = $_POST['time']; 
$totalDuration = $_POST['totalduration'];
$totalPrice = $_POST['price']; 
$description = $_POST['description'];




$store = $con->prepare('INSERT INTO appointments (services, date, time, duration, price, description) VALUES (?, ?, ?, ?, ?,?)');
    
    $store->bind_param('sssiis',  $services, $date, $time, $totalDuration,$totalPrice, $description);
$store->execute();





$store->close();
$con->close();

header('Location: payment.php')

?>