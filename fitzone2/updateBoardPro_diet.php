<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <!--::게시판 하나 보여주기::-->
    <?php
        $db = mysqli_connect("127.0.0.1", "root", "123456", "power");

        $subject    = $_POST["subject"];
        $contents = $_POST["contents"];
        $writter  = $_POST["writter"];

        $diet = $_POST["diet"];
        $no = $_POST["no"]; 

        $sql = "UPDATE board_diet SET subject = '$subject', contents = '$contents', registerdate = NOW() WHERE no = $no";
        $result = mysqli_query($db, $sql);
        Header("Location:./boardList_diet.php?diet=$diet&pageNo=1");
     ?>

</body>

</html>
