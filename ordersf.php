<?php
include_once 'dbh.php';
$pid = $_POST['PID'];
$deliverydate = $_POST['deliverydate'];
$mode = $_POST['mode'];
session_start();
$e = $_SESSION['email'];
$bill = rand(1000000, 9999999);
$q = "select quantity from incart where cust_email = '$e' and PID = '$pid';";
$qty = mysqli_query($conn,$q);
$qty =  mysqli_fetch_assoc($qty);
$qty = (int)implode("",$qty);
$q0 = "select agent_id from delivery_agent";
$r = mysqli_query($conn,$q0);
$resultcheck = mysqli_num_rows($r);
$t = rand(1,$resultcheck);
$agentid;
while($row = mysqli_fetch_assoc($r)){
    $agentid = $row['agent_id'];
    $t = $t - 1;
    if($t==0)break;
}
$q1 = "select total_cost from incart where cust_email = '$e' and PID = '$pid';";
$r1 = mysqli_query($conn,$q1);
$r1 =  mysqli_fetch_assoc($r1);
$r1 = implode("",$r1);
?>
<?php
$q3 = "delete from incart where cust_email = '$e' and PID = '$pid';";
$q4 = "update products set quantity = quantity - $qty where PID = '$pid';";
 mysqli_query($conn,$q3);
 mysqli_query($conn,$q4);
 $q5 = "insert into orders(bill_no,cust_email,PID,Delivery_date,Mode_of_Payment,Agent_ID,amount,operation,quantity) values('$bill','$e','$pid','$deliverydate','$mode','$agentid',$r1,'Delivery',$qty);";
 mysqli_query($conn,$q5);
 echo "Order Placed Successfully";
?>