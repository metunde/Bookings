<?php
session_start();

if(isset($_SESSION['auth'])){
   if($_SESSION['role'] != 1 ){

    header('Location: index.php');
   
   }

}else{
    header('Location: index.php');
}




?>