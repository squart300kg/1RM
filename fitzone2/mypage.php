<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fitzone</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!--게시판 리스트를 위한 css 이다-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
  	<link rel="stylesheet" type="text/css" href="css/main.css">

    <!--로그인 폼을 위한 부트스트랩이다-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
    function warning(){

      var result = confirm("정말 회원을 탈퇴하시겠습니까?");

      if(result){
        var id = document.getElementById("id").value;
        console.log("mypage_id : "+id);
        location.href = "userDeletePro.php?id="+id;

      }else{
      }
    }

    function logout(){

      var result = confirm("정말 로그아웃 하시겠습니까?");

      if(result){

        location.href = "logout.php";
      }else{

      }
    }
  </script>
</head>

<body>
    <!--::header part start::-->
    <?php include 'top.php'; ?>
    <!-- Header part end-->


    <!-- breadcrumb start-->
   <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    <!--회원가입 후 POST로 넘겨받은 회원 정보들을 받아온다.-->
    <?php
    session_start();
    $id = $_SESSION['id'];
    if(isset($id)){//이부분은 추후에 세션으로 바꿀것이다.
      $db = mysqli_connect("127.0.0.1", "root", "123456", "power");

      $sql = "SELECT * FROM userinfo WHERE id = '$id'";//회원의 아이디를 디비로부터 가져온다.
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result);
    }
     ?>

    <!--::게시판이다::-->
    <div class="container" >
 	<form class="form-horizontal" style = "margin-top : 3%" action = "updateMyInfo.php" method = "post">
 	<div class="form-group">
 		<div class="col-sm-3"></div>
 		<div class="col-sm-6">
         <h2 align=center>MY PAGE</h2>
         </div>
     </div>
 	<div class="form-group">
 	<div class = "col-sm-2"></div>
 		<label class="control-label col-sm-2" for="username">아이디</label>
 		<div class="col-sm-2">
 			<p><?php echo $row['id']; ?></p>
      <input type="hidden" name="id" id = 'id' value="<?php echo $row['id']; ?>">
 		</div>
    <div class="col-sm-2">
      <button type="submit"  class="btn btn-success">내 정보 수정하기</button>
    </div>
 	</div>

 	<div class="form-group">
 	<div class = "col-sm-2"></div>
 		<label class="control-label col-sm-2" for="password">가입일</label>
 		<div class="col-sm-4">
 			<p><?php echo $row['registerdate']; ?></p>
      <input type="hidden" name="registerDate" value="<?php echo $row['registerdate']; ?>">
 		</div>
 	</div>

<!-- 내가 작성한 게시글들의 숫자를 불러온다 -->
<?php
$db = mysqli_connect("127.0.0.1", "root", "123456", "power");

$sql_bigmuscle_count = "SELECT COUNT(*) FROM board_bigmuscle7 where writter = '$row[nickname]'";
$sql_diet_count      = "SELECT COUNT(*) FROM board_diet where writter = '$row[nickname]'";
$sql_program_count   = "SELECT COUNT(*) FROM board_program where writter = '$row[nickname]'";
$sql_injury_count    = "SELECT COUNT(*) FROM board_injury where writter = '$row[nickname]'";

$result_bigmuscle_count = mysqli_query($db, $sql_bigmuscle_count);
$result_diet_count      = mysqli_query($db, $sql_diet_count);
$result_program_count   = mysqli_query($db, $sql_program_count);
$result_injury_count    = mysqli_query($db, $sql_injury_count);

$row_bigmuscle_count = mysqli_fetch_array($result_bigmuscle_count);
$row_diet_count      = mysqli_fetch_array($result_diet_count);
$row_program_count   = mysqli_fetch_array($result_program_count);
$row_injury_count    = mysqli_fetch_array($result_injury_count);

$total_count = $row_diet_count[0] + $row_injury_count[0] + $row_program_count[0] + $row_bigmuscle_count[0];


 ?>

  <div class="form-group">
 	<div class = "col-sm-2"></div>
 		<label class="control-label col-sm-2" for="password">전체 작성글 : </label>
 		<div class="col-sm-1">
 			<p><?php echo "$total_count" ?> 개</p>
 		</div>
    <div class="col-sm-2">
      <a href="myBoardList.php"><보러가기></a>
    </div>
 	</div>

  <div class="form-group">
 	<div class = "col-sm-2"></div>
 		<label class="control-label col-sm-2" for="password">이메일 : </label>
 		<div class="col-sm-4">
 			<p><?php echo $row['email'];; ?></p>
      <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
 		</div>
 	</div>

  <div class="form-group">
 	<div class = "col-sm-2"></div>
 		<label class="control-label col-sm-2" for="password">닉네임 : </label>
 		<div class="col-sm-4">
 			<p><?php echo $row['nickname']; ?></p>
      <input type="hidden" name="nickName" value="<?php echo $row['nickname']; ?>">
 		</div>
 	</div>
  <div class = "form-group">
  <div class = "col-sm-2"></div>
    <label class = "control-label col-sm-2">개인사진</label>
    <div class = "col-sm-4">
      <img src="user_Img/<?php echo $row['userimg'] ?>" id="img" width = "200" height = "200"/>
    </div>
  </div>

  <input type="hidden" name="password" value="<?php echo $row['password']; ?>">

  	<!-- <div class="form-group">
 		   <div class="col-sm-offset-5 col-sm-10">
 	       <button type="submit"  class="btn btn-success">내 정보 수정하기</button>
 		   </div>
 	   </div> -->

     <div class="form-group">
    	<div class="col-sm-offset-5 col-sm-10">
    	   <a onclick = "warning()"  class="btn btn-danger">회원 탈퇴하기</a>
       </div>
     </div>
     <div class="form-group">
    	<div class="col-sm-offset-5 col-sm-10">
    	   <a onclick = "logout()" class="btn btn-danger">로그아웃하기</a>
       </div>
     </div>
     </form>

 </div>


    <!--::exclusive_item_part end::-->

    <!--:::::::::::sibscribe part start:::::::::::::-->

    <!--:::::::::::sibscribe part end:::::::::::::-->

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_1">
                        <h4>About Us</h4>
                        <p>Heaven fruitful doesn't over for these theheaven fruitful doe over days
                            appear creeping seasons sad behold beari ath of it fly signs bearing
                            be one blessed.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Important Link</h4>
                        <div class="contact_info">
                            <ul>
                                <li><a href="#">WHMCS-bridge</a></li>
                                <li><a href="#"> Search Domain</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Shopping Cart</a></li>
                                <li><a href="#"> Our Shop</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <div class="contact_info">
                            <p><span> Address :</span> Hath of it fly signs bear be one blessed after </p>
                            <p><span> Phone :</span> +2 36 265 (8060)</p>
                            <p><span> Email : </span>info@colorlib.com </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-6">
                    <div class="single-footer-widget footer_3">
                        <h4>Newsletter</h4>
                        <p>Heaven fruitful doesn't over lesser in days. Appear creeping seas</p>
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Email Address'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="fas fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright_part_text">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="copyright_social_icon text-right">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="ti-dribbble"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>
