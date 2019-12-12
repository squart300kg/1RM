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

$id = $_POST["id"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$nickName = $_POST["nickName"];
$email = $_POST["email"];

$input_img = $_FILES["input_img"]["name"];//이미지 이름
$target = "user_Img/".$input_img;//image를 저장할 경로
$input_img_type = $_FILES["input_img"]["type"];//파일 type
$input_img_size = $_FILES["input_img"]["size"];//파일 size
$tmp_name = $_FILES["input_img"]["tmp_name"];//임시로 이미지가 저장되는 경로
$error = $_FILES["input_img"]["error"];//파일 에러코드
echo "파일 이동 실패1";
move_uploaded_file($tmp_name, $target);//임시 경로에 있는 파일을 지정한 위치로 이
echo "파일 이동 실패2";


$sql  = "INSERT INTO userinfo VALUES ('$id','$password','$nickName','$email', NOW(), '$input_img')";

$result = mysqli_query($db, $sql);
if($result === false){
    echo mysqli_error($conn);
}

echo "<script>alert('회원가입이 완료되었습니다.');</script>";
//세션을 유지할 수 없으니 일단 회원가입 완료한 회원의 id를 GET방식으로 메인에 넘겨준다.
Header("Location:./main.php?id=$id&imgURL=$tmp_name");

 ?>

</body>

</html>
