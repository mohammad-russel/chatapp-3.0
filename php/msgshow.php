<?php
$incoming = $_POST['incoming'];
$outgoing = $_POST['outgoing'];
$con = mysqli_connect("localhost", "root", "", "chatapp");
$sql = "SELECT * FROM chat LEFT JOIN user ON user.id = chat.outgoing WHERE ( outgoing = $outgoing and incoming = $incoming) OR (outgoing = $incoming AND incoming = $outgoing )  ";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result)) {
    echo   $output = '   <div class="chatroom"> ';
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['outgoing'] == $outgoing) {
            echo $output = '
            <div class="chat r">
            <p id="time1" class="time">' . $row['mtime'] . '</p>
            <p id="msg1" class="msg">  ' . $row['msg'] . '</p>
        </div>
                    ';
        } else {
            echo $output =  '
            <div class="chat l">
            <p id="time1" class="time">' . $row['mtime'] . '</p>
            <p id="msg1" class="msg">  ' . $row['msg'] . '</p>
        </div>
                    ';
        }
    }
    echo    $output = ' </div>';

} else {
    echo "<p> No message </p>";
}



?>