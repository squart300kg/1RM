<!DOCTYPE html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <title>MySql-PHP TEST</title>

</head>

<body>

<?php

echo "MySql TEST<br>";

$db = mysqli_connect("127.0.0.1", "root", "123456", "power");

if($db){

    echo "connect : success<br>";

}

else{

    echo "connect : fail<br>";

}

?>

</body>

</html>
