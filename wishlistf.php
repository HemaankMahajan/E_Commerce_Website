<?php
include_once 'dbh.php';
session_start();
$e = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Wishlist</title>
</head>
<body>
    <pre>
    <?php
    $q1 = "select PID from wishlist where cust_email = '$e';";
    $result = mysqli_query($conn,$q1);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){
           $q2 = "select name, price, color,dimensions,type,review from products where PID = '".$row['PID']."';";
           $q3 = "select quantity, discount from wishlist where PID ='".$row['PID']."' and cust_email = '$e';"; 
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
           echo "Quantity At Present: ".$ro3['quantity'];
           echo "  ";
           echo "Discount: ".$ro3['discount'];
           echo "\n";
    }
}
    ?>
    </pre>
    <h2>Remove from Wishlist</h2>
    <form  action = "remwish.php" method = "POST">
    <input type = "text" name = "PID" placeholder = "Product ID">
    <br>
    <button type = "submit" name = "submit">Remove from Wishlist</button>
    </form>
</body>
</html>