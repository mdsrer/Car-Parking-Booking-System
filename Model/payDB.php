<?php
    include('DatabaseConnection.php');
    mysqli_query($con,"update bookings set 	paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
    unset($_SESSION['cart']);
    header('location:../Controller/bookingsControl.php');
?>