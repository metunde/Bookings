<?php
session_start();
include "login.php";


if(isset($_SESSION['auth'])){

    unset($_SESSION['auth']);

    unset($_SESSION['auth_user']);

}

header('Location: index.php')

?>