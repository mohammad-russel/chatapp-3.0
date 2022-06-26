<?php
session_start();
if (!isset($_SESSION["userid"])) {
    header("location:login.php");
}
$userid = $_SESSION["userid"];
?>

<!DOCTYPE html>
<html lang="en">
      
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <div class="container">
    <?php
  $con = mysqli_connect("localhost", "root", "", "chatapp");
  $sql = "SELECT * FROM user WHERE id = $userid ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
}
?>
        <div class="header">
            <img src="image/<?php echo $row['img']; ?> "
                alt="">
            <div class="namebox">
                <h2><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h2>
            </div>
            <a class="logoutc" href="php/logout.php">
                  <ion-icon class="logout" name="log-out-outline"></ion-icon>
            </a>
         </div>
         <?php
  $con = mysqli_connect("localhost", "root", "", "chatapp");
  $sql = "SELECT * FROM user WHERE NOT id = $userid ";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)) {
   
?>
        <div class="content">
      <?php  while ($row = mysqli_fetch_assoc($result)) { ?>
            <a href="chat.php?id=<?php echo $row['id']; ?>">
                <div class="userbox">
                    <img src="image/<?php echo $row['img']; ?>"
                        alt="">
                    <h4 style="text-align: center;"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h4>
                </div>
            </a>
           <?php } ?>
        </div>
        <?php } ?>
    </div>
</body>
</html>