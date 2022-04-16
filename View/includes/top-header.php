<?php 
?>
<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">

<?php if(strlen($_SESSION['login']))
    {   ?>
				<li><a href="#"><i class="icon fa fa-user"></i>Logged in as:  <?php echo htmlentities($_SESSION['username']);?></a></li>
				<?php } ?>

					<li><a href="../Controller/accountControl.php"><i class="icon fa fa-user"></i>My Account</a></li>
					<?php if(strlen($_SESSION['login'])==0)
    {   ?>
<li><a href="../Controller/loginControl.php"><i class="icon fa fa-sign-in"></i>Login</a></li>
<?php }
else{ 
	?>		
	<li><a href="../Controller/logoutControl.php"><i class="icon fa fa-sign-out"></i>Logout</a></li>
		<?php } ?>	
			</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>