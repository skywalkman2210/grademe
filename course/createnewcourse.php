<?php
	SESSION_START();
	include ("../inc/database.class.php");
	include ("../user/user.class.php");
	
	$courseCreated = false;
	$hasRanOnce = false;
	
	if (isset($_SESSION['isTeach'])) {
		if ($_SESSION['isTeach'] == 1) {
			if(isset($_REQUEST['ccode'])) {
				$dbOb = new Database("grademe");
				
				$code = $_REQUEST['ccode'];
				$name = $_REQUEST['cname'];
				$term = $_REQUEST['term'];
				
				$teachId = $dbOb->getUserId($_SESSION['username'], $_SESSION['isTeach']);
				
				$data = array($code, $name, $term, $teachId);
				$courseCreated = $dbOb->createCourse($data);
				$hasRanOnce = true;
			}
		}
		else {
			echo "You do not have permission to view this!";
		}
	}
	else {
		echo "Invalid Call";
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>One Column - Minimaxing by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		
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
									<!-- Keep for later, maybe use php to echo it?  class="current-page-item"-->
									<a href="../">Homepage</a>
									<a href="../course">My Courses</a>
									<a href="../twocolumn2.php">Two Column #2</a>
									<a href="../onecolumn.php">One Column</a>
									<!--<a href="threecolumn.html">Three Column</a>-->
									
									<?php
										if(isset($_SESSION['username'])) {
											echo "
												<a href='../user/logout.php'>Sign Out</a>
											";
										}
										else {
											echo "
												<a href='../user/signup.php'>Sign Up</a>
												<a href='../user/login.php'>Login</a>
											";
										}
									?>
								</nav>
							</header>

						</div>
					</div>
				</div>
			</div>
			
			<div id="main">
				<div class="container">
					<div class="row main-row">
						<div class="12u">

							<section>
								<?php 
									if ($hasRanOnce) {
										if ($courseCreated) {
											echo "<h3>Course Created Successfully!</h3>";
											header("Location: ./");
										}
										else {
											echo"<h3>Course already exists!</h3>";
										}
									}
								?>
							
								<h2>Create a New Course</h2>
								<p>
									<form method="post">
										Please enter the Course Code:<br/>
										<input type="text" name="ccode" /><br/><br/>
										
										Please enter the name of the Course:<br/>
										<input type="text" name="cname" /><br/><br/>
										
										Please enter the term (yyyy-yyyy):<br/>
										<input type="text" name="term" /><br/><br/>
										
										<input type="submit" value="Create New Course" />
									</form>
								</p>
							</section>

						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="12u">

					<div id="copyright">
						&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
					</div>

				</div>
			</div>
		</div>
		
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
			

	</body>
</html>