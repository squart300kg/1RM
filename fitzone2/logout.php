<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <?php
    session_start();
    session_unset();

    setcookie('id', '', time()-3600, '/');
    setcookie('password', '', time()-3600, '/');
    setcookie('nickname', '', time()-3600, '/');
    Header("Location:./main.php");
     ?>

</body>

</html>
