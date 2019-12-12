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

        $bigMuscle= $_POST["bigMuscle7"];
        $subject  = $_POST["subject"];
        $contents = $_POST["contents"];
        $writter  = $_POST["writter"];

        $sql = "INSERT INTO board_bigmuscle7
        VALUES (0,'$subject', '$contents', '$writter', NOW(), 0, '$bigMuscle')";

        $result = mysqli_query($db, $sql);

        Header("Location:./boardList.php?bigMuscle7=$bigMuscle&pageNo=1");
     ?>
</body>
</html>
