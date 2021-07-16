<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us</title>
	<link rel="stylesheet" type="text/css" href="css/frontend.css">
	<link rel="stylesheet" type="text/css" href="css/about_us.css">
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

	<!-- Two Cards -->
	<div class="main">
		<ul class="cards">
			<li class="cards_item">
				<div class="card">
					<div class="card_content_1">
						<img class="pic_logo" src="pictures/SurveyPortal Logo.png">
					</div>
				</div>
			</li>
			<li class="cards_item">
				<div class="card">
					<div class="card_content_2">

						<?php
							require('connection.php');

							$sqlView = "SELECT about FROM tbl_about WHERE id = 1";
							$result= mysqli_query($link, $sqlView);

							while ($row = mysqli_fetch_array($result)) {
								echo $row['about'];
							}
						?>
						<br><br>
						<?php
							require('connection.php');

							$sqlView = "SELECT about FROM tbl_about WHERE id = 2";
							$result= mysqli_query($link, $sqlView);

							while ($row = mysqli_fetch_array($result)) {
								echo $row['about'];
							}
						?>

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