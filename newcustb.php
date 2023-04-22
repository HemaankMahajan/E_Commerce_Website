<?php
include_once 'dbh.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$dob = $_POST['dob'];
$Phoneno = $_POST['Phoneno'];
$Phoneno2 = $_POST['Phoneno2'];
$street = $_POST['street'];
$postal = $_POST['postal'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$randomno = rand(1000, 9999);
$locationid = "$randomno";
$q1 = "Insert into address values('$locationid','$street','$postal','$city','$state','$country');";
$q2 = "Insert into customer values('$email','$password','$name','$dob','$locationid','$Phoneno','$Phoneno2');";
mysqli_query($conn,$q1);
mysqli_query($conn,$q2);
header("Location: ../newcustf.php?signup=success");
?>