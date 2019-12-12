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
        $bigMuscle       = $_POST["bigMuscle7"];
        $no               = $_POST["no"];
        $writter          = $_POST["writter"];

        $sql = "INSERT INTO reply_bigmuscle7
        VALUES (0, '$writter', '$replyContents', NOW(), '$bigMuscle', $no)";
        $result = mysqli_query($db, $sql);

        Header("Location:./board.php?bigMuscle7=$bigMuscle&no=$no");
     ?>

</body>

</html>
