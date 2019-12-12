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
    <script type = "text/javascript" src = "./ckeditor_4.12.1_standard/ckeditor/ckeditor.js"></script>

    <!--게시판 board를 위한 부트스트랩이다-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript"> //<![CDATA[
    function LoadPage() {
      // CKEDITOR.replace('contents');
    }
    function FormSubmit(f) {
      CKEDITOR.instances.contents.updateElement();
      if(f.subject.value == ""){
        alert("제목을 입력해 주세요");
        return false;
      }
      if(f.contents.value == "") {
        alert("내용을 입력해 주세요.");
        return false;
      }
      // alert(f.contents.value); // 전송은 하지 않습니다.
      return true;
    }
      //]]>
      CKEDITOR.on('dialogDefinition', function (ev) {
            var dialogName = ev.data.name;
            var dialog = ev.data.definition.dialog;
            var dialogDefinition = ev.data.definition;
            if (dialogName == 'image') {
                dialog.on('show', function (obj) {
                    this.selectPage('Upload'); //업로드텝으로 시작
                });
                dialogDefinition.removeContents('advanced'); // 자세히탭 제거
                dialogDefinition.removeContents('Link'); // 링크탭 제거
            }
        });
    </script>

</head>

<body onload="LoadPage();">
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
                            <p>단속반이 되기 위한 프로그램</p>
                            <?php
                            $program = $_POST["program"];
                             ?>
                            <h2><?php echo "$program"; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::게시판 하나 보여주기::-->
    <?php
    $db = mysqli_connect("127.0.0.1", "root", "123456", "power");
    $sql = "SELECT * FROM userinfo WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    $nickname = $row['nickname'];

     ?>

<form action = boardInsertPro_program.php method = "POST" enctype="multipart/form-data" onsubmit="return FormSubmit(this);">
<!-- <form action = boardInsertPro.php onsubmit="return FormSubmit(this);"> -->
    <div class = "container">
    <div class = "container">
    <div class = "box-body">
			<div class="form-group">
				<h3>제 목</h3>
        <input class="form-control" name="subject" id="subject" type="text" placeholder='Enter Subject' maxlength = "40">
			</div>
		</div>

		<div class="box-body">
			<div class="form-group">
				<h3>글 내용</h3>
        <textarea class="form-control w-100 ckeditor" name="contents" id="contents" cols="30" rows="9"
          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
          placeholder='Enter Message'></textarea>
			</div>
		</div>
		<div class="box-body">
			<div class="form-group">
				<h3>글쓴이</h3>
        <input class="form-control" name="writter" id="writter" value = "<?php echo $nickname ?>" type="text"  placeholder='Enter Writter' readonly>
        <input type="hidden" name="program" value="<?php echo $program ?>">
			</div>
		</div>
    	<button type="submit" class="button button-contactForm btn_2" style="float : right">확인</button>
  </div>
</div>
</form>
<?php
// $root = $_SERVER['HTTP_HOST'];
// $hello = "/hello";
// var_dump($root . $hello);

 ?>

    <!--::게시판 하나 보여주기::-->

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
