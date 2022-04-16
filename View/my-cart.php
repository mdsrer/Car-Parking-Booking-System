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
	    <title>Cart</title>
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
	</head>
    <body class="cnt-home">
	
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Selected Parkings</li>
			</ul>
		</div>
	</div>

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">	
<?php
if(!empty($_SESSION['cart'])){
	?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">Unselect Parking</th>
					<th class="cart-description item">Parking-lot Image</th>
					<th class="cart-parking-name item">Parking-lot Name</th>
					<th class="cart-description item">Parking Hours</th>
					<th class="cart-sub-total item">Cost Per Hour</th>
					<th class="cart-sub-total item">Vat</th>
					<th class="cart-total last-item">Total Cost</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="../Controller/searchControl.php" class="btn btn-upper btn-primary outer-left-xs">Add More Parkings</a>
								<input type="submit" name="submit" value="Update" class="btn btn-upper btn-primary pull-right outer-right-xs">
							</span>
						</div>
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php
$pdtid=array();	
		$totalprice=0;
		$totalqunty=0;
		if(!empty($query)){
		while($row = mysqli_fetch_array($query)){
			$quantity=$_SESSION['cart'][$row['id']]['quantity'];
			$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['parkingPrice']+$row['shippingCharge'];
			$totalprice += $subtotal;
			$_SESSION['qnty']=$totalqunty+=$quantity;

			array_push($pdtid,$row['id']);	?>
			<tr>
				<td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
				<td class="cart-image">
					<a class="entry-thumbnail" href="detail.html">
						<img src="../View/parkingimages/<?php echo $row['id'];?>/<?php echo $row['parkingImage1'];?>" alt="" width="114" height="146">
					</a>
				</td>
				<td class="cart-parking-name-info">
					<h4 class='cart-parking-description'><a href="../Model/parking-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['parkingName'];

$_SESSION['sid']=$pd;
						 ?></a></h4>
						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
<?php
{
?>
	<div class="reiews">
				( <?php echo htmlentities($num);?> Reviews )
								</div>
								<?php } ?>
							</div>
						</div>
						
					</td>
					<td class="cart-parking-quantity">
						<div class="quant-input">
				                <div class="arrows">
				                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
				                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
				                </div>
				             <input type="text" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
				             
			              </div>
		            </td>
					<td class="cart-parking-sub-total"><span class="cart-sub-total-price"><?php echo "Tk"." ".$row['parkingPrice']; ?>.00</span></td>
<td class="cart-parking-sub-total"><span class="cart-sub-total-price"><?php echo "Tk"." ".$row['shippingCharge']; ?>.00</span></td>

					<td class="cart-parking-grand-total"><span class="cart-grand-total-price"><?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['parkingPrice']+$row['shippingCharge']); ?>.00</span></td>
				</tr>

				<?php } }
$_SESSION['pid']=$pdtid;
				?>
				
			</tbody>
		</table>
		
	</div>
</div>
<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table table-bordered">

	</table>
</div>

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					
					<div class="cart-grand-total">
						Total<span class="inner-left-md"><?php echo $_SESSION['tp']="$totalprice". ".00 Tk"; ?></span>
					</div>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<button type="submit" name="ordersubmit" class="btn btn-primary">PAYMENT</button>
						
						</div>
					</td>
				</tr>
		</tbody>
	</table>
	<?php } else {
echo "You Have Not Selected Any Parking!";
		}?>
</div>			</div>
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