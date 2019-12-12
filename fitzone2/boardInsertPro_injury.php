<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fitzone</title>

</head>

<body>
    <?php
        $db = mysqli_connect("127.0.0.1", "root", "123456", "power");

        $injury   = $_POST["injury"];
        $subject  = $_POST["subject"];
        $contents = $_POST["contents"];
        $writter  = $_POST["writter"];

        $sql = "INSERT INTO board_injury
        VALUES (0,'$subject', '$contents', '$writter', NOW(), 0, '$injury')";

        $result = mysqli_query($db, $sql);

        Header("Location:./boardList_injury.php?injury=$injury&pageNo=1");
     ?>
</body>
</html>
