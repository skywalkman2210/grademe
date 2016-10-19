<!DOCTYPE HTML>
<!--<?php
	SESSION_START();
	
	include("inc/database.class.php");
	$dbOb = new Database("grademe");
	
	$res = $dbOb->getUserId('gsantella', 1);
?>-->
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Minimaxing by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">
			
			<!-- Include header -->
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

							<header id="header">
								<h1><a href="#" id="logo">GradeMe v1</a></h1>
								<nav id="nav">
									<!-- links to template pages...
									<a href="twocolumn2.php">Two Column #2</a>
									<a href="onecolumn.php">One Column</a>
									<a href="threecolumn.html">Three Column</a>
									-->
								
									<!-- Keep for later, maybe use php to echo it?  class="current-page-item"-->
									<a href="index.php">Homepage</a>
									<!--<?php
										if(isset($_SESSION['username'])) {
											if ($_SESSION['isTeach'] == 0) {
												echo "<a href='grade'>My Grades</a>";
											}
											else {
												echo "<a href='course'>My Courses</a>
													  <a href='course/students.php'>My Students</a>";
											}
										}
										
										if(isset($_SESSION['username'])) {
											echo "
												<a href='account'>My Account</a>
												<a href='user/logout.php'>Sign Out</a>
											";
										}
										else {
											echo "
												<a href='user/signup.php'>Sign Up</a>
												<a href='user/login.php'>Login</a>
											";
										}
									?>-->
								</nav>
							</header>

						</div>
					</div>
				</div>
			</div>
			
			<div id="banner-wrapper">
				<div class="container">

					<div id="banner">
						<h2>
							<!--<?php if(isset($_SESSION['username'])) { echo "Welcome back " . $_SESSION['first_name']; } 
									else { echo "Welcome to GradeMe!"; } 
									?>-->
						</h2>
						<span>A smarter way to keep your grades, and students, in track.</span>
					</div>

				</div>
			</div>
			
			<div class="row">
				<div class="12u">

					<div id="copyright">
						&copy;2016 H&amp;K Programming. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
					</div>

				</div>
			</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
