<?php
$db = mysqli_connect("127.0.0.1", "root", "123456", "power");

$sql_squart = "SELECT * FROM board_bigmuscle7 WHERE category = 'squart' ORDER BY no DESC LIMIT 0, 5";
$sql_deadlift = "SELECT * FROM board_bigmuscle7 WHERE category = 'deadlift' ORDER BY no DESC LIMIT 0, 5";
$sql_benchpress = "SELECT * FROM board_bigmuscle7 WHERE category = 'benchpress' ORDER BY no DESC LIMIT 0, 5";
$sql_pullup = "SELECT * FROM board_bigmuscle7 WHERE category = 'pullpu' ORDER BY no DESC LIMIT 0, 5";
$sql_barbelrow = "SELECT * FROM board_bigmuscle7 WHERE category = 'barbelrow' ORDER BY no DESC LIMIT 0, 5";
$sql_milp = "SELECT * FROM board_bigmuscle7 WHERE category = 'militarypress' ORDER BY no DESC LIMIT 0, 5";
$sql_dips = "SELECT * FROM board_bigmuscle7 WHERE category = 'dips' ORDER BY no DESC LIMIT 0, 5";

$sql_neck = "SELECT * FROM board_injury WHERE category = 'neck' ORDER BY no DESC LIMIT 0, 5";
$sql_wrist = "SELECT * FROM board_injury WHERE category = 'wrist' ORDER BY no DESC LIMIT 0, 5";
$sql_back = "SELECT * FROM board_injury WHERE category = 'back' ORDER BY no DESC LIMIT 0, 5";
$sql_leg = "SELECT * FROM board_injury WHERE category = 'leg' ORDER BY no DESC LIMIT 0, 5";

$sql_cal = "SELECT * FROM board_diet WHERE category = 'carbohydrate' ORDER BY no DESC LIMIT 0, 5";
$sql_pro = "SELECT * FROM board_diet WHERE category = 'protain' ORDER BY no DESC LIMIT 0, 5";
$sql_fat = "SELECT * FROM board_diet WHERE category = 'fat' ORDER BY no DESC LIMIT 0, 5";
$sql_else = "SELECT * FROM board_diet WHERE category = 'else' ORDER BY no DESC LIMIT 0, 5";

$sql_300 = "SELECT * FROM board_program WHERE category = '300' ORDER BY no DESC LIMIT 0, 5";
$sql_400 = "SELECT * FROM board_program WHERE category = '400' ORDER BY no DESC LIMIT 0, 5";
$sql_500 = "SELECT * FROM board_program WHERE category = '500' ORDER BY no DESC LIMIT 0, 5";
$sql_600 = "SELECT * FROM board_program WHERE category = '600' ORDER BY no DESC LIMIT 0, 5";

$result_squart = mysqli_query($db, $sql_squart);
$result_deadlift = mysqli_query($db, $sql_deadlift);
$result_benchpress = mysqli_query($db, $sql_benchpress);
$result_pullup = mysqli_query($db, $sql_pullup);
$result_barbelrow = mysqli_query($db, $sql_barbelrow);
$result_dips = mysqli_query($db, $sql_dips);
$result_milp = mysqli_query($db, $sql_milp);

$result_neck = mysqli_query($db, $sql_neck);
$result_wrist = mysqli_query($db, $sql_wrist);
$result_back = mysqli_query($db, $sql_back);
$result_leg = mysqli_query($db, $sql_leg);

$result_cal = mysqli_query($db, $sql_cal);
$result_pro = mysqli_query($db, $sql_pro);
$result_fat = mysqli_query($db, $sql_fat);
$result_else = mysqli_query($db, $sql_else);

$result_300 = mysqli_query($db, $sql_300);
$result_400 = mysqli_query($db, $sql_400);
$result_500 = mysqli_query($db, $sql_500);
$result_600 = mysqli_query($db, $sql_600);

 ?>





<div class="container">
  <div class="row">

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">빅머슬7 <스쿼트>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList.php?pageNo=1&bigMuscle7=squart"><strong>더보기</strong></a>
        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_squart)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=squart"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=squart"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice1 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board1/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">운동 게시판</div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">빅머슬7 <데드리프트>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList.php?pageNo=1&bigMuscle7=deadlift"><strong>더보기</strong></a>

        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_deadlift)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice2 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board2/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">운동 게시판</div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">빅머슬7 <벤치프레스>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList.php?pageNo=1&bigMuscle7=benchpress"><strong>더보기</strong></a>

        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_benchpress)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice3 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board3/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">운동 게시판</div>
      </div>
    </div>

  </div>
</div><br>

<div class="container">
  <div class="row">

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">빅머슬7 <턱걸이>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList.php?pageNo=1&bigMuscle7=pullpu"><strong>더보기</strong></a>
        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_pullup)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice1 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board1/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">운동 게시판</div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">빅머슬7 <딥스>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList.php?pageNo=1&bigMuscle7=dips"><strong>더보기</strong></a>

        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_dips)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice2 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board2/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">운동 게시판</div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">빅머슬7 <밀리터리프레스>&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList.php?pageNo=1&bigMuscle7=milp"><strong>더보기</strong></a>

        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_milp)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice3 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board3/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">운동 게시판</div>
      </div>
    </div>

  </div>
</div><br>

<div class="container">
  <div class="row">

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">빅머슬7 <바벨로우>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList.php?pageNo=1&bigMuscle7=barbelrow"><strong>더보기</strong></a>
        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_barbelrow)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board.php?no=<?php echo"$no" ?>&bigMuscle7=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice1 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board1/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">운동 게시판</div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">부상 <목&어꺠>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_injury.php?pageNo=1&injury=neck"><strong>더보기</strong></a>

        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_neck)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_injury.php?no=<?php echo"$no" ?>&injury=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_injury.php?no=<?php echo"$no" ?>&injury=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice2 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board2/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">부상 게시판</div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">부상 <팔꿈치&손목>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_injury.php?pageNo=1&injury=wrist"><strong>더보기</strong></a>

        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_wrist)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_injury.php?no=<?php echo"$no" ?>&injury=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_injury.php?no=<?php echo"$no" ?>&injury=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice3 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board3/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">부상 게시판</div>
      </div>
    </div>

  </div>
</div><br>

<div class="container">
  <div class="row">

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">부상 <허리>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_injury.php?pageNo=1&injury=back"><strong>더보기</strong></a>
        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_back)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_injury.php?no=<?php echo"$no" ?>&injury=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_injury.php?no=<?php echo"$no" ?>&injury=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice1 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board1/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">부상 게시판</div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">부상 <무릎&발목>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_injury.php?pageNo=1&injury=leg"><strong>더보기</strong></a>

        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_leg)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_injury.php?no=<?php echo"$no" ?>&injury=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_injury.php?no=<?php echo"$no" ?>&injury=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice2 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board2/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">부상 게시판</div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">식단 <탄수화물>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_diet.php?pageNo=1&diet=carbohydrate"><strong>더보기</strong></a>

        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_cal)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_diet.php?no=<?php echo"$no" ?>&diet=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_diet.php?no=<?php echo"$no" ?>&diet=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice3 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board3/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">식단 게시판</div>
      </div>
    </div>

  </div>
</div><br>

<div class="container">
  <div class="row">

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">식단 <단백질>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_diet.php?pageNo=1&category=protain"><strong>더보기</strong></a>
        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_pro)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_diet.php?no=<?php echo"$no" ?>&diet=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_diet.php?no=<?php echo"$no" ?>&diet=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice1 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board1/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">식단 게시판</div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">식단 <지방>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_diet.php?pageNo=1&diet=fat"><strong>더보기</strong></a>

        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_fat)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_diet.php?no=<?php echo"$no" ?>&diet=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_diet.php?no=<?php echo"$no" ?>&diet=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice2 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board2/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">식단 게시판</div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">식단 <그 외 영양소>
        								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_diet.php?pageNo=1&diet=else"><strong>더보기</strong></a>

        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_else)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_diet.php?no=<?php echo"$no" ?>&diet=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_diet.php?no=<?php echo"$no" ?>&diet=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice3 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board3/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">식단 게시판</div>
      </div>
    </div>

  </div>
</div><br>



<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">운동프로그램 <.For 3대 ~300>
        								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_program.php?pageNo=1&program=300"><strong>더보기</strong></a>
        </div>
        <div class="panel-body"><!-- 게시판 링크 <a link> -->
          <?php
          while($row_squart = mysqli_fetch_array($result_300)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_program.php?no=<?php echo"$no" ?>&program=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_program.php?no=<?php echo"$no" ?>&program=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice4 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board4/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">프로그램 게시판</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">운동프로그램 <.For 3대 400>
        								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_program.php?pageNo=1&program=400"><strong>더보기</strong></a>
        </div>
        <div class="panel-body"><!-- 게시판 링크 <a link> -->
          <?php
          while($row_squart = mysqli_fetch_array($result_400)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_program.php?no=<?php echo"$no" ?>&program=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_program.php?no=<?php echo"$no" ?>&program=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice5 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board5/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">프로그램 게시판</div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">운동프로그램 <.For 3대 500>
        								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_program.php?pageNo=1&program=500"><strong>더보기</strong></a>
        </div>
        <div class="panel-body"><!-- 게시판 링크 <a link> -->
          <?php
          while($row_squart = mysqli_fetch_array($result_500)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_program.php?no=<?php echo"$no" ?>&program=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_program.php?no=<?php echo"$no" ?>&program=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice6 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board6/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">프로그램 게시판</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">
  <div class="row">

    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">운동프로그램 <.For 3대 600>
        								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        									<a style = "color:white" href = "boardList_program.php?pageNo=1&program=600"><strong>더보기</strong></a>
        </div>
        <div class="panel-body">
          <?php
          while($row_squart = mysqli_fetch_array($result_600)){
            $tmp = $row_squart['no'];
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

            $subject = $row_squart['subject'];
            $no = $row_squart['no'];
            $category = $row_squart['category'];

            if($total_reply_count == 0){
              ?>
              <li>
                <a href = "board_program.php?no=<?php echo"$no" ?>&program=<?php echo"$category" ?>"><?php echo"$subject" ?></a>
              </li><hr>
              <?php
            }else{
              ?>
              <li>
                <a href = "board_program.php?no=<?php echo"$no" ?>&program=<?php echo"$category" ?>"><?php echo"$subject" ?>...[<?php echo $total_reply_count ?>]</a>
              </li><hr>
              <?php
            }
            ?>
            <?php
          }
           ?>
        	<!-- <c:forEach var = "bservice" items = "${bservice1 }" varStatus = "status" end = "4">
        		<li>
        			<a href = "<%=request.getContextPath() %>/board1/read?num=${bservice.num }">${status.index + 1 } : ${ bservice.subject}</a>
        		</li><hr>
        	</c:forEach> -->
        </div>
        <div class="panel-footer">프로그램 게시판</div>
      </div>
    </div>
  </div>
</div><br>
