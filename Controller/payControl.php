<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
    if (isset($_POST['submit'])) {
        include('../Model/payDB.php');    
    }
include('../View/payment-method.php');
}
?>

