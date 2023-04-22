<?php
include_once 'dbh.php';
session_start();
$e = $_SESSION['email'];
?>
<pre>
<?php
$q0 = "select * from orders where cust_email = '$e';";
$result = mysqli_query($conn,$q0);
$resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $q2 = "select name, price, color,dimensions,type,review from products where PID = '".$row['PID']."';";
            $r2 = mysqli_query($conn,$q2);
            $ro2 = mysqli_fetch_assoc($r2);
            $q3 = "select name,phone_no,vaccinated from delivery_agent where Agent_ID = '".$row['Agent_ID']."';";
            $r3 = mysqli_query($conn,$q3);
            $ro3 = mysqli_fetch_assoc($r3);
           echo "Bill Number: ".$row['Bill_no'];
           echo "[][]";
           echo "Product ID: ".$row['PID']."  ";
           echo "Name: ".$ro2['name'];
           echo "  ";
           echo "Price: ".$ro2['price'];
           echo "  ";
           echo "Color: ".$ro2['color'];
           echo "  ";
           echo "Dimensions: ".$ro2['dimensions'];
           echo " \n";
           echo "Type: ".$ro2['type'];
           echo "  ";
           echo "Review: ".$ro2['review'];
           echo "  ";
           echo "Quantity Ordered: ".$row['quantity'];
           echo "  ";
           echo "Total Cost: ".$row['amount'];
           echo "  ";
           echo "Delivery/Return date: ".$row['Delivery_date'];
           echo "  ";
           echo "Operation: ".$row['Operation'];
           echo "  ";
           echo "Order Date: ".$row['order_date'];
           echo " \n";
           echo "Mode Of payment: ".$row['Mode_of_payment'];
           echo "  ";
           echo "Delivery Agent Name: ".$ro3['name'];
           echo "  ";
           echo "Phone Number of of Delivery Agent: ".$ro3['phone_no'];
           echo "  ";
           echo "Vaccination Satus:  ".$ro3['vaccinated'];
           echo "\n\n\n\n";
        }
    }
?>
</pre>