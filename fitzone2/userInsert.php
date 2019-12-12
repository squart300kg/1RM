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

  <!-- 회원가입 중복검사를 위한 jQuery -->
  <script type="text/javascript" src = "https://code.jquery.com/jquery-3.2.1.js"></script>
  <!-- 회원가입 이미지 미리보기를 위한 jQuery -->
  <!-- <script type="text/javascript" src = "https://code.jquery.com/jquery-3.1.0.min.js"></script> -->

  <script>
    function chid(){
      document.getElementById("id2").value = 0;
      var id = document.getElementById("id").value;

      if(id == ""){
        alert("아이디 입력창이 공백입니다!");
        console.log("빈칸 안되요!");
        return;
      }
      console.log("빈칸이 아닐 때");
      ifrm1.location.href="userInsert_dup_chk.php?id="+id;
    }

    function userInsertPro(){
      var is_dup_check = document.getElementById("id2").value;
      console.log("is_dup_check : " + is_dup_check);

      if(is_dup_check == 0){
        alert("중복확인을 진행해 주세요");
        return;
      }else{
        var form = document.userInsertForm;

        form.submit();
        console.log("회원가입 성공");
      }
    }

    function idChange(){
      document.getElementById("id2").value = 0;
    }
    </script>
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
                              <h2>3대 600 단속반을 위한 첫걸음</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::게시판이다::-->
    <div class = "container">
  	<form class="form-horizontal" action = "userInsertPro.php" name = "userInsertForm" method = "post" enctype="multipart/form-data">
  	<div class = "form-group">
  		<div class = "col-sm-3"></div>
  		<div class = "col-sm-6">
  			<h2 align = "center">회원가입</h2>
  		</div>
  	</div>
  	<div class = "form-group">
  	<div class = "col-sm-2"></div>
  		<label class = "control-label col-sm-2">아이디</label>
  		<div class = "col-sm-4">
  			<input type = "text" class="form-control" id="id" name="id" maxlength="20"  onchange = "idChange()" placeholder="ID" >

  		</div>
      <button type="button" value = "중복검사" onclick = "chid()" class = "btn btn-default">중복검사</button>
      <input type="hidden" id = "id2" name="id2" value="0">
    </div>
  	<div class = "form-group">
  	<div class = "col-sm-2"></div>
  		<label class = "control-label col-sm-2">비밀번호</label>
  		<div class = "col-sm-4">
  			<input type = "password" class="form-control" id="password" name="password" maxlength="20" placeholder="Password">
  			<form:errors path = "password"/>
  		</div>
  	</div>
  	<div class = "form-group">
  	<div class = "col-sm-2"></div>
  		<label class = "control-label col-sm-2">비밀번호 확인</label>
  		<div class = "col-sm-4">
  			<input type = "password" class="form-control" name = "confirmPassword"id = "confirmPassword" maxlength="20" placeholder="confirmPassword">
  			<form:errors path = "confirmPassword"/>
  		</div>
  	</div>
  	<div class = "form-group">
  	<div class = "col-sm-2"></div>
  		<label class = "control-label col-sm-2">닉네임</label>
  		<div class = "col-sm-4">
  			<input type = "text" class="form-control" name = "nickName" id = "nickName" placeholder = "nickName">
  			<form:errors path = "name"/>
  		</div>
  	</div>
  	<div class = "form-group">
  	<div class = "col-sm-2"></div>
  		<label class = "control-label col-sm-2">이메일</label>
  		<div class = "col-sm-4">
  			<input type = "email" class="form-control" name = "email" id = "email" placeholder = "email">
  			<form:errors path = "email"/>
  		</div>
  	</div>
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
  			 <img id="img" width = "200" height = "200"/>
  		</div>
  	</div>


    <input type="hidden" name="registerDate" value="<?php echo date("Y-m-d") ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="32768">

  	<div class = "form-group">
  	<div class = "col-sm-2"></div>
  		<div class = "col-sm-offset-5 col-sm-10">
  			<button type = "button" onclick = "userInsertPro()" class="btn btn-primary">회원 가입</button>
  			<button type = "reset" class="btn btn-danger">다시 작성</button>
  		</div>
  	</div>
  	</form>
    <IFRAME src="" id = "ifrm1" scrolling = no frameborder = no width=0 height=0 name = "ifrm1"></IFRAME>
  </div>

    <!--:::::::::::sibscribe part end:::::::::::::-->

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
