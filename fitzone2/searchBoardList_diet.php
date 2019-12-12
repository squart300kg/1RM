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
                            <p>단속반의 식단</p>
                            <?php
                            $diet = $_GET["diet"];
                             ?>
                            <h2><?php echo "$diet"; ?></h2>
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
    if(isset($_GET['pageNo'])){
      //만약 게시판 페이지 번호가 get방식으로 넘어온다면
      $pageNo = $_GET['pageNo'];
      $searchType = $_GET['searchType'];
      $keyword = $_GET['keyword'];
      $diet = $_GET['diet'];
      $pageNo_tmp = $pageNo*5 - 5;
    }

    if($searchType == "subject"){
      $sql = "SELECT * FROM board_diet WHERE category = '$diet' AND subject LIKE '%$keyword%' ORDER BY no DESC LIMIT $pageNo_tmp, 5";
      $sql_page_count = "SELECT COUNT(*) FROM board_diet WHERE category = '$diet' AND subject LIKE '%$keyword%' ORDER BY no DESC";
    }else if($searchType == "contents"){
      // var_dump($diet);
      // var_dump($keyword);
      // exit;
      $sql = "SELECT * FROM board_diet WHERE category = '$diet' AND contents LIKE '%$keyword%' ORDER BY no DESC LIMIT $pageNo_tmp, 5";
      $sql_page_count = "SELECT COUNT(*) FROM board_diet WHERE category = '$diet' AND contents LIKE '%$keyword%' ORDER BY no DESC";
    }else if($searchType == "writter"){
      $sql = "SELECT * FROM board_diet WHERE category = '$diet' AND writter = '$keyword' ORDER BY no DESC LIMIT $pageNo_tmp, 5";
      $sql_page_count = "SELECT COUNT(*) FROM board_diet WHERE category = '$diet' AND writter = '$keyword' ORDER BY no DESC";
    }else{
      //아무것도 아닌것이 넘어
    }

    //마이페이지로부터 해당 페이지에 오면 diet변수가 없다. 따라서 이에 대한 처리를 해준다.
    if(empty($diet) && $searchType == "writter"){
      //만약 bigMuscle변수가 없다면 다른 쿼리문을 정의해준다.
      $sql = "SELECT * FROM board_diet WHERE writter = '$keyword' ORDER BY no DESC LIMIT $pageNo_tmp, 5";
      $sql_page_count = "SELECT COUNT(*) FROM board_diet WHERE writter = '$keyword' ORDER BY no DESC LIMIT $pageNo_tmp, 5";
    }
    //GET방식으로 받아온 특정 빅머슬 카테고리, 특정 페이지 번호인 게시물 튜플들을 가져온다.
    // $sql = "SELECT * FROM board_diet WHERE category = '$diet' ORDER BY no DESC LIMIT $pageNo_tmp, 5";
    $result = mysqli_query($db, $sql);
     ?>
    <!---->

    <!--::게시판리스트::-->
    <div class="limiter">
  		<div class="container-table100">
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
                    while($row = mysqli_fetch_array($result)){
                      $tmp = $row['no'];
                    $sql_registerdate = "SELECT DATE_FORMAT((SELECT registerdate FROM board_diet where no = $tmp), '%Y-%m-%d') DATEONLY";
                    $result_registerdate = mysqli_query($db, $sql_registerdate);
                    $row_registerdate = mysqli_fetch_array($result_registerdate);

                    // 하나의 게시물에 댓글 수를 구하기 위한 쿼리문
                    $sql_reply_count = "SELECT COUNT(*) FROM reply_diet WHERE board_no = $tmp";
                    $result_reply_count = mysqli_query($db, $sql_reply_count);
                    $row_reply_count = mysqli_fetch_array($result_reply_count);
                    $reply_count = $row_reply_count[0];

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
                      <td class="cell100 column1"><?php echo $row['no'] ?></td>
                      <?php
                      if($total_reply_count == 0 ){
                        //만약 총 댓글수가 0개라면 댓글수를 표시해주지 않는다.

                        $category = '';
                        if($row['category'] == "carbohydrate"){
                          $category = "탄수화물";
                        }else if($row['category'] == "protain"){
                          $category = "단백질";
                        }else if($row['category'] == "fat"){
                          $category = "지방";
                        }else{
                          $category = "그 외 영양소";
                        }
                        ?>
                        <td class="cell100 column2"><a href = 'board_diet.php?no=<?php echo $row['no'] ?>&diet=<?php echo $row['category'] ?>'>[<?php echo $category ?>]&nbsp;<?php echo $row['subject']; ?> </a></td>
                        <?php
                      }else{
                        //그게 아니라면 ( = 댓글수가 0개가 아니라면 = 1개 이상이라면 )댓글 수를 표시해준다.
                        ?>
                        <td class="cell100 column2"><a href = 'board_diet.php?no=<?php echo $row['no'] ?>&diet=<?php echo $row['category'] ?>'>[<?php echo $category ?>]&nbsp;<?php echo $row['subject']; ?>...[<?php echo $total_reply_count ?>] </a></td>
                        <?php
                      }
                       ?>
                      <td class="cell100 column3"><?php echo $row_registerdate['DATEONLY']  ?></td>
                      <td class="cell100 column4"><?php echo $row['writter']?></td>
                      <td class="cell100 column5"><?php echo $row['views'] ?></td>
                    </tr>
                    <?php
                  }
                   ?>
                </tbody>
              </table>
            </div>
          </div>

  <!-- <a href = "boardInsert.php" class="button button-contactForm btn_2" style = "float : right">글쓰기</a> -->
  <form action="boardInsert_diet.php" method="post" style = "float : right">
    <input type="hidden" name="diet" value="<?php echo "$diet" ?>">
    <button type="submit" class="button button-contactForm btn_2" >글쓰기</button>
  </form>
  <!--게시판 번호-->

  <div class="box-footer">
  	<div class="text-center">
  		<ul class="pagination">
        <?php
        if($pageNo == 1){
          //만약 현재 회원이 있는 페이지가 1번이라면 <이전>버튼을 없앤다.

        }else{
          //그게 아니라면 (= 현재 회원이 있는 페이지가 1번이 아니라면) 버튼을 없애지 않는다.
          ?>
          <li><a href="searchBoardList_diet.php?diet=<?php echo"$diet"; ?>&pageNo=<?php echo$pageNo-1; ?>&searchType=<?php echo"$searchType" ?>&keyword=<?php echo"$keyword" ?>">이전</a></li>
          <?php
        }
         ?>
  				<li >
          <?php
          $one_page_count = 5;
          //$sql_page_count = "SELECT COUNT(*) FROM board_diet WHERE category = '$diet'";
          if(empty($bigMuscle) && $searchType == "writter"){
            $nickname = $_GET['keyword'];
              $sql_page_count = "SELECT COUNT(*) FROM board_diet WHERE writter = '$nickname'";
          }
          $result_page_count = mysqli_query($db, $sql_page_count);
          $row_page_count = mysqli_fetch_array($result_page_count);
          $total_page_count = $row_page_count[0];

          //게시판의 전체 블럭 변수를 초기화한다.
          $totalBlock = floor($total_page_count / $one_page_count / $one_page_count) + ($total_page_count % ($one_page_count * $one_page_count) == 0 ? 0 : 1);

          //내가 현재 게시판 어디 블럭에 있는지 알기위해 현재 블럭 변수를 초기화한다.
          $nowBlock = floor($pageNo / $one_page_count) + 1;
          if($pageNo % $one_page_count == 0){
            $nowBlock -= 1;
          }
          //게시판 리스트 하단에 있는 시작변수이다.
          $startPageNo = 5 * $nowBlock - 4;

          //게시판 리스트 하단에 있는 끝 변수를 초기화한다.
          $endPageNo = $nowBlock * $one_page_count;
          $pageNum = ceil($total_page_count / $one_page_count);//전체 페이지 수
          if($pageNum <= $endPageNo){
            $endPageNo = $pageNum;
          }

                for($i = $startPageNo ; $i <= $endPageNo ; $i ++){
                // for($i = $startPageNo ; $i <= $total_page_count/$one_page_count + ($total_page_count%$one_page_count == 0 ? 0 : 1) ; $i ++){
                  if($pageNo == $i){
                    //만약 현재 페이지 번호와 내가 있는 페이지 번호가 같다면
                    ?>
                    <a style = "background : #4371B3; color : white;" href="searchBoardList_diet.php?diet=<?php echo"$diet"; ?>&pageNo=<?php echo"$i"; ?>&searchType=<?php echo"$searchType" ?>&keyword=<?php echo"$keyword" ?>"><?php echo "$i"; ?></a>
                    <?php
                  }else{
                    ?>
                    <a href="searchBoardList_diet.php?diet=<?php echo"$diet"; ?>&pageNo=<?php echo"$i"; ?>&searchType=<?php echo"$searchType" ?>&keyword=<?php echo"$keyword" ?>"><?php echo "$i"; ?></a>
                    <?php
                  }
                }
          ?>
  				</li>
          <?php

          if($totalBlock == $nowBlock && $pageNo == $endPageNo){
            //만약 회원이 현재 있는 페이지가 게시물의 마지막 블럭의 마지막 페이지라면 <다음>버튼을 없앤다.
          }else{
            //그게 아니라면 (= 회원이 현재 있는 페이지가 게시물의 마지막 블럭에 있지 않다 + 회원이 현재 있는 페이지가 게시물의 마지막 페이지에 있지 않다. )
            ?>
            <li> <a href="searchBoardList_diet.php?diet=<?php echo"$diet"; ?>&pageNo=<?php echo$pageNo+1; ?>&searchType=<?php echo"$searchType" ?>&keyword=<?php echo"$keyword" ?>">다음</a></li>
            <?php
          }
           ?>
  		</ul>
  	</div>
  </div>

  <!--게시판 번호-->
  <form action="searchboardList_diet.php" method="get">
    <div class="box-footer">
  	<div class="form-group col-sm-2">
  		<select class="form-control" name="searchType" id="searchType">
  			<option value="n" >:::::: 선택 ::::::</option>
  			<option value="subject" > 제목 </option>
  			<option value="contents" > 내용 </option>
  			<option value="writter" > 작성자 </option>
  		</select>
  	</div>
  	<div class="form-group col-sm-10">
  		<div class="input-group">
  			<input type="text" class="form-control" name="keyword" id="keywordInput" value="" placeholder="검색어">
        <input type="hidden" name="pageNo" value="1">
        <input type="hidden" name="diet" value="<?php echo $diet ?>">
        <span class="input-group-btn">
  				<button type="submit" class="btn btn-primary btn-flat" id="searchBtn">
  					<i class="fa fa-search"></i> 검색
  				</button>
  			</span>

  		</div>
  	</div>
  	</div>
  </form>


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
