<?php 
	function select_email($email){
        include('DatabaseConnection.php');
        $result = mysqli_query($con,"SELECT  email FROM  users WHERE  email='$email'");
        return $result;
    }
?>