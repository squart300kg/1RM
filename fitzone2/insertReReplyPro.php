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
        $bigMuscle = $_POST['bigMuscle7'];
        $board_no = $_POST['board_no'];
        $reply_no = $_POST["reply_no"];
        $contents = $_POST["contents"];
        $writter = $_POST['writter'];

        $sql = "INSERT INTO rereply_bigmuscle7 VALUES (0, '$writter', '$contents', NOW(),  $reply_no)";

        $result = mysqli_query($db, $sql);
        Header("Location:./board.php?bigMuscle7=$bigMuscle&no=$board_no");
     ?>

</body>

</html>
