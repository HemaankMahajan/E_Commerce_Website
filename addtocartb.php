<?php
include_once 'dbh.php';
$pid = $_POST['PID'];
$qty = $_POST['quantity'];
session_start();
$e = $_SESSION['email'];
?>
<?php
$q0 = "select price from products where PID = '$pid';";
$r = mysqli_query($conn,$q0);
$pr =  mysqli_fetch_assoc($r);
$pr = implode("",$pr);
$totalcost = (((int)$qty) * ((int)$pr));
$q1 = "insert into incart(cust_email,PID,quantity,total_cost)  values('$e','$pid',$qty,$totalcost);";
mysqli_query($conn,$q1);
?>