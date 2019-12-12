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
    $id = $_GET['id'];
    $user_email = $_GET['email'];
    $nickname = $_GET['nickname'];

    $db = mysqli_connect("127.0.0.1", "root", "123456", "power");

    $sql = "SELECT * FROM userinfo WHERE email = '$user_email' AND nickname = '$nickname' AND id = '$id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);

    $id = $row['id'];
    $password = $row['password'];
    if(!empty($id)){
      echo "<script>console.log('searchUserPassword.php - 비밀번호 변경로직 시행');</script>";
      $changedPassword = hash("md5", $password);
      echo "<script>console.log('searchUserPassword - 변경 후의 비밀번호 : $changedPassword');</script>";
      $sql_changeUserPassword = "UPDATE userinfo SET password = '$changedPassword' WHERE id = '$id'";
      $result_changeUserPassword = mysqli_query($db, $sql_changeUserPassword);

      include 'mailSender.php';
      // include 'PHPMailer.php';
      // $to = $email;
      // $subject = "[1RM]아이디/비밀번호 찾기 서비스입니다. ^_^";
      // $contents = "회원님의 비밀번호는 '$changedPassword' 입니다. 좋은하루 되세요~ ^_^";
      // $header = "헤더";
      mail($to, $subject, $contents, $header);
    }else{

    }
   ?>

   <script>
   console.log("userInsert_dup_chk넘어옴");
     var row = "<?php echo $row['id']?>";
     if(row != ""){
       // parent.document.getElementById("id2").value = "0";
       parent.alert("회원님의 이메일인 '<?php echo $user_email ?>'로 암호화된 비밀번호를 전송해 드렸습니다.");
       console.log(row);
     }else{
       // parent.document.getElementById("id2").value = "1";
       parent.alert("입력하신 정보가 올바르지 않습니다!");
       console.log(row);
     }
   </script>
</body>

</html>
