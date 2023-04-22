<?php
include_once 'dbh.php';
$pid = $_POST['PID'];
session_start();
$e = $_SESSION['email'];
?>
<?php
$q0 = "select quantity from products where PID = '$pid';";
$r = mysqli_query($conn,$q0);
$pr =  mysqli_fetch_assoc($r);
$pr = implode("",$pr);
$pr = (int)$pr;
if($pr > 0){
$q1 = "insert into wishlist(cust_email,pid,quantity) values('$e','$pid',-1);";
mysqli_query($conn,$q1);
}
else{
$q1 = "insert into wishlist(cust_email,pid,quantity) values('$e','$pid',0);";
mysqli_query($conn,$q1);
}
?>