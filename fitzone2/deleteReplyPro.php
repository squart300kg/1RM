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
  $reply_no   = $_POST['reply_no'];
  $bigMuscle  = $_POST['board_category'];
  $board_no   = $_POST['board_no'];
  $db = mysqli_connect("127.0.0.1", "root", "123456", "power");
  $sql = "DELETE FROM reply_bigmuscle7 WHERE no = $reply_no AND  board_category = '$bigMuscle'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result);

  Header("Location:./board.php?bigMuscle7=$bigMuscle&no=$board_no");

   ?>
</body>

</html>
