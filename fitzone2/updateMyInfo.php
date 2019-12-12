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

  var sel_file;

  $(document).ready(function(){
    $("#input_img").on("change", handleImgFileSelect);
    console.log("이미지가 바뀐것을 감지 및 메소드 실행")
  });

  function handleImgFileSelect(e){
    var files = e.target.files;
    var fileArr = Array.prototype.slice.call(files);

    fileArr.forEach(function(f){
      if(!f.type.match("image.*")){
        alert("확장자는 이미지 확장자만 가능합니다.");
        return;
      }

      sle_file = f;

      var reader = new FileReader();
      reader.onload = function(e){
        $("#img").attr("src", e.target.result);
      }
      reader.readAsDataURL(f);
    });
  }

  function updateMyInfoPro(){
    var userid             = document.getElementById("id").vaule;//이건 안되는 코드 왜안되는지 모름 씨발.
    var currentPassword    = document.getElementById("currentPassword").value;
    var newPassword        = document.getElementById("newPassword").value;
    var confirmNewPassword = document.getElementById("confirmNewPassword").value;
    var id                 = document.getElementById("id").value;

    console.log("updateMyInfo_id : " + id);
    console.log("updateMyInfo_currentPassword : " + currentPassword);
    console.log("newPassword : " + newPassword);
    console.log("confirmNewPassword : " + confirmNewPassword);

    ifrm1.location.href = "updateMyInfo_chk.php?id="+id+"&currentPassword="+currentPassword+"&newPassword="+newPassword+"&confirmNewPassword="+confirmNewPassword;

    if(document.getElementById("password_chk").value == "3"){
      console.log("updateMyInfo - submit을 위한 준비 시작");
      var form = document.updateMyInfoForm;
      form.submit();
      console.log("updateMyInfo - submit완료");
    }
  }


</script>
</head>

<body>

  <?php include 'top.php'; ?>


    <!-- breadcrumb start-->
   <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                          <p>단속반이 되기 위해선 개인정보도 소중히</p>
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
  <form class="form-horizontal" style = "margin-top : 3%" name = "updateMyInfoForm" action = "updateMyInfoPro.php" method = "post" enctype="multipart/form-data">
    <input type="hidden" name="registerDate" value="<?php echo $registerDate; ?>">
    <input type="hidden" name="password" value="<?php echo $password; ?>">
    <input type="hidden" id = "password_chk" value = "0">
  <div class="form-group">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
         <h2 align=center>내 정보 수정하기</h2>
         </div>
     </div>
  <div class="form-group">
  <div class = "col-sm-2"></div>
    <label class="control-label col-sm-2" for="username">아이디 : </label>
    <div class="col-sm-4">

      <input type="text"  class="form-control" name="id" id = "id" value="<?php echo $id; ?>" readonly="readonly" >

    </div>
  </div>

  <div class="form-group">
  <div class = "col-sm-2"></div>
    <label class="control-label col-sm-2" for="password">현재 비밀번호 : </label>
    <div class="col-sm-4">
      <input type="password" class="form-control"  placeholder="현재 비밀번호 입력" name="currentPassword" id = "currentPassword">
    </div>
  </div>

  <div class="form-group">
  <div class = "col-sm-2"></div>
    <label class="control-label col-sm-2" for="password">새 비밀번호 : </label>
    <div class="col-sm-4">
      <input type="password"  class="form-control" placeholder="새 비밀번호 입력"name="newPassword" id = "newPassword">
    </div>
  </div>

  <div class="form-group">
  <div class = "col-sm-2"></div>
    <label class="control-label col-sm-2" for="password">새 비밀번호 확인 : </label>
    <div class="col-sm-4">
      <input type="password"  class="form-control" placeholder="새 비밀번호 확인 입력"name="confirmNewPassword" id = "confirmNewPassword">
    </div>
  </div>

  <div class="form-group">
  <div class = "col-sm-2"></div>
    <label class="control-label col-sm-2" for="password">이메일 : </label>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="이메일 입력" name="email" value="<?php echo $email; ?>">
    </div>
  </div>

  <div class="form-group">
  <div class = "col-sm-2"></div>
    <label class="control-label col-sm-2" for="password">닉네임 : </label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id = "nickname" placeholder="닉네임 입력" name="nickName" value="<?php echo $name; ?>">
    </div>
  </div>
  <?php
  $db = mysqli_connect("127.0.0.1", "root", "123456", "power");
  $sql = "SELECT userimg FROM userinfo WHERE id = '$id'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result);
   ?>
  <div class = "form-group">
  <div class = "col-sm-2"></div>
    <label class = "control-label col-sm-2">개인사진 등록</label>
    <div class = "col-sm-4">
      <input type = "file" class="form-control" name = "input_img" id = "input_img" placeholder = "image">
    </div>
  </div>


  <div class = "form-group">
  <div class = "col-sm-2"></div>
    <label class = "control-label col-sm-2"></label>
    <div class = "col-sm-4">
       <img src = "user_Img/<?php echo $row['userimg'] ?>" id="img" width = "200" height = "200"/>
    </div>
  </div>
  <input type="hidden" name="MAX_FILE_SIZE" value="32768">

    <div class="form-group">
       <div class="col-sm-offset-5 col-sm-10">
          <button type="button" onclick = "updateMyInfoPro()"  class="btn btn-primary">확인</button>
          </a>
         </div>
       </div>
     </form>
     <IFRAME src="" id = "ifrm1" scrolling = no frameborder = no width=0 height=0 name = "ifrm1"></IFRAME>

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
    <script type="text/javascript">

    </script>
</body>

</html>
