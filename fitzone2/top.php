<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="main.php"><img src="img/1RM.png" width = "150dp" Height = "90dp" alt="">   </a>
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
                                    <a class="dropdown-item" href="boardList_injury.php?injury=neck&pageNo=1">목&어깨</a>
                                    <a class="dropdown-item" href="boardList_injury.php?injury=wrist&pageNo=1">팔꿈치&손목</a>
                                    <a class="dropdown-item" href="boardList_injury.php?injury=back&pageNo=1">허리</a>
                                    <a class="dropdown-item" href="boardList_injury.php?injury=leg&pageNo=1">무릎&발목</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    식단
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="boardList_diet.php?diet=carbohydrate&pageNo=1">탄수화물</a>
                                    <a class="dropdown-item" href="boardList_diet.php?diet=protain&pageNo=1">단백질</a>
                                    <a class="dropdown-item" href="boardList_diet.php?diet=fat&pageNo=1">지방</a>
                                    <a class="dropdown-item" href="boardList_diet.php?diet=else&pageNo=1">그 외 영양소</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    운동 프로그램
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="boardList_program.php?program=300&pageNo=1">For. 3대 ~300</a>
                                    <a class="dropdown-item" href="boardList_program.php?program=400&pageNo=1">For. 3대 400</a>
                                    <a class="dropdown-item" href="boardList_program.php?program=500&pageNo=1">For. 3대 500</a>
                                    <a class="dropdown-item" href="boardList_program.php?program=600&pageNo=1">For. 3대 600이상</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="menu_btn">
                      <?php
                      session_start();//세션을 시작한다.

                      //만약 쿠키가 있다면 세션에 회원의 아이디와 비밀번호를 할당해준다.
                      if(isset($_COOKIE['id']) && isset($_COOKIE['password'])){
                        include 'decrypt.php';
                        $_SESSION['id'] = $decrypted_id;
                        $_SESSION['nickname'] = $decrypted_nickname;

                      }


                      $sid = session_id();
                      $id = $_SESSION['id'];//로그인한 회원의 세션을 변수에 담아온다.
                          if(isset($id)){//회원이 로그인을 완료하거나 회원가입을 완료한다면!
                            ?>
                              <!-- 회원의 아이디를 포스트 방식으로 MYPAGE에 넘겨준다. -->
                              <form action="mypage.php" method="post">
                                <button type = "submit" class="btn_2 d-none d-sm-block"><?php echo "$id 님, \n안녕하세요!" ?></button>
                              </form>
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
