<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
	    <title>Booking History</title>
	    <link rel="stylesheet" href="../View/assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="../View/assets/css/main.css">
	    <link rel="stylesheet" href="../View/assets/css/green.css">
	    <link rel="stylesheet" href="../View/assets/css/owl.carousel.css">
		<link rel="stylesheet" href="../View/assets/css/owl.transitions.css">
		<link href="../View/assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="../View/assets/css/animate.min.css">
		<link rel="stylesheet" href="../View/assets/css/rateit.css">
		<link rel="stylesheet" href="../View/assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="../View/assets/css/config.css">
		<link href="../View/assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="../View/assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="../View/assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="../View/assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="../View/assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="../View/assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="../View/assets/images/favicon.ico">
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
	</head>
    <body class="cnt-home">
<header class="header-style-1">
<?php include('sincludes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Booking History</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">	

		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">Parking No.</th>
					<th class="cart-description item">Parking-lot Image</th>
					<th class="cart-parking-name item">Parking-lot Name</th>
					<th class="cart-sub-total item">Cost Per Hour</th>
					<th class="cart-sub-total item">Vat</th>
					<th class="cart-total item">Total</th>
					<th class="cart-total item">Payment Method</th>
					<th class="cart-description item">Booking Date</th>
				</tr>
			</thead>	
			<tbody>
			<?php
	?>
<?php

$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>				
<tr>
	<td><?php echo $cnt;?></td>
	<td class="cart-image">
		<a class="entry-thumbnail">
			<img src="../View/parkingimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt="" width="84" height="146">
		</a>
	</td>
	<td class="cart-parking-name-info">
		<h4 class='cart-parking-description'><?php echo $row['pname'];?></h4>
	</td>
	<td class="cart-parking-sub-total"><?php echo $price=$row['pprice']; ?>  </td>
	<td class="cart-parking-sub-total"><?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
	<td class="cart-parking-grand-total"><?php echo ($price+$shippcharge);?></td>
	<td class="cart-parking-sub-total"><?php echo $row['paym']; ?>  </td>
	<td class="cart-parking-sub-total"><?php echo $row['odate']; ?>  </td>
</tr>
<?php $cnt=$cnt+1;} ?>
				
			</tbody>
		</table>
		
	</div>
</div>
	</div>
		</div>
		</form>
	<script src="../View/assets/js/jquery-1.11.1.min.js"></script>
	<script src="../View/assets/js/bootstrap.min.js"></script>
	<script src="../View/assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="../View/assets/js/owl.carousel.min.js"></script>
	<script src="../View/assets/js/echo.min.js"></script>
	<script src="../View/assets/js/jquery.easing-1.3.min.js"></script>
	<script src="../View/assets/js/bootstrap-slider.min.js"></script>
    <script src="../View/assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="../View/assets/js/lightbox.min.js"></script>
    <script src="../View/assets/js/bootstrap-select.min.js"></script>
    <script src="../View/assets/js/wow.min.js"></script>
	<script src="../View/assets/js/scripts.js"></script>
	<script src="switchstylesheet/switchstylesheet.js"></script>
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});
		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
</body>
</html>