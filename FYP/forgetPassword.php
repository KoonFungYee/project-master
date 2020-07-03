<?php
error_reporting(0);
include_once("dbconnect.php");

$phone = $_POST['phone'];
$password = $_POST['password'];

//$name = "aa";
//$password = "bb";
//$phone = "01";
//$address = "cc";
//$user_type= "Cooker";

$sqlinsert = "UPDATE `register` SET `password` = '$password' WHERE `phone`='$phone'";
if ($conn->query($sqlinsert) === TRUE){
    echo "success";
}else {
    echo "failed";
}

?>