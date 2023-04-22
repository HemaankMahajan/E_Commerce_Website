<?php
include_once 'dbh.php'
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home </title>
</head>
<body>
    <pre>
    <?php
    $q1 = "select * from address;";
    $result = mysqli_query($conn,$q1);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['location_id'];
            echo "  ";
            echo $row['country']; 
        }
    }
    ?>
    </pre>
</body>
</html>
