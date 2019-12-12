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
  if(isset($_POST["id"])){
    $id = $_POST['id'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];
    $email = $_POST['email'];
    $nickName = $_POST['nickName'];

    $input_img = $_FILES["input_img"]["name"];//이미지 이름
    $target = "user_Img/".$input_img;//image를 저장할 경로
    $tmp_name = $_FILES["input_img"]["tmp_name"];//임시로 이미지가 저장되는 경로
    $error = $_FILES["input_img"]["error"];//파일 에러코드
      // echo $input_img, $target, $tmp_name;

      // if(empty($input_img)){
      //   echo "파일을 전송받지 아니함";
      //   echo $input_img;
      // }else{
      //   echo "파일을 전송받음";
      // }


  $db = mysqli_connect("127.0.0.1", "root", "123456", "power");
  $sql = "SELECT * FROM userinfo WHERE id = '$id'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result);

  //0. 입력 폼값에 널값은 없는가?
  //1. 현재 비밀번호가 맞는가?
  // 2. 새 비번과 새 비번 확인이 동일한가?
  // 3. 닉네임 값이 중복되지 않는가?
  // 4. 모두 통과하면 db를 수정한다.

  if(!empty($email) && !empty($nickName) && !empty($currentPassword) && !empty($newPassword) && !empty($confirmNewPassword)){
    if($currentPassword == $row['password']){
      if($newPassword == $confirmNewPassword){
        //중복된 닉네임이 있는지 검사한다. 본인 아이디의 닉네임을 제외하고 다른 회원의 닉네임이 있는지 검사한다.

        if(empty($input_img)){//파일을 전송받지 않았다면

          //회원의 이미지 파일을 제외한 정보들을 갱신해준다.
          $sql_update = "UPDATE userinfo SET password = '$newPassword', email = '$email', nickname = '$nickName' WHERE id = '$id'";
          $update_result = mysqli_query($db, $sql_update);
          Header("Location:./main.php");

        }else{//파일을 전송받았다면

          if(move_uploaded_file($tmp_name, $target)){//임시 경로에 있는 파일을 지정한 위치로 이동

            //회원정보를 갱신해준다.
            $sql_update = "UPDATE userinfo SET password = '$newPassword', email = '$email', nickname = '$nickName', userimg = '$input_img' WHERE id = '$id'";
            $update_result = mysqli_query($db, $sql_update);
            Header("Location:./main.php");
          }else{
              Header("Location:./main.php?status=move_uploaded_file이False로나옴");
          }
        }


      }else{
        Header("Location:./updateMyInfo.php?error=새 비밀번호와 새 비밀번호 확인이 일치하지 않음");
      }
    }else{
      Header("Location:./updateMyInfo.php?error=현재 비밀번호가 불일치");
    }
  }else{
    Header("Location:./updateMyInfo.php?error=입력폼에 널값이 존재");
  }

  }


   ?>
</body>

</html>
