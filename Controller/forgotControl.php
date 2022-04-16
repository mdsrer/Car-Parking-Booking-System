<?php
session_start();
error_reporting(0);
if(isset($_POST['change']))
{
   $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=md5($_POST['password']);
include('../Model/forgotDb.php');
$query=select_userrr($email,$contact);
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="../Controller/loginControl.php";
include('../Model/updatePassDB.php');
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Password Changed Successfully";
exit();
}
else
{
$extra="../Controller/forgotControl.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Contact no!";
exit();
}
}
include('../View/forgot-password.php');
?>
