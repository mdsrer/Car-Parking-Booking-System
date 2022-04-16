<?php
session_start();
error_reporting(0);
$find="%{$_POST['parking']}%";
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		include('../Model/searchDB.php');
		$sql_p = select_parkings($id);//Calling select_parkings() function from Model
		$query_p=mysqli_query($con,$sql_p);

		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['parkingPrice']);
						echo "<script>alert('Parking Saved!')</script>";
		echo "<script type='text/javascript'> document.location ='../Controller/cartControl.php'; </script>";
		}else{
			$message="Parking ID is invalid";
		}
	}
}
include('../Model/searchDB.php');
$ret = select_parking($find);
$num=mysqli_num_rows($ret);
include('../View/search-result.php');
?>