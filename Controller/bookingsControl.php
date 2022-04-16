<?php 
session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:../Controller/loginControl.php');
}
else{
    $idd = $_SESSION['id'];
    include('../Model/bookingsDB.php');
    $query = bookings($idd); //function call from Model
    include('../View/booking-history.php');
}
?>