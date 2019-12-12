<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>
    <?php
$key = 'password string';
$key = substr(hash('sha256', $key, true), 0, 32);
//
// echo "비밀번호 바이너리:" . $key . "<br/>";

$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

$decrypted_id = openssl_decrypt(base64_decode($_COOKIE['id']), 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
// var_dump($decrypted_id);exit;
$decrypted_password = openssl_decrypt(base64_decode($_COOKIE['password']), 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

$decrypted_nickname = openssl_decrypt(base64_decode($_COOKIE['nickname']), 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

     ?>
</body>

</html>
