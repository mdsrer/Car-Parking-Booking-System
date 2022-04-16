<?php 
function insert_bookings($iddd,$qty,$val34){
    include('DatabaseConnection.php');
    return mysqli_query($con,"insert into bookings(userId,parkingId,quantity) values('".$iddd."','$qty','$val34')");
}

include('DatabaseConnection.php');

$sql = "SELECT * FROM parkings WHERE id IN(";
foreach($_SESSION['cart'] as $id => $value){
    $sql .=$id. ",";
}

$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
$query = mysqli_query($con,$sql);

$rt=mysqli_query($con,"select * from parkingreviews where parkingId='$pd'");
$num=mysqli_num_rows($rt);

?>