<!DOCTYPE HTML>
<?php
	SESSION_START();
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
								<h2>Create a user with us.</h2>
								<p>
									<form action="create.php" method="post">
										Please enter your First Name.<br/>
										<input type="text" name="first" required/><br/><br/>
										
										Please enter your Last Name.<br/>
										<input type="text" name="last" required/><br/><br/>
										
										Please enter what you would like your Username to be.<br/>
										<input type="text" name="username" required/><br/><br/>
										
										Please enter what you would like your Password to be.<br/>
										<input type="password" name="password" required/><br/><br/>
										
										Please confirm your password.<br/>
										<input type="password" name="confPassword" required/><br/><br/>
										
										Please enter your email address.<br/>
										<input type="text" name="email" required/><br/><br/>
										
										I am a:<br/>
										<input type="radio" name="teach" value="0" required/>Student<br/>
										<input type="radio" name="teach" value="1" required/>Teacher<br/><br/>
										
										Gender (optional):<br/>
										<input type="radio" name="gender" value="M"/>Male<br/>
										<input type="radio" name="gender" value="F"/>Female<br/>
										<input type="radio" name="gender" value="U"/>Unspecified<br/><br/>
										
										
										<input type="submit" value="Join Us" />
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
						&copy;2016 H&amp;K Programming. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
					</div>

				</div>
			</div>
		</div>

		<!-- Scripts -->
			<!-- put your custom scripts in grademe/script/ -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>