<?php
	SESSION_START();
	include("../inc/database.class.php");
	
	$courseCode = $_REQUEST['code'];
	
	$dbOb = new Database("grademe");
	$sql = "SELECT CONCAT(first_name, ' ', last_name) AS 'student'
			FROM course, student_takes_course
			JOIN student
			ON student.id = student_takes_course.student_id
			WHERE course.code = student_takes_course.course_code AND course.code = '$courseCode';"; 
			
	$result = $dbOb->query($sql);
	
	$courseName = $dbOb->getCourseName($courseCode);
?>

<!DOCTYPE HTML>
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
									<a href="./">My Courses</a>
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
								<h2><?= $courseName ?></h2>
								<p>
									<table id="enrolledTable">
										<tr>
											<th class="studentRow">Student</th>
											<th class="studentGradeRow">Grade</th>
										</tr>
										<!-- begin Foreach -->
										<?php if ($result != "") {foreach ($result as $course): ?>
										<tr>
											<td><?= $course['student'] ?></td>
											<td></td>
										</tr>
										<?php endforeach; } ?>
										<tr>
											<td><a href="createnewcourse.php">Add another Student to Course</a></td>
											<td></td>
										</tr>
									</table>
								</p>
							</section>

						</div>
					</div>
				</div>
			</div>
			<div id="footer-wrapper">
				<div class="container">
					<div class="row">
						<div class="8u 12u(mobile)">

							<section>
								<h2>How about a truckload of links?</h2>
								<div>
									<div class="row">
										<div class="3u 12u(mobile)">
											<ul class="link-list">
												<li><a href="#">Sed neque nisi consequat</a></li>
												<li><a href="#">Dapibus sed mattis blandit</a></li>
												<li><a href="#">Quis accumsan lorem</a></li>
												<li><a href="#">Suspendisse varius ipsum</a></li>
												<li><a href="#">Eget et amet consequat</a></li>
											</ul>
										</div>
										<div class="3u 12u(mobile)">
											<ul class="link-list">
												<li><a href="#">Quis accumsan lorem</a></li>
												<li><a href="#">Sed neque nisi consequat</a></li>
												<li><a href="#">Eget et amet consequat</a></li>
												<li><a href="#">Dapibus sed mattis blandit</a></li>
												<li><a href="#">Vitae magna sed dolore</a></li>
											</ul>
										</div>
										<div class="3u 12u(mobile)">
											<ul class="link-list">
												<li><a href="#">Sed neque nisi consequat</a></li>
												<li><a href="#">Dapibus sed mattis blandit</a></li>
												<li><a href="#">Quis accumsan lorem</a></li>
												<li><a href="#">Suspendisse varius ipsum</a></li>
												<li><a href="#">Eget et amet consequat</a></li>
											</ul>
										</div>
										<div class="3u 12u(mobile)">
											<ul class="link-list">
												<li><a href="#">Quis accumsan lorem</a></li>
												<li><a href="#">Sed neque nisi consequat</a></li>
												<li><a href="#">Eget et amet consequat</a></li>
												<li><a href="#">Dapibus sed mattis blandit</a></li>
												<li><a href="#">Vitae magna sed dolore</a></li>
											</ul>
										</div>
									</div>
								</div>
							</section>

						</div>
						<div class="4u 12u(mobile)">

							<section>
								<h2>Something of interest</h2>
								<p>Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed.
								Suspendisse eu varius nibh. Suspendisse vitae magna eget odio amet
								mollis justo facilisis quis. Sed sagittis mauris amet tellus gravida
								lorem ipsum dolor sit amet consequat blandit.</p>
								<footer class="controls">
									<a href="#" class="button">Oh, please continue ....</a>
								</footer>
							</section>

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