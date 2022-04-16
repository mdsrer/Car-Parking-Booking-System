<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:../Controller/loginControl.php');
}
else{
	if(isset($_POST['update']))
	{
        include('../Model/accountDB.php');
		$name=$_POST['name'];
		$contactno=$_POST['contactno'];
        $sess_id = $_SESSION['id']; 
        $query = update_users($name,$contactno,$sess_id); //Calling update_users() Function from Model
		if($query)
		{
echo "<script>alert('Your info has been updated');</script>";
echo "<script type='text/javascript'> document.location ='../Controller/accountControl.php'; </script>";
		}
	}

date_default_timezone_set('Asia/Dhaka');
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
include('../Model/accountDB.php');
$sess_id = $_SESSION['id']; 
$cpasss = $_POST['cpass'];
$sql = select_pass($cpasss,$sess_id); //Calling select_pass() Function from Model

$num=mysqli_fetch_array($sql);

if($num>0)
{
    echo "<script>alert('Password Changed Successfully !!');</script>";
    echo "<script type='text/javascript'> document.location ='../Controller/accountControl.php'; </script>";
    include('../Model/accountDB.php');
    $sess_id = $_SESSION['id'];
    $nwpss = $_POST['newpass'];
    $mas = update_time($nwpss,$currentTime,$sess_id); //Calling update_time() Function from Model
}
else
{
	echo "<script>alert('Current Password not match !!');</script>";
    echo "<script type='text/javascript'> document.location ='../Controller/accountControl.php'; </script>";
}
}
include('../Model/accountDB.php');
$sess_id = $_SESSION['id']; 
$query = select_id($sess_id);  //Calling select_id() Function from Model
include('../View/my-account.php');
}
?>
