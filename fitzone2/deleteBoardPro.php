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

        $bigMuscle = $_POST["bigMuscle7"];
        $no = $_POST["no"];

        $sql = "DELETE FROM board_bigmuscle7 WHERE no = $no";
        $result = mysqli_query($db, $sql);
        Header("Location:./boardList.php?bigMuscle7=$bigMuscle&pageNo=1");

     ?>
</body>

</html>
