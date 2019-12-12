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
        $program = $_POST['program'];
        $board_no = $_POST['board_no'];
        $reply_no = $_POST["reply_no"];
        $contents = $_POST["contents"];
        $writter = $_POST['writter'];

        $sql = "INSERT INTO rereply_program VALUES (0, '$writter', '$contents', NOW(),  $reply_no)";

        $result = mysqli_query($db, $sql);
        Header("Location:./board_program.php?program=$program&no=$board_no");
     ?>

</body>

</html>
