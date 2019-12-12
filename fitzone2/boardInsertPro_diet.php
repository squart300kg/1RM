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

        $diet= $_POST["diet"];
        $subject  = $_POST["subject"];
        $contents = $_POST["contents"];
        $writter  = $_POST["writter"];

        $sql = "INSERT INTO board_diet
        VALUES (0,'$subject', '$contents', '$writter', NOW(), 0, '$diet')";

        $result = mysqli_query($db, $sql);

        Header("Location:./boardList_diet.php?diet=$diet&pageNo=1");
     ?>
</body>
</html>
