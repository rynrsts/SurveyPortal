<!-- <?php include('connection.php'); ?>-->

<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>

	<!-- Navigation -->
	<div class="header">
		<div class="nav">
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
		</div>
	</div>	

	<!-- Login -->
	<div class="container">
		<form method="post" action="Login.php">
			<div class="tablelogin">
				<h1 align="center">Admin Login</h1>
				<div class="labelup">Username:
					<input class="usernp" id="username" maxlength="15" name="username" type="text" required>
				</div>
				</tr>
				<tr>
					<td class="labelup">Password:</td>
				</tr>
				<tr>
					<td><input class="usernp" id="password" maxlength="15" name="password" size="40px" type="password" required></td>
				</tr>
				<tr>
					<td><input id="btnlogin" name="btnlogin" onclick="login()" type="submit" value="LOG IN"></td>
				</tr>
			</div>
		</form>
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
	
	<script src="js/function.js"></script>

</body>

</html>

<!-- PHP -->

<?php
	if (isset($_POST['btnlogin'])) {
		require('connection.php');

		$user = $_POST['username'];
		$pass = $_POST['password'];

		$sqlGet = "SELECT username, password FROM tbl_accounts";
		$result = mysqli_query($link, $sqlGet);

		while ($row = mysqli_fetch_array($result)) {			
			if ($user == $row['username'] && $pass == $row['password']) {
				echo "<script>alert('Welcome!')</script>";
				echo "<script>window.location.assign('admin.php')</script>";
			}
			else {
				echo "<script>alert('Incorrect username and/or password.')</script>";
			}
		}
	}
?>