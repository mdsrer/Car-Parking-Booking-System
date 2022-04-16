<?php
    include('DatabaseConnection.php');
    mysqli_query($con,"update users set password='$password' WHERE email='$email' and contactno='$contact' ");
?>