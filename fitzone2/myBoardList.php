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
    <link rel="stylesheet" href="css/nice-select.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script type="text/javascript">
      function boardInsert(id){
        if(id == ""){
          var result = confirm("로그인을 하시면 글쓰기를 할 수 있습니다. 로그인 하러 가시겠습니까?");

          if(result){
            location.href = "login.php";
            // var form = document.createElement("form");
            // form.setAttribute("method", "post");
            // form.setAttribute("action", "login.php");
            // document.charset = "UTF-8";
            // var hiddenField = document.createElement("input");
            // hiddenField.setAttribute("type", "hidden");
            // hiddenField.setAttribute("name", "url");
            // var url = window.location.href
            // hiddenField.setAttribute("value", url);
            // form.appendChild(hiddenField);
            // document.body.appendChild(form);
            // form.submit();
            return;
          }else{
            return;
          }
        }
        var form = document.getElementById("boardInsertForm");
        form.submit();
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
                            <!-- <p>단속반이 되기 위해 내가 남긴 글</p> -->
                            <h2>내가 작성한 전체 글</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--게시판 페이징에 따른 번호이다-->
    <?php
    $db = mysqli_connect("127.0.0.1", "root", "123456", "power");

     $nickname = $_SESSION['nickname'];
     // var_dump($nickname);exit;
    $sql_bigmuscle_count = "SELECT * FROM board_bigmuscle7 where writter = '$nickname' ORDER BY no DESC LIMIT 0, 5";
    $sql_diet_count      = "SELECT * FROM board_diet where writter = '$nickname' ORDER BY no DESC LIMIT 0, 5";
    $sql_program_count   = "SELECT * FROM board_program where writter = '$nickname' ORDER BY no DESC LIMIT 0, 5";
    $sql_injury_count    = "SELECT * FROM board_injury where writter = '$nickname' ORDER BY no DESC LIMIT 0, 5";

    $result_bigmuscle_count = mysqli_query($db, $sql_bigmuscle_count);
    $result_diet_count      = mysqli_query($db, $sql_diet_count);
    $result_program_count   = mysqli_query($db, $sql_program_count);
    $result_injury_count    = mysqli_query($db, $sql_injury_count);

    // $row_bigmuscle  = mysqli_fetch_array($result_bigmuscle_count);
    // $row_diet       = mysqli_fetch_array($result_diet_count);
    // $row_program    = mysqli_fetch_array($result_program_count);
    // $row_injury     = mysqli_fetch_array($result_injury_count);
     ?>
    <!---->



    <div class="limiter">
  		<div class="container-table100">
        <div class="container" style = "text-align : center; margin-top : 0px;">
          <h2>빅머슬7</h2>
          <a href="searchBoardList.php?searchType=writter&keyword=<?php echo"$nickname" ?>&pageNo=1"><전체보기></a>
        </div>
  			<div class="wrap-table100">
  				<div class="table100 ver1 m-b-110">
            <div class="table100-head">
  						<table>
  							<thead>
  								<tr class="row100 head">
  									<th class="cell100 column1">번호</th>
  									<th class="cell100 column2">제목</th>
  									<th class="cell100 column3">작성일</th>
  									<th class="cell100 column4">작성자</th>
  									<th class="cell100 column5">조회수</th>
  								</tr>
  							</thead>
  						</table>
  					</div>
            <div class="table100-body js-pscroll">
              <table>
                <tbody>
                  <?php
                    while($row_bigmuscle = mysqli_fetch_array($result_bigmuscle_count)){
                      $tmp = $row_bigmuscle['no'];
                    $sql_registerdate = "SELECT DATE_FORMAT((SELECT registerdate FROM board_bigmuscle7 where no = $tmp), '%Y-%m-%d') DATEONLY";
                    $result_registerdate = mysqli_query($db, $sql_registerdate);
                    $row_registerdate = mysqli_fetch_array($result_registerdate);

                    // 하나의 게시물에 댓글 수를 구하기 위한 쿼리문
                    $sql_reply_count = "SELECT COUNT(*) FROM reply_bigmuscle7 WHERE board_no = $tmp";
                    $result_reply_count = mysqli_query($db, $sql_reply_count);
                    $row_reply_count = mysqli_fetch_array($result_reply_count);
                    $reply_count = $row_reply_count[0];
                    // var_dump($reply_count);exit;

                    //하나의 게시물에 대댓글 수를 구하기 위한 쿼리문
                    $sql_reply = "SELECT no FROM reply_bigmuscle7 WHERE board_no = $tmp";
                    $result_reply  = mysqli_query($db, $sql_reply);
                    $rereply_count = 0;
                    while($row_reply = mysqli_fetch_array($result_reply)){
                      $row_reply_no = $row_reply['no'];
                      // var_dump($row_reply_no);exit;
                      $sql_rereply_count  = "SELECT COUNT(*) FROM rereply_bigmuscle7 WHERE reply_no = $row_reply_no";
                      $result_rereply_count  = mysqli_query($db, $sql_rereply_count);
                      $row_reply_count = mysqli_fetch_array($result_rereply_count);
                      // var_dump($row_reply_count[0]); exit;
                      $rereply_count += $row_reply_count[0];
                    }

                    // 하나의 게시물의 댓글수와 대댓글 수를 합친다.
                    $total_reply_count = $rereply_count + $reply_count;
                    // var_dump($total_reply_count);exit;
                    ?>
                    <tr class="row100 body">
                      <td class="cell100 column1"><?php echo $row_bigmuscle['no'] ?></td>
                      <?php
                      if($total_reply_count == 0 ){
                        //만약 총 댓글수가 0개라면 댓글수를 표시해주지 않는다.

                        //해당 게시물이 어떤 게시판카테고리로부터 왔는지 알려주기 위한 변수를 초기화한다.
                        $category = '';
                        if($row_bigmuscle['category'] == "squart"){
                          $category = "스쿼트";
                        }else if($row_bigmuscle['category'] == "deadlift"){
                          $category = "데드리프트";
                        }else if($row_bigmuscle['category'] == "benchpress"){
                          $category = "벤치프레스";
                        }else if($row_bigmuscle['category'] == "dips"){
                          $category = "딥스";
                        }else if($row_bigmuscle['category'] == "militarypress"){
                          $category = "밀리터리프레스";
                        }else if($row_bigmuscle['category'] == "barbelrow"){
                          $category = "바벨로우";
                        }else{
                          $category = "턱걸이";
                        }
                        ?>
                        <td class="cell100 column2"><a href = 'board.php?no=<?php echo $row_bigmuscle['no'] ?>&bigMuscle7=<?php echo $row_bigmuscle['category'] ?>'>[<?php echo $category ?>]&nbsp;<?php echo $row_bigmuscle['subject']; ?> </a></td>
                        <?php
                      }else{
                        //그게 아니라면 ( = 댓글수가 0개가 아니라면 = 1개 이상이라면 )댓글 수를 표시해준다.
                        ?>
                        <td class="cell100 column2"><a href = 'board.php?no=<?php echo $row_bigmuscle['no'] ?>&bigMuscle7=<?php echo $row_bigmuscle['category'] ?>'>[<?php echo $category ?>]&nbsp;<?php echo $row_bigmuscle['subject']; ?>...[<?php echo $total_reply_count ?>] </a></td>
                        <?php
                      }
                       ?>

                      <td class="cell100 column3"><?php echo $row_registerdate['DATEONLY']  ?></td>
                      <td class="cell100 column4"><?php echo $row_bigmuscle['writter']?></td>
                      <td class="cell100 column5"><?php echo $row_bigmuscle['views'] ?></td>
                    </tr>
                    <?php
                  }
                   ?>
                </tbody>
              </table>
            </div>
          </div>
</div>
</div>
</div>

<div class="limiter" style = "margin-top : 0px;">
  <div class="container-table100">
    <div class="container" style = "text-align : center; margin-top : 0px;">
      <h2>부상</h2>
      <a href="searchBoardList_injury.php?searchType=writter&keyword=<?php echo"$nickname" ?>&pageNo=1"><전체보기></a>
    </div>
    <div class="wrap-table100">
      <div class="table100 ver1 m-b-110">
        <div class="table100-head">
          <table>
            <thead>
              <tr class="row100 head">
                <th class="cell100 column1">번호</th>
                <th class="cell100 column2">제목</th>
                <th class="cell100 column3">작성일</th>
                <th class="cell100 column4">작성자</th>
                <th class="cell100 column5">조회수</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="table100-body js-pscroll">
          <table>
            <tbody>
              <?php
                while($row_injury = mysqli_fetch_array($result_injury_count)){
                  $tmp = $row_injury['no'];
                $sql_registerdate = "SELECT DATE_FORMAT((SELECT registerdate FROM board_injury where no = $tmp), '%Y-%m-%d') DATEONLY";
                $result_registerdate = mysqli_query($db, $sql_registerdate);
                $row_registerdate = mysqli_fetch_array($result_registerdate);

                // 하나의 게시물에 댓글 수를 구하기 위한 쿼리문
                $sql_reply_count = "SELECT COUNT(*) FROM reply_injury WHERE board_no = $tmp";
                $result_reply_count = mysqli_query($db, $sql_reply_count);
                $row_reply_count = mysqli_fetch_array($result_reply_count);
                $reply_count = $row_reply_count[0];
                // var_dump($reply_count);exit;

                //하나의 게시물에 대댓글 수를 구하기 위한 쿼리문
                $sql_reply = "SELECT no FROM reply_injury WHERE board_no = $tmp";
                $result_reply  = mysqli_query($db, $sql_reply);
                $rereply_count = 0;
                while($row_reply = mysqli_fetch_array($result_reply)){
                  $row_reply_no = $row_reply['no'];
                  // var_dump($row_reply_no);exit;
                  $sql_rereply_count  = "SELECT COUNT(*) FROM rereply_injury WHERE reply_no = $row_reply_no";
                  $result_rereply_count  = mysqli_query($db, $sql_rereply_count);
                  $row_reply_count = mysqli_fetch_array($result_rereply_count);
                  // var_dump($row_reply_count[0]); exit;
                  $rereply_count += $row_reply_count[0];
                }

                // 하나의 게시물의 댓글수와 대댓글 수를 합친다.
                $total_reply_count = $rereply_count + $reply_count;
                // var_dump($total_reply_count);exit;
                ?>
                <tr class="row100 body">
                  <td class="cell100 column1"><?php echo $row_injury['no'] ?></td>
                  <?php
                  if($total_reply_count == 0 ){
                    //만약 총 댓글수가 0개라면 댓글수를 표시해주지 않는다.
                    $category = '';
                    if($row_injury['category'] == "neck"){
                      $category = "목&어깨";
                    }else if($row_injury['category'] == "back"){
                      $category = "허리";
                    }else if($row_injury['category'] == "leg"){
                      $category = "무릎&발목";
                    }else{
                      $category = "팔꿈치&손목";
                    }
                    ?>
                    <td class="cell100 column2"><a href = 'board_injury.php?no=<?php echo $row_injury['no'] ?>&injury=<?php echo $row_injury['category'] ?>'>[<?php echo $category ?>]&nbsp;<?php echo $row_injury['subject']; ?> </a></td>
                    <?php
                  }else{
                    //그게 아니라면 ( = 댓글수가 0개가 아니라면 = 1개 이상이라면 )댓글 수를 표시해준다.
                    ?>
                    <td class="cell100 column2"><a href = 'board_injury.php?no=<?php echo $row_injury['no'] ?>&injury=<?php echo $row_injury['category'] ?>'>[<?php echo $category ?>]&nbsp;<?php echo $row_injury['subject']; ?>...[<?php echo $total_reply_count ?>] </a></td>
                    <?php
                  }
                   ?>

                  <td class="cell100 column3"><?php echo $row_registerdate['DATEONLY']  ?></td>
                  <td class="cell100 column4"><?php echo $row_injury['writter']?></td>
                  <td class="cell100 column5"><?php echo $row_injury['views'] ?></td>
                </tr>
                <?php
              }
               ?>
            </tbody>
          </table>
        </div>
      </div>
</div>
</div>
</div>

<div class="limiter" style = "margin-top : 0px;">
  <div class="container-table100">
    <div class="container" style = "text-align : center; margin-top : 0px;">
      <h2>식단</h2>
      <a href="searchBoardList_diet.php?searchType=writter&keyword=<?php echo"$nickname" ?>&pageNo=1"><전체보기></a>
    </div>
    <div class="wrap-table100">
      <div class="table100 ver1 m-b-110">
        <div class="table100-head">
          <table>
            <thead>
              <tr class="row100 head">
                <th class="cell100 column1">번호</th>
                <th class="cell100 column2">제목</th>
                <th class="cell100 column3">작성일</th>
                <th class="cell100 column4">작성자</th>
                <th class="cell100 column5">조회수</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="table100-body js-pscroll">
          <table>
            <tbody>
              <?php
                while($row_diet = mysqli_fetch_array($result_diet_count)){
                  $tmp = $row_diet['no'];
                $sql_registerdate = "SELECT DATE_FORMAT((SELECT registerdate FROM board_diet where no = $tmp), '%Y-%m-%d') DATEONLY";
                $result_registerdate = mysqli_query($db, $sql_registerdate);
                $row_registerdate = mysqli_fetch_array($result_registerdate);

                // 하나의 게시물에 댓글 수를 구하기 위한 쿼리문
                $sql_reply_count = "SELECT COUNT(*) FROM reply_diet WHERE board_no = $tmp";
                $result_reply_count = mysqli_query($db, $sql_reply_count);
                $row_reply_count = mysqli_fetch_array($result_reply_count);
                $reply_count = $row_reply_count[0];
                // var_dump($reply_count);exit;

                //하나의 게시물에 대댓글 수를 구하기 위한 쿼리문
                $sql_reply = "SELECT no FROM reply_diet WHERE board_no = $tmp";
                $result_reply  = mysqli_query($db, $sql_reply);
                $rereply_count = 0;
                while($row_reply = mysqli_fetch_array($result_reply)){
                  $row_reply_no = $row_reply['no'];
                  // var_dump($row_reply_no);exit;
                  $sql_rereply_count  = "SELECT COUNT(*) FROM rereply_diet WHERE reply_no = $row_reply_no";
                  $result_rereply_count  = mysqli_query($db, $sql_rereply_count);
                  $row_reply_count = mysqli_fetch_array($result_rereply_count);
                  // var_dump($row_reply_count[0]); exit;
                  $rereply_count += $row_reply_count[0];
                }

                // 하나의 게시물의 댓글수와 대댓글 수를 합친다.
                $total_reply_count = $rereply_count + $reply_count;
                // var_dump($total_reply_count);exit;
                ?>
                <tr class="row100 body">
                  <td class="cell100 column1"><?php echo $row_diet['no'] ?></td>
                  <?php
                  if($total_reply_count == 0 ){
                    //만약 총 댓글수가 0개라면 댓글수를 표시해주지 않는다.
                    $category = '';
                    if($row_diet['category'] == "carbohydrate"){
                      $category = "탄수화물";
                    }else if($row_diet['category'] == "protain"){
                      $category = "단백질";
                    }else if($row_diet['category'] == "fat"){
                      $category = "지방";
                    }else{
                      $category = "그 외 영양소";
                    }
                    ?>
                    <td class="cell100 column2"><a href = 'board_diet.php?no=<?php echo $row_diet['no'] ?>&diet=<?php echo $row_diet['category'] ?>'>[<?php echo $category ?>]&nbsp;<?php echo $row_diet['subject']; ?> </a></td>
                    <?php
                  }else{
                    //그게 아니라면 ( = 댓글수가 0개가 아니라면 = 1개 이상이라면 )댓글 수를 표시해준다.
                    ?>
                    <td class="cell100 column2"><a href = 'board_diet.php?no=<?php echo $row_diet['no'] ?>&diet=<?php echo $row_diet['category'] ?>'>[<?php echo $category ?>]&nbsp;<?php echo $row_diet['subject']; ?>...[<?php echo $total_reply_count ?>] </a></td>
                    <?php
                  }
                   ?>

                  <td class="cell100 column3"><?php echo $row_registerdate['DATEONLY']  ?></td>
                  <td class="cell100 column4"><?php echo $row_diet['writter']?></td>
                  <td class="cell100 column5"><?php echo $row_diet['views'] ?></td>
                </tr>
                <?php
              }
               ?>
            </tbody>
          </table>
        </div>
      </div>
</div>
</div>
</div>

<div class="limiter" style = "margin-top : 0px;">
  <div class="container-table100">
    <div class="container" style = "text-align : center; margin-top : 0px;">
      <h2>운동 프로그램</h2>
      <a href="searchBoardList_program.php?searchType=writter&keyword=<?php echo"$nickname" ?>&pageNo=1"><전체보기></a>
    </div>
    <div class="wrap-table100">
      <div class="table100 ver1 m-b-110">
        <div class="table100-head">
          <table>
            <thead>
              <tr class="row100 head">
                <th class="cell100 column1">번호</th>
                <th class="cell100 column2">제목</th>
                <th class="cell100 column3">작성일</th>
                <th class="cell100 column4">작성자</th>
                <th class="cell100 column5">조회수</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="table100-body js-pscroll">
          <table>
            <tbody>
              <?php
                while($row_program = mysqli_fetch_array($result_program_count)){
                  $tmp = $row_program['no'];
                $sql_registerdate = "SELECT DATE_FORMAT((SELECT registerdate FROM board_program where no = $tmp), '%Y-%m-%d') DATEONLY";
                $result_registerdate = mysqli_query($db, $sql_registerdate);
                $row_registerdate = mysqli_fetch_array($result_registerdate);

                // 하나의 게시물에 댓글 수를 구하기 위한 쿼리문
                $sql_reply_count = "SELECT COUNT(*) FROM reply_program WHERE board_no = $tmp";
                $result_reply_count = mysqli_query($db, $sql_reply_count);
                $row_reply_count = mysqli_fetch_array($result_reply_count);
                $reply_count = $row_reply_count[0];
                // var_dump($reply_count);exit;

                //하나의 게시물에 대댓글 수를 구하기 위한 쿼리문
                $sql_reply = "SELECT no FROM reply_program WHERE board_no = $tmp";
                $result_reply  = mysqli_query($db, $sql_reply);
                $rereply_count = 0;
                while($row_reply = mysqli_fetch_array($result_reply)){
                  $row_reply_no = $row_reply['no'];
                  // var_dump($row_reply_no);exit;
                  $sql_rereply_count  = "SELECT COUNT(*) FROM rereply_program WHERE reply_no = $row_reply_no";
                  $result_rereply_count  = mysqli_query($db, $sql_rereply_count);
                  $row_reply_count = mysqli_fetch_array($result_rereply_count);
                  // var_dump($row_reply_count[0]); exit;
                  $rereply_count += $row_reply_count[0];
                }

                // 하나의 게시물의 댓글수와 대댓글 수를 합친다.
                $total_reply_count = $rereply_count + $reply_count;
                // var_dump($total_reply_count);exit;
                ?>
                <tr class="row100 body">
                  <td class="cell100 column1"><?php echo $row_program['no'] ?></td>
                  <?php
                  if($total_reply_count == 0 ){
                    //만약 총 댓글수가 0개라면 댓글수를 표시해주지 않는다.
                    $category = '';
                    if($row_program['category'] == "300"){
                      $category = "For 3대 ~300";
                    }else if($row_program['category'] == "400"){
                      $category = "For 3대 400";
                    }else if($row_program['category'] == "500"){
                      $category = "For 3대 500";
                    }else if($row_program['category'] == "600"){
                      $category = "For 3대 600";
                    }
                    ?>
                    <td class="cell100 column2"><a href = 'board_program.php?no=<?php echo $row_program['no'] ?>&bigMuscle7=<?php echo $row_program['category'] ?>'>[<?php echo $category ?>]&nbsp;<?php echo $row_program['subject']; ?> </a></td>
                    <?php
                  }else{
                    //그게 아니라면 ( = 댓글수가 0개가 아니라면 = 1개 이상이라면 )댓글 수를 표시해준다.
                    ?>
                    <td class="cell100 column2"><a href = 'board_program.php?no=<?php echo $row_program['no'] ?>&bigMuscle7=<?php echo $row_program['category'] ?>'>[<?php echo $category ?>]&nbsp;<?php echo $row_program['subject']; ?>...[<?php echo $total_reply_count ?>] </a></td>
                    <?php
                  }
                   ?>

                  <td class="cell100 column3"><?php echo $row_registerdate['DATEONLY']  ?></td>
                  <td class="cell100 column4"><?php echo $row_program['writter']?></td>
                  <td class="cell100 column5"><?php echo $row_program['views'] ?></td>
                </tr>
                <?php
              }
               ?>
            </tbody>
          </table>
        </div>
      </div>
</div>
</div>
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
