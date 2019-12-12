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
    function auto_login_check(){
      var is_check = document.loginProForm.auto_login.checked;
      console.log("login.php - auto_login_check"+is_check);

      if(is_check){//자동로그인이 체크되었을 때 알림메시지를 띄워준다.
        var result = confirm("로그인 상태 유지에 체크 후 로그인하시면 브라우저의 쿠키를 삭제하거나 로그아웃을 선택하기 전까지는 계속 로그인 상태가 유지됩니다.\n- 1주 동안 해당 PC에서 1RM(해당 웹사이트를 지칭)를 사용하지 않는다면 로그인 상태 유지는 해제될 수 있습니다.\n- 개인 정보 보호를 위해 공용 PC에서는 사용에 유의해 주시기 바랍니다.\n\n 자동 로그인을 설정하시겠습니까?");

        if(result){
          console.log("트루 : 사용자의 아이디와 비밀번호값을 쿠키에 저장할 준비를 한다."  );

        }else{
          console.log("폴스 : 아무것도 안한다." );
        }

      }else{
        return;
      }


    }
  </script>
</head>

<body>
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

    <!--::게시판이다::-->
    <div class="container" >
 	<form class="form-horizontal" style = "margin-top : 3%" action = "loginPro.php" name = "loginProForm" method = "post">
 	<div class="form-group">
 		<div class="col-sm-3"></div>
 		<div class="col-sm-6">
         <h2 align=center>로그인</h2>
         </div>
  </div>
 	<div class="form-group">
 	<div class = "col-sm-2"></div>
 		<label class="control-label col-sm-2" for="username">아이디</label>
 		<div class="col-sm-4">
 			<input type="text" class="form-control" id="id" name="id" maxlength="20" placeholder="아이디 입력">
 		</div>
 	</div>

 	<div class="form-group">
 	<div class = "col-sm-2"></div>
 		<label class="control-label col-sm-2" for="password">비밀번호</label>
 		<div class="col-sm-4">
 			<input type="password" class="form-control" id="password" name="password" placeholder="비밀번호 입력">
 		</div>
 	</div>

  <div class="form-group">
 	<div class = "col-sm-2"></div>
 		<label class="control-label col-sm-2" for="password" ></label>
 		<div class="col-sm-4">
      <input type="checkbox" name="auto_login" id = "auto_login" onclick = "auto_login_check()" style = "float : left">자동로그인
 		   <a href="searchUserInfo.php" style = "float : right;">아이디/비밀번호 찾기</a>
 		</div>
 	</div>
  <?php
  $url = $_POST["url"];
   ?>
   <input type="hidden" name="url" value="<?php echo $url ?>">
  	<div class="form-group">
 		<div class="col-sm-offset-5 col-sm-10">

 	        <button type = "submit" class="btn btn-primary">로그인</button>
 	        <a href="userInsert.php">
 	        	<button type = "button" class="btn btn-success">회원가입</button>
 	        </a>

 		</div>

 	</div>
     </form>

 </div>


    <!--::exclusive_item_part end::-->

    <!--:::::::::::sibscribe part start:::::::::::::-->
    <section class="sibscribe-area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="sibscribe-text text-center">
                    <h1>Start 15 days free trial</h1>
                    <p>Deep saw bearing seasons in two itself days hath</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <form class="sibscribe-form">
                        <input type="email" class="form-control" id="exampleInputEmail11"  placeholder='Enter Email Address'
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address'">
                        <a class="btn_2 sibscribe-btm">Subscribe</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
