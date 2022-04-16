<?php
function insert_users($name,$email,$contactno,$password){
    include('DatabaseConnection.php');
    $query=mysqli_query($con,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
    return $query;
}

function select_users($email,$password){
    include('DatabaseConnection.php');
    $query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
    return $query;
}

function insert_userlog($lggin,$uip,$status){
    include('DatabaseConnection.php');    
    $log = mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$lggin."','$uip','$status')");
    
}

function insert_userlog2($email,$uip,$status){
    include('DatabaseConnection.php');
    $log = mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
}
?>