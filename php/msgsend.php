<?php
$con = mysqli_connect("localhost", "root", "", "chatapp");

$msg = $_POST['massage'];
$time = $_POST['time'];
$incoming = $_POST['incoming'];
$outgoing = $_POST['outgoing'];
$sql = "INSERT INTO chat(msg, incoming, outgoing, mtime) VALUES ('{$msg}', {$incoming}, {$outgoing}, '{$time}')";
$result = mysqli_query($con, $sql);

 
if ($result) {
    echo 1;
} else {
    echo 0;
}


?>