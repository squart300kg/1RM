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

        $program = $_POST["program"];
        $no = $_POST["no"];

        $sql = "DELETE FROM board_program WHERE no = $no";
        $result = mysqli_query($db, $sql);
        Header("Location:./boardList_program.php?program=$program&pageNo=1");

     ?>
</body>

</html>
