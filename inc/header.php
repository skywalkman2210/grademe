<div id="header-wrapper">
	<div class="container">
		<div class="row">
			<div class="12u">

				<header id="header">
					<h1><a href="#" id="logo">GradeMe v1</a></h1>
					<nav id="nav">
						<!-- Keep for later, maybe use php to echo it?  class="current-page-item"-->
						<a href="index.php">Homepage</a>
						<a href="/grade">My Grades</a>
						<a href="twocolumn2.php">Two Column #2</a>
						<a href="onecolumn.php">One Column</a>
						<!--<a href="threecolumn.html">Three Column</a>-->
						
						<?php
							if(isset($_SESSION['username'])) {
								echo "
									<a href='user/logout.php'>Sign Out</a>
								";
							}
							else {
								echo "
									<a href='user/signup.php'>Sign Up</a>
									<a href='user/login.php'>Login</a>
								";
							}
						?>
					</nav>
				</header>

			</div>
		</div>
	</div>
</div>