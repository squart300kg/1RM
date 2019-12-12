<!DOCTYPE HTML>
<!--
	HeavyIndustry by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>HeavyIndustry by TEMPLATED</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</head>
	<body class="right-sidebar">
		<!-- Header -->
		<div id="header-wrapper">

			<div class="container">
				<div id="header">
					<div id="logo">
						<h1><a href="main.php">3대 600 단속반</a></h1>
						<span>For Your Life</span>
					</div>
					<nav id="nav">
						<ul>
							<li><a href="main.php">Home</a></li>
							<li class="current_page_item"><a href="bigMuscle7.php">빅머슬 7</a>
							<li><a href="injury.php">부상과 싸워라</a></li>
							<li><a href="eat.php">먹어라</a></li>
						</ul>
					</nav>
				</div>
			</div>

		</div>
		<!-- Page Wrapper -->
		<div   class="container">
			<div id = "page" class="row" >
				<div id="content" class="10u skel-cell-important">
					<div class="500grid">
						<div class="row">


			<?php
			$title = $_GET["title"];

			if($title == "squart"){
				?>
				<table class = "table table-bordered" >
					<tr>
						<td>번호</td>
						<td>제목</td>
						<td>글쓴이</td>
						<td>날짜</td>
						<td>조회수</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=1">스쿼트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=2">스쿼트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=3">스쿼트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=4">스쿼트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=5">스쿼트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
				</table>
				<?php

			}else if($title == "deadlift"){
				?>
				<table class = "table table-bordered" >
					<tr>
						<td>번호</td>
						<td>제목</td>
						<td>글쓴이</td>
						<td>날짜</td>
						<td>조회수</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=deadlift&no=1">데드리프트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=deadlift&no=2">데드리프트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=deadlift&no=3">데드리프트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=deadlift&no=4">데드리프트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=deadlift&no=5">데드리프트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
				</table>
				<?php

			}else if($title == "benchpress"){
				?>
				<table class = "table table-bordered" >
					<tr>
						<td>번호</td>
						<td>제목</td>
						<td>글쓴이</td>
						<td>날짜</td>
						<td>조회수</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=1">벤치프레스를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=2">벤치프레스를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=3">벤치프레스를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=4">벤치프레스를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=5">벤치프레스를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
				</table>
				<?php

			}else if($title == "pullup"){
				?>
				<table class = "table table-bordered" >
					<tr>
						<td>번호</td>
						<td>제목</td>
						<td>글쓴이</td>
						<td>날짜</td>
						<td>조회수</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=1">풀업을 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=2">풀업을 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=3">풀업을 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=4">풀업을 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=5">풀업을 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
				</table>
				<?php

			}else if($title == "milp"){
				?>
				<table class = "table table-bordered" >
					<tr>
						<td>번호</td>
						<td>제목</td>
						<td>글쓴이</td>
						<td>날짜</td>
						<td>조회수</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=1">밀리터리프레스 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=2">밀리터리프레스를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=3">밀리터리프레스를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=4">밀리터리프레스를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=5">밀리터리프레스를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
				</table>
				<?php

			}else if($title == "barbelrow"){
				?>
				<table class = "table table-bordered" >
					<tr>
						<td>번호</td>
						<td>제목</td>
						<td>글쓴이</td>
						<td>날짜</td>
						<td>조회수</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=1">바벨로우를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=2">바벨로우를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=3">바벨로우를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=4">바벨로우를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=5">바벨로우를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
				</table>
				<?php

			}else if($title == "dips"){

				?>
				<table class = "table table-bordered" >
					<tr>
						<td>번호</td>
						<td>제목</td>
						<td>글쓴이</td>
						<td>날짜</td>
						<td>조회수</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=1">스쿼트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=2">스쿼트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=3">스쿼트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=4">스쿼트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
					<tr>
						<td>0</td>
						<td><a href="board.php?title=squart&no=5">스쿼트를 잘하려면 어떻게 하나요?</a></td>
						<td>Junior</td>
						<td>2019.08.08</td>
						<td>8</td>
					</tr>
				</table>
				<?php

			}
			 ?>
		 </div>
		 </div>
		 </div>
			 	</div>
		</div>
		<!-- Copyright -->
		<div id="copyright">
			<div class="container">
				Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
			</div>
		</div>

</body>
</html>
