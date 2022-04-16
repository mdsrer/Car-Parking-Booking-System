<?php
session_start();
$_SESSION['login']=="";
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
$lgin = $_SESSION['login'];
include('../Model/logoutDB.php');
lgout($ldate,$lgin);
session_unset();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="../Controller/loginControl.php";
</script>