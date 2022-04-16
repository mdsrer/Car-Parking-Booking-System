<?php
session_start();
error_reporting(0);
if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			echo "<script>alert('Updated!');</script>";
		}
	}

if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}

	}
}

if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginControl.php');
}
else{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);
	    foreach($value as $quantity=> $val34){
            $iddd = $_SESSION['id'];
            include('../Model/cartDB.php');

            insert_bookings($iddd,$quantity,$val34); //Query function call from Model

            header('location:../Controller/payControl.php');
        }
    }
}
include('../Model/cartDB.php');
include('../View/my-cart.php');
?>