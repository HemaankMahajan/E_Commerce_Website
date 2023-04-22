<?php
include_once 'dbh.php';
$pid = $_POST['PID'];
session_start();
$e = $_SESSION['email'];
?>
<?php
$q0 = "delete from wishlist where cust_email = '$e' and PID = '$pid'";
mysqli_query($conn,$q0);
echo "Successfully Removed from Wishlist";
?>