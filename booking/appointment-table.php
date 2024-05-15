<?php
include 'connection.php';

$date = $_POST['date'];
$time = $_POST['time'];
$description = $_POST['description'];

$services = $_POST['services'];

$totalDuration = 0;
$totalPrice = 0;

foreach ($services as $service) {
    $query = "SELECT duration, price FROM serviceinfo WHERE service = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $service);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $duration = $row['duration'];
    $price = $row['price'];
    $totalDuration += $duration;
    $totalPrice += $price;
    $stmt->close();
}




$redirectUrl = 'preview.php?' . http_build_query([
    'services' => $services,
    'date' => $date,
    'time' => $time,
    'description' => $description,
    'totalDuration' => $totalDuration,
    'totalPrice' => $totalPrice,
]);
header('Location: ' . $redirectUrl);
?>
