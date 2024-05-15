<?php 
session_start();
 include 'connection.php'; 

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM userprofile WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // User login successful
        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] = [
            "username" => $row['username'],
            "password" => $row['password'],
        ];

        $_SESSION['role'] = $row['role'];

        // Generate a random session ID
        $_SESSION['id'] = rand(0, 20000000);
        // Set session login time
        $_SESSION['login_time'] = time();
        // Set session expiration time (10 minutes)
        $_SESSION['expiration_time'] = $_SESSION['login_time'] + (10 * 60);

        if ($_SESSION['role'] == 1) {
          header('Location: admin/index.php');
        }else{
          header("Location: index.php");
        }

        // Redirect to the index page
       
        exit;
    } else {
        // Invalid username or password
        $_SESSION['message'] = "Please enter a valid username and password";
        // Redirect to index.php with message
        header("Location: index.php");
        exit;
    }
}
?>
