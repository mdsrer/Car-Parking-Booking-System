
<?php

function select_userrr($email,$contact){
    include('DatabaseConnection.php');
    $query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and contactno='$contact'");
    return $query;
}



function update_userrr($password,$email,$contact){
    include('DatabaseConnection.php');
    $query2 =  mysqli_query($con,"update users set password='$password' WHERE email='$email' and contactno='$contact' ");
    return $query2;
}


?>