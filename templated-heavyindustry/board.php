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
		<div id="wrapper" class="container">
			<?php
			$title = $_GET["title"];
			$no = $_GET["no"];
			echo "$title 게시판의 $no 번째 게시물 입니다.";
			 ?>


		</div>
		<!-- Copyright -->
		<div id="copyright">
			<div class="container">
				Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
			</div>
		</div>

</body>
</html>
