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

        $id  = $_GET["id"];

        $sql = "DELETE FROM userinfo WHERE ID = '$id'";
        $result = mysqli_query($db, $sql);

        session_start();
        session_unset();

        echo "<script>alert('회원탈퇴가 완료되었습니다.');</script>";


        Header("Location:./main.php");
     ?>

</body>

</html>
