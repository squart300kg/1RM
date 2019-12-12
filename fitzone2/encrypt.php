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

// echo "비밀번호 바이너리:" . $key . "<br/>";

$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

$encrypted_id = base64_encode(openssl_encrypt($id, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv));
$encrypted_password = base64_encode(openssl_encrypt($password, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv));
$encrypted_nickname = base64_encode(openssl_encrypt($nickname, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv));
// var_dump($encrypted_id);exit;



     ?>
</body>

</html>
