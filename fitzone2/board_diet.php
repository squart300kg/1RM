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

    <!--게시판 board를 위한 부트스트랩이다-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type = "text/javascript" src = "./ckeditor_4.12.1_standard/ckeditor/ckeditor.js"></script>
  <script type="text/javascript"> //<![CDATA[
    function LoadPage() {
      CKEDITOR.replace('contents');
    }
    // function FormSubmit(f) {
    //   CKEDITOR.instances.contents.updateElement();
    //   if(f.subject.value = ""){
    //     alert("제목을 입력해 주세요");
    //     return false;
    //   }
    //   if(f.contents.value == "") {
    //     alert("내용을 입력해 주세요.");
    //     return false;
    //   }
    //   alert(f.contents.value); // 전송은 하지 않습니다.
    //   return false;
    // }
      //]]>
    </script>

  <script type="text/javascript">
    function deleteBoardPro(){
      var deleteBoardProForm = document.deleteBoardProForm;

        var result = confirm("정말 게시글을 삭제하시겠습니까?");

        if(result){
          deleteBoardProForm.submit();
        }else{

        }

    }
    function deleteReplyPro(reply_no){
      name = "deleteReplyProForm_"+reply_no;
      var form = document.getElementById(name);
        var result = confirm("정말 댓글을 삭제하시겠습니까?");

        if(result){
          form.submit();
        }else{

        }

    }
    function deleteReReplyPro(rereply_no){
      name = "deleteReReplyProForm_"+rereply_no;
      var form = document.getElementById(name);
      var result = confirm("정말 대댓글을 삭제하시겠습니까?");

      if(result){
        form.submit();
      }else{

      }

    }
    function insertReReply(reply_no, id){
      if(id == ""){
        var result = confirm("로그인을 하시면 글을 작성하실 수 있습니다. 로그인하러 가시겠습니까?");

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

        }else{
          return;
        }
      }else{
        var name = "insertReReplyForm_"+reply_no;

        if(document.getElementById(name).style.display == "none"){
          document.getElementById(name).style.display = "block";
        }else{
          document.getElementById(name).style.display = "none";
        }
      }

    }

    function is_login(id){
      // alert(window.location.href);

      if(id == ""){

        var result = confirm("로그인을 하시면 글을 작성하실 수 있습니다. 로그인하러 가시겠습니까?");

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


        }else{
          return;
        }
      }
    }
  </script>
</head>

<body>
<!-- <body> -->
    <!--::header part start::-->
  <?php include 'top.php'; ?>
    </header>
    <!-- Header part end-->


    <!-- breadcrumb start-->
   <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <p>후회없는 선택이 될 것이다</p>
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

    <!--::게시판 하나 보여주기::-->
    <?php
        $diet = $_GET["diet"];
        $no = $_GET["no"];


        $db = mysqli_connect("127.0.0.1", "root", "123456", "power");
        $sql = "SELECT * FROM board_diet WHERE category = '$diet' AND no = $no";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);

        $sql_views_up = "UPDATE board_diet SET views = views + 1 WHERE no = $no";
        $result_views_up = mysqli_query($db, $sql_views_up);

     ?>


<div class = "container">
  <div class = "container">
    <form action="updateBoard_diet.php" method="post">
      <div class = "box-body">
  			<div class="form-group">
  				<h3>제 목</h3>
  				<input type="text" name="subject" class="form-control"
  					value="<?php echo $row['subject'] ?>" readonly="readonly">
  			</div>
  		</div>

  		<div class="box-body">
  			<div class="form-group">
  				<h3>글 내용</h3>
  				<textarea class="form-control ckeditor" id = "contents" name="contents" rows="20"
  					readonly="readonly"><?php echo $row['contents']; ?></textarea>
  			</div>
  		</div>
  		<div class="box-body">
  			<div class="form-group">
  				<h3>글쓴이</h3>
  				<input type="text" name="writter" class="form-control"
  					value="<?php echo $row['writter'] ?>" readonly="readonly">
  			</div>
  		</div>
      <div class="box-body">
  			<div class="form-group">
  				<h3>작성일시</h3>
  				<input type="text" name="writter" class="form-control"
  					value="<?php echo $row['registerdate'] ?>" readonly="readonly">
  			</div>
  		</div>


      <input type="hidden" name="diet" value="<?php echo $diet ?>">
      <input type="hidden" name="no" value="<?php echo $no ?>">

      <?php
      $nickname_session = $_SESSION['nickname'];
      $nickname_db      = $row['writter'];
      if($nickname_db == $nickname_session){
        ?>
        <button type="submit" class="button button-contactForm btn_2" style = "float : right">수정</button>
        </form>
        <form action="deleteBoardPro_diet.php" method="post" id = "deleteBoardProForm" name = "deleteBoardProForm">
        <input type="hidden" id = "diet" name="diet" value="<?php echo $diet ?>">
        <input type="hidden" id = "no" name="no" value="<?php echo $no ?>">
        <button type="button" onclick = "deleteBoardPro()" class="button button-contactForm btn_2" style = "float : right">삭제</button>
        </form>
        <?php
      }
       ?>
       </form>
  </div>
</div>
    <!--::게시판 하나 보여주기::-->

<!-- 댓글창 -->
<div class = "container">
  <div class="comment-form">
    <form class="form-contact comment_form" method = "POST" action="insertReplyPro_diet.php" id="commentForm">
      <div class="row">
        <div class="col-12">
           <div class="form-group">
              <textarea class="form-control w-100" name="replyContents" onclick = "is_login('<?php echo "$id" ?>')" id="replyContents" cols="30" rows="9"
                 placeholder="Write Comment"></textarea>
              <input type="hidden" name="diet" value="<?php echo $diet ?>">
              <input type="hidden" name="no" value="<?php echo $no ?>">
              <input type="hidden" name="writter" value="<?php echo $nickname_session ?>">
              <button type="submit" class="button button-contactForm btn_2" style = "float : right">댓글달기</button>
           </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- 댓글창 -->


<!-- 댓글리스트들 -->
<?php
$db = mysqli_connect("127.0.0.1", "root", "123456", "power");
$sql_reply = "SELECT * FROM reply_diet WHERE board_no = $no AND board_category = '$diet'";
$result_reply = mysqli_query($db, $sql_reply);
 ?>
   <div class="container">
      <div class="row">
         <div class="col-lg-8 posts-list">
          <div class="comments-area">
            <?php
            $sql_reply_count = "SELECT COUNT(*) FROM reply_diet WHERE board_no = $no AND board_category = '$diet'";
            $result_reply_count = mysqli_query($db, $sql_reply_count);
            $reply_count =  mysqli_fetch_array($result_reply_count);
             ?>
             <h4><?php echo $reply_count[0] ?> Comments</h4>
             <?php
                $row_reply_no = 0;
                while($row_reply = mysqli_fetch_array($result_reply)){
                  $row_reply_no = $row_reply_no + 1;
              ?>
             <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                   <div class="user justify-content-between d-flex">
                      <div class="thumb">
                        <!-- 댓글창에 사용자 이미지를 표시해주기 위한 php문 -->
                        <?php
                        $nickname = $row_reply['nickname'];
                        $sql_images = "SELECT userimg FROM userinfo WHERE nickname = '$nickname'";
                        $result_images = mysqli_query($db, $sql_images);
                        $row_images = mysqli_fetch_array($result_images);
                        if(isset($row_images)){//사용자가 자신의 이미지를 설정했다면
                          ?>
                          <img src="user_Img/<?php echo $row_images['userimg'] ?>" alt="">
                          <?php
                        }else{//사용자가 자신의 이미지를 설정하지 않았다면
                          ?>
                          <img src="img/1RM-black.png" alt="">
                          <?php
                        }
                         ?>

                      </div>
                      <div class="desc">
                         <p class="comment">
                            <?php echo $row_reply['contents'] ?>
                         </p>
                         <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                               <h5>
                                  <a href="#"><?php echo $row_reply['nickname'] ?></a>
                               </h5>
                               <p class="date"><?php echo $row_reply['registerdate'] ?></p>
                            </div>
                            <div class="reply-btn">
                              <!-- <form action="insertReReply.php" method="post"> -->
                                <button type="button" onclick = "insertReReply('<?php echo "$row_reply_no" ?>', '<?php echo $id ?>')" class="btn-reply text-uppercase">댓글달기</button>
                              <!-- </form> -->
                            </div>

                            <?php
                            $nickname_db = $row_reply['nickname'];
                            if($nickname_db == $nickname_session){
                              ?>
                              <div class="reply-btn">
                                <form action="deleteReplyPro_diet.php" method="post" id = "deleteReplyProForm_<?php echo "$row_reply_no" ?>" name = "deleteReplyProForm_<?php echo "$row_reply_no" ?>">
                                  <input type="hidden" id = "reply_no" name="reply_no" value="<?php echo $row_reply['no'] ?>">
                                  <input type="hidden" id = "board_category" name="board_category" value="<?php echo $diet ?>">
                                  <input type="hidden" id = "board_no" name="board_no" value="<?php echo $no ?>">
                                  <button type = "button" onclick = "deleteReplyPro('<?php echo "$row_reply_no" ?>')" class="btn-reply text-uppercase">삭제</button>
                                </form>
                              </div>
                              <div class="reply-btn">
                                <form action="updateReply_diet.php" method="post">
                                  <input type="hidden" name="reply_no" value="<?php echo $row_reply['no'] ?>">
                                  <input type="hidden" name="board_category" value="<?php echo $diet ?>">
                                  <input type="hidden" name="board_no" value="<?php echo $no ?>">
                                  <button type = "submit" class="btn-reply text-uppercase">수정</button>
                                </form>
                              </div>
                              <?php
                            }
                             ?>
                         </div>
                      </div>
                   </div>
                </div>
                <form action="insertReReplyPro_diet.php" style = "display : none; margin-top : 30px" id = "insertReReplyForm_<?php echo "$row_reply_no" ?>" method="post">
                  <textarea class="form-control w-100" name="contents" id="contents" cols="30" rows="9"
                     placeholder="Write Comment"></textarea>
                     <input type="hidden" name="board_no" value="<?php echo $no ?>">
                     <input type="hidden" name="diet" value="<?php echo $diet ?>">
                     <input type="hidden" name="reply_no" value="<?php echo $row_reply['no'] ?>">
                     <input type="hidden" name="writter" value="<?php echo $nickname_session ?>">
                     <button type="submit" class="btn_2 d-none d-sm-block" style = "float : right">확인</button>
                </form>
             </div>


             <?php
             $reply_no  = $row_reply['no'];
             $sql_rereply = "SELECT * FROM rereply_diet WHERE reply_no = $reply_no";
             $result_rereply = mysqli_query($db, $sql_rereply);
             $row_rereply_no = 0;
             while($row_rereply = mysqli_fetch_array($result_rereply)){
               $row_rereply_no = $row_rereply_no + 1;
              ?>
             <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                   <div class="user justify-content-between d-flex">
                      <div class="thumb">
                         <img src="img/re.png" alt="">
                         <!-- 회원의 사진여부를 검사해서 사진이 없다면 기본사진으로 설정한다 사진이 있다면 불러온다. -->
                         <?php
                         $nickname_rereply = $row_rereply['nickname'];
                         $sql_rereply_img = "SELECT userimg FROM userinfo WHERE nickname = '$nickname_rereply'";
                         $result_rereply_img = mysqli_query($db, $sql_rereply_img);
                         $row_rereply_img = mysqli_fetch_array($result_rereply_img);
                          ?>
                         <img src="user_Img/<?php echo $row_rereply_img['userimg'] ?>" alt="">
                      </div>
                      <div class="desc">
                         <p class="comment">
                            <?php echo $row_rereply['contents'] ?>
                         </p>
                         <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                               <h5>
                                  <a href="#"><?php echo $row_rereply['nickname'] ?></a>
                               </h5>
                               <p class="date"><?php echo $row_rereply['registerdate'] ?></p>
                            </div>

                            <?php
                            $nickname_db = $row_rereply['nickname'];
                            if($nickname_db == $nickname_session){
                              ?>
                              <div class="reply-btn">
                                <form action="deleteReReplyPro_diet.php" method="post" name = "deleteReReplyProForm_<?php echo "$row_rereply_no" ?>" id = "deleteReReplyProForm_<?php echo "$row_rereply_no" ?>">
                                  <input type="hidden" id = "board_category" name="board_category" value="<?php echo $diet ?>">
                                  <input type="hidden" id = "board_no" name="board_no" value="<?php echo $no ?>">
                                  <input type="hidden" id = "rereply_no" name="rereply_no" value="<?php echo $row_rereply['no'] ?>">
                                  <button type = "button" onclick = "deleteReReplyPro('<?php echo "$row_rereply_no" ?>')" class="btn-reply text-uppercase">삭제</button>
                                </form>
                              </div>
                              <div class="reply-btn">
                                <form action="updateReReply_diet.php" method="post">
                                  <input type="hidden" name="rereply_no" value="<?php echo $row_rereply['no'] ?>">
                                  <input type="hidden" name="board_category" value="<?php echo $diet ?>">
                                  <input type="hidden" name="board_no" value="<?php echo $no ?>">
                                  <button type = "submit" class="btn-reply text-uppercase">수정</button>
                                </form>
                              </div>
                              <?php
                            }

                             ?>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <?php
}
           }
              ?>
          </div>
        </div>
      </div>
    </div>


 <!-- 댓글리스트들 -->

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
