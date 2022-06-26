<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <?php date_default_timezone_set("Asia/Dhaka"); ?>
    <div class="container2">
        <form action="php/datacollect.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="jointime" name="jointime" value="<?php echo date("h:i || d-m-y"); ?> ">
            <input type="text" name="fname" id="fname" placeholder="First Name" required>
            <input type="text" name="lname" id="lname" placeholder="last Name" required>
            <input type="number" name="number" id="number" placeholder="Number" required>
            <input type="file" name="img" id="img" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" id="login"  
           name="submit" value="Sign-Up">
            <p>If You All-Ready A Member Please <a href="login.php">Login</a></p>
        </form>
    </div>
</body>

</html>