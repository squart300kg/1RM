<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>
    <?php
        $id    = $_POST["id"];
        $password = $_POST["password"];
        $auto_login = $_POST['auto_login'];
        // $url = $_POST['url'];
        // var_dump($url); exit;
        $db = mysqli_connect("127.0.0.1", "root", "123456", "power");
        $sql = "SELECT * FROM userinfo WHERE id = '$id'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);

        //1.아이디가 존재하는지 확인한다. 아이디가 존재한다면
        //2. 해당 아이디의 비밀번호가 맞는지 확인한다. 비밀번호가 맞다면
        //3. 로그인을 시켜준다. - 추후에 세션 저장 -

        if(!empty($row['id'])){//id가 비어있지 않다면(=존재한다면)
          if($row['password'] == $password){//폼에 입력된 비밀번호와 db의 비밀번호가 같다면
                //로그인을 시켜준다!
              session_start();

              $id = $row['id'];
              $nickname = $row['nickname'];
              $password = $row['password'];
              $_SESSION['id'] = $id;
              $_SESSION['nickname'] = $nickname;

              include 'encrypt.php';

              echo $auto_login;
              echo $_SESSION['id'];
              echo $_SESSION['nickname'];

              //만약 자동로그인이 체크되어 있었다면!
              if($auto_login){//앞으로 자동로그인을 시켜줄 쿠키값을 저장한다.
                setcookie('id', $encrypted_id, time()+(3600*24*7),'/');
                setcookie('password', $encrypted_password, time()+(3600*24*7),'/');
                setcookie('nickname', $encrypted_nickname, time()+(3600*24*7),'/');
              }
              Header("Location:./main.php");
          }else{
            echo "<script>alert('존재하지 않는 아이디거나 비밀번호가 일치하지 않습니다.');</script>";
            echo "<script>location.href='login.php';</script>";

          }
        }else{
          echo "<script>alert('존재하지 않는 아이디거나 비밀번호가 일치하지 않습니다.');</script>";
          echo "<script>location.href='login.php';</script>";
        }

     ?>
</body>

</html>
