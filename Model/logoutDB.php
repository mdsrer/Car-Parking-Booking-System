<?php
function lgout($ldate,$lgin){
    include('DatabaseConnection.php');
    return mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE userEmail = '".$lgin."' ORDER BY id DESC LIMIT 1");
}
?>