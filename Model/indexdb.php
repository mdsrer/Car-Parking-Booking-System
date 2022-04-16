<?php
session_start();
error_reporting(0);
function conn($id){
    include('DatabaseConnection.php');
    $sql_p="SELECT * FROM parkings WHERE id={$id}";
    $query_p=mysqli_query($con,$sql_p);
    return $query_p;
}

function select_parking(){
    include('DatabaseConnection.php');
    $ret = mysqli_query($con,"select * from parkings");
    return $ret;
}
?>