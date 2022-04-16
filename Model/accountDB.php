<?php
session_start();
error_reporting(0);
function update_users($name,$contactno,$sess_id){
    include('DatabaseConnection.php');
    $query=mysqli_query($con,"update users set name='$name',contactno='$contactno' where id='".$sess_id."'");
    return $query;
}


function select_pass($cpasss,$sess_id){
    include('DatabaseConnection.php');
    $sql = mysqli_query($con,"SELECT password FROM  users where password='".md5($cpasss)."' && id='".$sess_id."'");
    return $sql;
}

function update_time($nwpss,$currentTime,$sess_id){
    include('DatabaseConnection.php');
    $mas = mysqli_query($con,"update users set password='".md5($nwpss)."', updationDate='$currentTime' where id='".$sess_id."'");
    return $mas;
}


function select_id($sess_id){
    include('DatabaseConnection.php');
    $query=mysqli_query($con,"select * from users where id='".$sess_id."'");
    return $query;
}

?>
