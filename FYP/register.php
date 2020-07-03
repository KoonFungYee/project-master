<?php
error_reporting(0);
include_once("dbconnect.php");

$name = $_POST['name'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$user_type=$_POST['user_type'];

//$name = "aa";
//$password = "bb";
//$phone = "01";
//$address = "cc";
//$user_type= "Cooker";

$sqlinsert = "INSERT INTO `register`(`name`, `password`, `phone`, `address`, `usertype`) VALUES ('$name','$password','$phone','$address','$user_type')";
if ($conn->query($sqlinsert) === TRUE){
    echo "success";
}else {
    echo "failed";
}

?>