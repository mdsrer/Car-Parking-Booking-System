<?php
session_start();
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		include('../Model/indexdb.php');
		$query_p = conn($id);//calling function
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['parkingPrice']);
		
		}else{
			$message="Invalid";
		}
	}
		echo "<script>alert('Parking Added!')</script>";
		echo "<script type='text/javascript'> document.location ='../Controller/cartControl.php'; </script>";
}

include('../Model/indexdb.php');
$ret = select_parking();
include('../View/index.php');


?>
