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

    $id = $_GET['id'];
    $currentPassword = $_GET['currentPassword'];
    $newPassword = $_GET['newPassword'];
    $confirmNewPassword = $_GET['confirmNewPassword'];


    $sql = "SELECT * FROM userinfo WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);

    // mysql_close($db);
    // mysqli_close($db);
   ?>

   <script>
   console.log("updateMyInfo_chk넘어옴");
     var id = "<?php echo $id ?>";
     var currentPassword_db = "<?php echo $row['password']?>";
     var currentPassword = "<?php echo $currentPassword ?>"
     console.log("id : " + id);
     console.log("currentPassword_db : "+currentPassword_db);
     console.log("currentPassword : " + currentPassword);
     if(currentPassword_db != currentPassword){//현재 비밀번호와 입력 비밀번호가 맞지 않다면
       parent.alert("현재 비밀번호가 맞지 않습니다!");
       console.log("updateMyInfo_chk : 현재 비밀번호가 맞지 않습니다!");
       parent.document.getElementById("password_chk").value = "1";
     }else{//현재 비밀번호와 입력 비밀번호가 맞다면!
       if(<?php echo $newPassword ?> != <?php echo $confirmNewPassword ?>){//바꾸려는 비밀번호와 그 비미번호 확인이 일치하지 않는다면!
         parent.alert("바꾸려는 비밀번호와 비밀번호 확인이 일치하지 않습니다!");
         console.log("updateMyInfo_chk : 바꾸려는 비밀번호와 비밀번호 확인이 일치하지 않습니다!");
         parent.document.getElementById("password_chk").value = "2";
       }else{//비밀번호와 비밀번호 확인이 일치한다면!
         parent.document.getElementById("password_chk").value = "3";
       }
     }
   </script>
</body>

</html>
