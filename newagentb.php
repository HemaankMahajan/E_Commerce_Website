<?php
include_once 'dbh.php';
$name = $_POST['name'];
$id = $_POST['id'];
$age = (int)$_POST['age'];
$doj = $_POST['doj'];
$Phoneno = (int)$_POST['Phoneno'];
$salary = (int)$_POST['salary'];
$review = (float)$_POST['review'];
$vaccine = $_POST['vaccine'];

$q1 = "Insert into delivery_agent values('$id','$name','$doj',$age,$Phoneno,$salary,$review,'$vaccine');";
mysqli_query($conn,$q1);
header("Location: ../newagentf.php?signup=success");
?>