<?php
function bookings($idd){
    include('DatabaseConnection.php');
    $query=mysqli_query($con,"select parkings.parkingImage1 as pimg1,parkings.parkingName as pname,parkings.id as proid,bookings.parkingId as opid,bookings.quantity as quantity,
    parkings.parkingPrice as pprice,parkings.shippingCharge as shippingcharge,bookings.paymentMethod as paym,bookings.orderDate as odate,bookings.id as orderid from bookings join parkings on 
    bookings.parkingId=parkings.id where bookings.userId='".$idd."' and bookings.paymentMethod is not null");
    return $query;
}
?>