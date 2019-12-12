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
    function searchUserInfo(searchType){
      if(searchType == "searchId"){
        document.getElementById("searchIdForm").style.display = "block";
        document.getElementById("searchPasswordForm").style.display = "none";
      }else if(searchType  == "searchPassword"){
        document.getElementById("searchPasswordForm").style.display = "block";
        document.getElementById("searchIdForm").style.display = "none";
      }
    }
    function searchUserId(){
      var email = document.searchIdForm.email.value;
      var nickname = document.searchIdForm.nickName.value;
      // alert(email);
      // alert(nickname);
      ifrm1.location.href="searchUserId.php?email="+email+"&nickname="+nickname;
    }
    function searchUserPassword(){
      var id = document.searchPasswordForm.id.value;
      var email = document.searchPasswordForm.email.value;
      var nickname = document.searchPasswordForm.nickName.value;
      // alert(id);
      // alert(email);
      // alert(nickname);
      ifrm1.location.href="searchUserPassword.php?id="+id+"&email="+email+"&nickname="+nickname;
    }
  </script>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#">   </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="main.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">about</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        빅머슬7
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="boardList.php?bigMuscle7=squart&pageNo=1">스쿼트</a>
                                      <a class="dropdown-item" href="boardList.php?bigMuscle7=deadlift&pageNo=1">데드리프트</a>
                                      <a class="dropdown-item" href="boardList.php?bigMuscle7=benchpress&pageNo=1">벤치프레스</a>
                                      <a class="dropdown-item" href="boardList.php?bigMuscle7=pullpu&pageNo=1">턱걸이</a>
                                      <a class="dropdown-item" href="boardList.php?bigMuscle7=dips&pageNo=1">딥스</a>
                                      <a class="dropdown-item" href="boardList.php?bigMuscle7=militarypress&pageNo=1">밀리터리프레스</a>
                                      <a class="dropdown-item" href="boardList.php?bigMuscle7=barbelrow&pageNo=1">바벨로우</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        부상
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="trainers.html">목&어깨</a>
                                        <a class="dropdown-item" href="trainers.html">팔꿈치&손목</a>
                                        <a class="dropdown-item" href="single-blog.html">허리</a>
                                        <a class="dropdown-item" href="elements.html">무릎&발목</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        식단
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="trainers.html">탄수화물</a>
                                        <a class="dropdown-item" href="single-blog.html">단백질</a>
                                        <a class="dropdown-item" href="elements.html">지방</a>
                                        <a class="dropdown-item" href="elements.html">그 외 영양소</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        운동 프로그램
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="trainers.html">For. 3대 ~300</a>
                                        <a class="dropdown-item" href="single-blog.html">For. 3대 400</a>
                                        <a class="dropdown-item" href="elements.html">For. 3대 500</a>
                                        <a class="dropdown-item" href="elements.html">For. 3대 600이상</a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="menu_btn">
                          <?php
                              if(isset($_POST['id'])){
                                $id = $_POST['id'];
                                ?>
                                  <a href="#" class="btn_2 d-none d-sm-block"><?php echo "$id 님, \n안녕하세요!" ?></a>
                                <?php
                              }else{
                                ?>
                                <a href="login.php" class="btn_2 d-none d-sm-block">로그인</a>
                                <?php
                              }
                           ?>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
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
    if(isset($_POST["id"])){
      $id = $_POST['id'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $name = $_POST['nickName'];
      $registerDate = $_POST['registerDate'];
    }
     ?>

    <!--::게시판이다::-->
    <div class="container" >
  <!-- <form class="form-horizontal" style = "margin-top : 3%" action = "updateMyInfoPro.php" method = "post"> -->
  <div class="form-horizontal" style = "margin-top : 3%">

    <!-- <input type="hidden" name="registerDate" value="<?php echo $registerDate; ?>">
    <input type="hidden" name="password" value="<?php echo $password; ?>"> -->
  <div class="form-group">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
         <h2 align=center>아이디 / 비밀번호 찾기</h2>
         </div>
     </div>

     <div style="height: auto; width: 100%; border:1px solid black;">
       <!-- <input type="radio" onclick = "select()" name="searchType" value="searchId">아이디 찾기 -->
       <div class="form-group" style = "margin-top : 10px">
         <div class = "col-sm-2"></div>
           <label class="control-label col-sm-2" for="password">아이디 찾기</label>
           <div class="col-sm-4">
          <input type="radio" onclick = "searchUserInfo(this.value)" name="searchType" value="searchId">
          </div>
        </div>
        <form  class="container" action="searchId.php" method="post" name = "searchIdForm" id = "searchIdForm"  style = "display : none">
          <input type="hidden" name="correctVal_Id" id = "correctVal_Id" value="0">
          <div class="container" >
            <div class="form-group">
              <div class = "col-sm-2"></div>
                <label class="control-label col-sm-2" for="password">닉네임 : </label>
                <div class="col-sm-4">
                <input type="text"  class = "form-control"placeholder="닉네임 입력" name="nickName" value="<?php echo $name; ?>">
               </div>
             </div>
             <div class="form-group">
             <div class = "col-sm-2"></div>
               <label class="control-label col-sm-2" for="password">이메일 : </label>
               <div class="col-sm-4">
                 <input type="text" class = "form-control" name="email" placeholder="이메일 입력"value="<?php echo $email; ?>">
               </div>
             </div>
             <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10">
                   <button type="button"  onclick = "searchUserId()"  class="btn btn-primary">확인</button>
                </div>
              </div>
          </div>
          <!-- <input type="submit" name="" class="btn btn-primary"  value=""> -->
        </form>

        <div class="form-group">
          <div class = "col-sm-2"></div>
            <label class="control-label col-sm-2" for="password">비밀번호 찾기</label>
            <div class="col-sm-4">
          <input type="radio" onclick = "searchUserInfo(this.value)" name="searchType" value="searchPassword">
           </div>
         </div>
         <form class="container" action="searchPassword.php" method="post" name = "searchPasswordForm" id = "searchPasswordForm"  style = "display : none">
           <input type="hidden" name="correctVal_Password" id = "correctVal_Password" value="0">
           <div>
             <div class="form-group">
               <div class = "col-sm-2"></div>
                 <label class="control-label col-sm-2" for="password">아이디 : </label>
                 <div class="col-sm-4">
                 <input type="text"  class = "form-control"placeholder="아이디 입력" name="id" value="<?php echo $name; ?>">
                </div>
              </div>
             <div class="form-group">
               <div class = "col-sm-2"></div>
                 <label class="control-label col-sm-2" for="password">닉네임 : </label>
                 <div class="col-sm-4">
                 <input type="text"  class = "form-control"placeholder="닉네임 입력" name="nickName" value="<?php echo $name; ?>">
                </div>
              </div>

              <div class="form-group">
              <div class = "col-sm-2"></div>
                <label class="control-label col-sm-2" for="password">이메일 : </label>
                <div class="col-sm-4">
                  <input type="text" class = "form-control" name="email" placeholder="이메일 입력"value="<?php echo $email; ?>">
                </div>
              </div>
              <div class="form-group">
                 <div class="col-sm-offset-5 col-sm-10">
                    <button type="button"  onclick = "searchUserPassword()"  class="btn btn-primary">확인</button>
                 </div>
               </div>
           </div>
         </form>
           <IFRAME src="" id = "ifrm1" scrolling = no frameborder = no width=0 height=0 name = "ifrm1"></IFRAME>

       <!-- <input type="radio" onclick = "select()" name="searchType" value="searchPassword">비밀번호 찾기 -->
     </div>
    <!-- <div class="form-group">
       <div class="col-sm-offset-5 col-sm-10">
          <button type="button"  onclick = "searchUserId()"  class="btn btn-primary">확인</button>
          </a>
         </div>
       </div> -->
     </div>
   <!-- </form> -->
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
