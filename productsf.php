<?php
include_once 'dbh.php';
session_start();
$_SESSION['email'] = $_POST['email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
<pre>
    <?php
    $q1 = "select PID,name,price,quantity,color,dimensions,type,review from products;";
    $result = mysqli_query($conn,$q1);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<img src = \"".$row['PID'].".jpg\" width = 90 height = 90 alt=\"Not Uploaded\"/>";
            
            echo "Product ID: ".$row['PID'];
            echo "[][]";
            echo "Name: ".$row['name'];
            echo "[][]";
            echo "Price: ".$row['price'];
            echo "[][]";
            echo "Quantity Avialable: ".$row['quantity'];
            echo "[][]";
            echo "Color: ".$row['color'];
            echo "[][]"; 
            echo "Dimensions: ".$row['dimensions'];
            echo "[][]";
            echo "Type: ".$row['type'];
            echo "[][]"; 
            echo "Review: ".$row['review'];
            echo "\n"; 
        }
    }
    ?>
    </pre>
    <a href = "wishlistf.php" class = "button-class">See Wishlist</a>
    <br>
    <a href = "cartf.php" class = "button-class">See Cart</a>
    <h2>Add to Cart</h2>
    <form  action = "addtocartb.php" method = "POST">
    <input type = "text" name = "PID" placeholder = "Product ID">
    <br>
    <input type = "text" name = "quantity" placeholder = "Quantity">
    <br>
    <button type = "submit" name = "submit">Add to Cart</button>
    </form>
    <h2>Add to Wishlist</h2>
    <form  action = "addtowish.php" method = "POST">
    <input type = "text" name = "PID" placeholder = "Product ID">
    <br>
    <button type = "submit" name = "submit">Add to Wishlist</button>
    </form>
</body>
</html>