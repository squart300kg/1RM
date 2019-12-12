<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <?php
    $db = mysqli_connect("127.0.0.1", "root", "123456", "power");

        $replyContents    = $_POST["replyContents"];
        $injury           = $_POST["injury"];
        $no               = $_POST["no"];
        $writter          = $_POST["writter"];

        $sql = "INSERT INTO reply_injury
        VALUES (0, '$writter', '$replyContents', NOW(), '$injury', $no)";
        $result = mysqli_query($db, $sql);

        Header("Location:./board_injury.php?injury=$injury&no=$no");
     ?>

</body>

</html>
