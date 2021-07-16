<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SurveyPortal</title>
	<link rel="stylesheet" type="text/css" href="css/frontend.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body>

	<!-- Navigation -->
	<div class="header">
		<div class="nav">
			<input type="checkbox" id="nav-check">
			<div class="nav-header">
				<div class="nav-title">
					<a href="index.php"><img class="logo" src="pictures/SurveyPortal Logo.png"></a>
				</div>
			</div>
			<div class="nav-btn">
				<label for="nav-check">
					<span></span>
					<span></span>
					<span></span>
				</label>
			</div>
			<div class="nav-links">
				<a href="index.php">Home</a>
				<a href="survey.php">Survey</a>
				<a href="about_us.php">About Us</a>
				<a href="contact_us.php">Contact Us</a>
			</div>
		</div>
	</div>

	<!-- Headline -->
	<div class="headline">
		<h1>Welcome to SurveyPortal</h1>
		<p>This is a simple, easy and short online survey.</p>
		<div class="headline-btn">
			<a href="survey.php">Take Survey Now</a>
		</div>
	</div>

	<!-- Two Cards -->
	<div class="main">
		<ul class="cards">
			<li class="cards_item">
				<div class="card">
					<div class="card_content_1">
						<h2 class="card_title">

							<!-- PHP -->

							<?php
								require('connection.php');

								$sqlView = "SELECT home FROM tbl_home WHERE id = 1";
								$result= mysqli_query($link, $sqlView);

								while ($row = mysqli_fetch_array($result)) {
									echo $row['home'];
								}
							?>

						</h2>
					</div>
				</div>
			</li>
			<li class="cards_item">
				<div class="card">
					<div class="card_content_2">
						<p class="card_text">
							
							<?php
								require('connection.php');

								$sqlView = "SELECT home FROM tbl_home WHERE id = 2";
								$result= mysqli_query($link, $sqlView);

								while ($row = mysqli_fetch_array($result)) {
									echo $row['home'];
								}
							?>

						</p>
					</div>
				</div>
			</li>
		</ul>
	</div>

	<!-- Footer -->
	<div class="footer-section">
		<hr>
		<div class="copyright-area">
			<div class="copyright-text">
				<p>Copyright &copy; 2018</p>
			</div>
		</div>
	</div>

</body>

</html>