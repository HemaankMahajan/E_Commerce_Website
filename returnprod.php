<?php
include_once 'dbh.php';
$bill = $_POST['Bill'];
$rbill = $bill + rand(1,100);
$returndate = $_POST['returndate'];
$mode = $_POST['mode'];
session_start();
$e = $_SESSION['email'];
$qty = $_POST['qty'];
$q0 = "select PID from orders where bill_no = '$bill';";
$r0 = mysqli_query($conn,$q0);
$r0 =  mysqli_fetch_assoc($r0);
$pid = implode("",$r0);
$q1 = "select price from products where PID = '$pid';";
$r1 = mysqli_query($conn,$q1);
$r1 =  mysqli_fetch_assoc($r1);
$price = implode("",$r1);
$price = (((int)$price) * ((int)$qty));

$q = "select agent_id from delivery_agent";
$r = mysqli_query($conn,$q);
$resultcheck = mysqli_num_rows($r);
$t = rand(1,$resultcheck);
$agentid;
while($row = mysqli_fetch_assoc($r)){
    $agentid = $row['agent_id'];
    $t = $t - 1;
    if($t==0)break;
}
?>
<?php
$q3 = "update products set quantity = quantity + $qty where PID = '$pid';";
$q4 = "insert into orders(bill_no,cust_email,PID,Delivery_date,Mode_of_Payment,Agent_ID,amount,operation,quantity) values('$rbill','$e','$pid','$returndate','$mode','$agentid',$price,'Return',$qty);";
mysqli_query($conn,$q3);
 mysqli_query($conn,$q4);
?>