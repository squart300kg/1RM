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

        $injury = $_POST["injury"];
        $no = $_POST["no"];

        $sql = "DELETE FROM board_injury WHERE no = $no";
        $result = mysqli_query($db, $sql);
        Header("Location:./boardList_injury.php?injury=$injury&pageNo=1");

     ?>
</body>

</html>
