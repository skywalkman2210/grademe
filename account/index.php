<?php
	include("../inc/database.class.php");
	$dbOb = new Database("grademe");
	
	$firstPass = true;

	if (isset($_REQUEST['newPass'])) {
		$oldPass = $_REQUEST['oldPass'];
		$newPass = $_REQUEST['newPass'];
		
		$isSuccessful = $dbOb->changePassword($username, $oldPass, $newPass);
		$firstPass = false;
	}
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
									<a href="../">Homepage</a>
									
									<?php
										if(isset($_SESSION['username'])) {
											echo "
												<a href='logout.php'>Sign Out</a>
											";
										}
										else {
											echo "
												<a href='signup.php'>Sign Up</a>
												<a href='login.php'>Login</a>
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
								<h2>Change Password.</h2>
							
								<form method="post">
									Current Password<br/>
									<input type="password" name="oldPass" /><br/><br/>
									
									New Password<br/>
									<input type="password" name="newPass" /><br/><br/>
									
									Confirm New Password<br/>
									<input type="password" name="newPassConfirm" /><br/><br/>
									
									<?php if(!$firstPass) {if(!$isSuccessful) { echo "Password is Incorrect!<br/><br/>"; } else { echo "Password changed successfully." }} ?>
									
									<input type="submit" value="Login"/>
								</form>
							</section>
						</div>
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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>	