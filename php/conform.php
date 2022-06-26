<?php
session_start();

if (isset($_POST['lsubmit'])) {

include "config.php";
$email =  mysqli_real_escape_string($con,$_POST['email']);
$password =  mysqli_real_escape_string($con,$_POST['password']);
$sql = "SELECT * FROM user WHERE mail ='{$email}' AND pass ='{$password}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION["userid"] = $row['id'];
if (mysqli_num_rows($result) > 0) {
    header("location:../index.php");
} else {
    header("location:../login.php");
}
}
?>