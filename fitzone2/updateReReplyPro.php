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
        $board_category = $_POST["bigMuscle7"];
        $rereply_no = $_POST["rereply_no"];
        $board_no = $_POST['board_no'];
        $contents = $_POST['contents'];

        $sql = "UPDATE rereply_bigmuscle7 SET contents = '$contents' WHERE no = $rereply_no";
        $result  = mysqli_query($db, $sql);

        Header("Location:./board.php?bigMuscle7=$board_category&no=$board_no");
     ?>
</body>

</html>
