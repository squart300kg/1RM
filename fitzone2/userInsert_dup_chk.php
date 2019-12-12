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

    $sql = "SELECT COUNT(*) FROM userinfo WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);

    // mysql_close($db);
    // mysqli_close($db);
   ?>

   <script>
   console.log("userInsert_dup_chk넘어옴");
     var row = "<?php echo $row[0]?>";
     if(row == 1){
       parent.document.getElementById("id2").value = "0";
       parent.alert("이미 사용중인 아이디 입니다!");
       console.log(row);
     }else{
       parent.document.getElementById("id2").value = "1";
       parent.alert("사용 가능한 아이디 입니다!");
       console.log(row);
     }
   </script>
</body>

</html>
