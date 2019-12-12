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

    $email = $_GET['email'];
    $nickname = $_GET['nickname'];
    // var_dump($email);
    // var_dump($nickname);
    // exit;
    $sql = "SELECT COUNT(*) FROM userinfo WHERE email = '$email' AND nickname = '$nickname'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);

    // mysql_close($db);
    // mysqli_close($db);
    $id='hello';
    if($row[0] == 1){
      $sql_id = "SELECT id FROM userinfo WHERE email = '$email' AND nickname = '$nickname'";
      $result_id = mysqli_query($db, $sql_id);
      $row_id = mysqli_fetch_array($result_id);
      $id = $row_id['id'];
    }
   ?>

   <script>
   console.log("userInsert_dup_chk넘어옴");
     var row = "<?php echo $row[0]?>";
     if(row == 1){
       // parent.document.getElementById("currentVal_Id").value = "0";
       parent.alert("회원님의 아이디는 <?php echo $id ?>입니다.");
       console.log(row);
     }else{
       // parent.document.getElementById("currentVal_Id").value = "1";
       parent.alert("입력하신 정보가 올바르지 않습니다!");
       console.log(row);
     }
   </script>
</body>

</html>
