<!DOCTYPE HTML>
<?php
	SESSION_START();
	
	include("../inc/database.class.php");
	
	$dbOb = new Database("grademe");
	$courses = $dbOb->getStudentCourses($_SESSION['username']);
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
									<a href="#">My Grades</a>
									
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
								<h2>Your Grades</h2>
								<p>
									<table id="gradesTable">
										<tr>
											<th class="courseRow">Course</th>
											<th class="instructorRow">Instructor</th>
											<th class="gradeRow">Grade</th>
										</tr>
										
										<?php if ($courses != "") {foreach($courses as $course): ?>
											<tr>
												<td><?= $course['name']; ?></td>
												<td><?= $course['instructor']; ?></td>
												<td></td>
											</tr>
										<?php endforeach; } ?>
									</table>
								</p>
								<p>
									Don't see a course? Then add a code <a href="addCode.php">here</a>.
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