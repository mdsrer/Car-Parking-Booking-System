<?php
include('DatabaseConnection.php');
function select_parkings($id){
    include('DatabaseConnection.php');
    $sql_p="SELECT * FROM parkings WHERE id={$id}";
    return $sql_p;
}

function select_parking($find){
    include('DatabaseConnection.php');
	$ret=mysqli_query($con,"select * from parkings where parkingName like '$find' or parkingaddress like '$find'");
	return $ret;
}
?>