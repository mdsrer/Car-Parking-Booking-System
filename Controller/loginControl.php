<?php
session_start();
error_reporting(0);
// Code user Registration
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactno'];
$password=md5($_POST['password']);


include('../Model/loginDB.php');
$query = insert_users($name,$email,$contactno,$password);


if($query)
{
	echo "<script>alert('You are successfully register');</script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
}
}


// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['email'];
   $password = md5($_POST['password']);



include('../Model/loginDB.php');
$query = select_users($email,$password);


$num=mysqli_fetch_array($query);
if($num>0)
{
    echo "<script>alert('You are Logged In!');</script>";
    echo "<script type='text/javascript'> document.location ='../Controller/indexControl.php'; </script>";
$extra="../Controller/indexControl.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;

include('../Model/loginDB.php');
$lggin = $_SESSION['login'];
insert_userlog($lggin,$uip,$status);



$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{

echo "<script>alert('Failed to Log In! Invalid Email or Password!');</script>";
echo "<script type='text/javascript'> document.location ='../Controller/loginControl.php'; </script>";

$extra="../Controller/loginControl.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;




include('../Model/loginDB.php');
insert_userlog2($email,$uip,$status);



$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Password";
exit();
}
}
include('../View/login.php');

?>