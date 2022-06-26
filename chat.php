<?php
session_start();
if (!isset($_SESSION["userid"])) {
    header("location:login.php");
}
$userid = $_SESSION["userid"];
$con = mysqli_connect("localhost", "root", "", "chatapp");
$sql1 = "SELECT * FROM user WHERE id = $userid";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1)) {
    $row1 = mysqli_fetch_assoc($result1);

?>
    <?php
    $id = $_GET['id'];
    $con = mysqli_connect("localhost", "root", "", "chatapp");
    $sql = "SELECT * FROM user WHERE id = $id ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);

    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?php echo $row['fname']; ?> +
                <?php echo $row1['fname']; ?>
            </title>
            <link rel="stylesheet" href="style.css">
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        </head>

        <body>
            <div onclick="awd()" class="container1">
                <div class="chatbox">

                    <div class="chathead">
                        <a href="index.php">
                            <ion-icon class="back" name="arrow-back-outline"></ion-icon>
                        </a>

                        <div class="info">
                            <img src="image/<?php echo $row['img']; ?>" alt="">
                            <h2>
                                <?php echo $row['fname']; ?>
                                <?php echo $row['lname']; ?>
                            </h2>
                        </div>


                    </div>

                    <div class="chatboard">

                    </div>
                    <div class="chatfooter">
                        <?php date_default_timezone_set("Asia/Dhaka"); ?>

                        <form id="form">

                            <input type="hidden" id="mtime" name="mtime" value="<?php echo date(" h:i || d-m-y"); ?> ">

                            <input type="hidden" id="outgoing" value="<?php echo $row1['id']; ?>">


                            <input type="hidden" id="incoming" value="<?php echo $row['id']; ?>">
                            <div class="fill">
                                <textarea name="textbox" class="textbox" id="textbox" placeholder="Write Massage...."></textarea>
                            </div>
                            <ion-icon class="send" name="send"></ion-icon>
                        </form>

                    </div>
                </div>
            </div>
        </body>
        <script>
            $(document).ready(function() {



                function load() {
                    var incoming = $("#incoming").val();
                    var outgoing = $("#outgoing").val();
                    $.ajax({
                        url: "php/msgshow.php",
                        type: "post",
                        data: {
                            incoming: incoming,
                            outgoing: outgoing
                        },
                        success: function(data) {
                            $(".chatboard").html(data);
                            document.querySelector(".chatboard").scrollTop += 1000000000000000;

                        }
                    })
                }

                // ------------------ real time function-----------------------
                function a() {

                }
                var id = setInterval(anime, 100);

                $(".chatboard").hover(function() {
                    clearInterval(id)
                })
                $(".chatboard").mouseleave(function() {
                    id = setInterval(anime, 100);
                })

                function anime() {
                    load()
                }
                $("#msg").click(function() {
                    $("#time").toggle()
                })
                // ---------- 
                $(".send").on("click", function(e) {
                    e.preventDefault();
                    var massage = $("#textbox").val();
                    var time = $("#mtime").val();
                    var incoming = $("#incoming").val();
                    var outgoing = $("#outgoing").val();
                    $.ajax({
                        url: "php/msgsend.php",
                        type: "POST",
                        data: {
                            time: time,
                            incoming: incoming,
                            outgoing: outgoing,
                            massage: massage
                        },
                        success: function(data) {
                            if (data == 1) {
                                document.querySelector(".chatboard").scrollTop += 1000000000000000;
                                load();
                                $("#textbox").val("");
                            } else {
                                alert("con't save record");
                            }
                        }
                    })

                })


            })
        </script>
    <?php } ?>
<?php } ?>

        </html>