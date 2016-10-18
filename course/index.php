<!DOCTYPE HTML>
<?php
	SESSION_START();
	
	include("../inc/database.class.php");
	$dbOb = new Database("grademe");
	
	$result = $dbOb->getCourses($_SESSION['username']);
?>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
									<a href="#">My Courses</a>
									<a href="students.php">My Students</a>
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
								<h2>Your courses</h2>
								<p>
									<table id="gradesTable">
										<tr>
											<th class="courseRow">Course</th>
											<th class="studentCountRow">Amount of students in course</th>
										</tr>
										<!-- begin Foreach -->
										<?php if ($result != "") {foreach ($result as $course): ?>
										<tr>
											<td><a href="details.php?code=<?= $course['code'] ?>"><?= $course['name']; ?></a></td>
											<td><?php echo $dbOb->getCourseCount($course['code']); ?></td>
										</tr>
										<?php endforeach; } ?>
										<tr>
											<td><a href="createnewcourse.php">Create a new course</a></td>
											<td></td>
										</tr>
									</table>
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