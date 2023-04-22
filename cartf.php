<?php
include_once 'dbh.php';
session_start();
$e = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
</head>
<body>
    <pre>
    <?php
    $q1 = "select PID from incart where cust_email = '$e';";
    $result = mysqli_query($conn,$q1);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){
           $q2 = "select name, price, color,dimensions,type,review from products where PID = '".$row['PID']."';";
           $q3 = "select quantity, total_cost, adding_date from incart where PID ='".$row['PID']."' and cust_email = '$e';"; 
           $r2 = mysqli_query($conn,$q2);
           $r3 = mysqli_query($conn,$q3);
           $ro2 = mysqli_fetch_assoc($r2);
           $ro3 = mysqli_fetch_assoc($r3);
           echo "Product ID: ".$row['PID']."  ";
           echo "Name: ".$ro2['name'];
           echo "  ";
           echo "Price: ".$ro2['price'];
           echo "  ";
           echo "Color: ".$ro2['color'];
           echo "  ";
           echo "Dimensions: ".$ro2['dimensions'];
           echo "  ";
           echo "Type: ".$ro2['type'];
           echo "  ";
           echo "Review: ".$ro2['review'];
           echo "  ";
           echo "Quantity Added: ".$ro3['quantity'];
           echo "  ";
           echo "Total Cost: ".$ro3['total_cost'];
           echo "  ";
           echo "Adding Date: ".$ro3['adding_date'];
           echo "\n";
        }
    }
    ?>
    </pre>
    
    <h2>Remove from Cart</h2>
    <form  action = "remcart.php" method = "POST">
    <input type = "text" name = "PID" placeholder = "Product ID">
    <br>
    <button type = "submit" name = "submit">Remove from Cart</button>
    </form>

    <h2>Order Now!</h2>
    <form  action = "ordersf.php" method = "POST">
    <input type = "text" name = "PID" placeholder = "Product ID">
    <br>
    <input type = "text" name = "deliverydate" placeholder = "Delivery Date">
    <br>
    <input type = "text" name = "mode" placeholder = "Mode Of Payment">
    <br>
    <button type = "submit" name = "submit">Place Order</button>
    </form>
    
    <h2> Return a Product</h2>
    <form  action = "returnprod.php" method = "POST">
    <input type = "text" name = "Bill" placeholder = "Bill Number">
    <br>
    <input type = "text" name = "returndate" placeholder = "Return Date">
    <br>
    <input type = "text" name = "qty" placeholder = "Quantity">
    <br>
    <input type = "text" name = "mode" placeholder = "Mode Of Payment">
    <br>
    <button type = "submit" name = "submit">Return Product</button>
    </form>

    <a href="ordersb.php">See Current and Previous orders</a>
</body>
</html>