<?php
include "config.php";
if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$number =  mysqli_real_escape_string($con,$_POST['number']);
$email =  mysqli_real_escape_string($con,$_POST['email']);
$password =  mysqli_real_escape_string($con,$_POST['password']);
$jointime = mysqli_real_escape_string($con, $_POST['jointime']);
$file = mysqli_real_escape_string($con, $_FILES["img"]["name"]);
$filetmp = $_FILES["img"]["tmp_name"];
$folder = "image/";
$sql = "INSERT INTO user(fname,lname,num,mail,pass,img,jointime) VALUE ('{$fname}', '{$lname}',{$number},'{$email}','{$password}','{$file}','{$jointime}' ) ";
$result =mysqli_query($con, $sql);
}
move_uploaded_file($filetmp,  "../image/" . $file);
header("location:../login.php");
