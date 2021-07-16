<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Admin</title>

	<!-- Bootstrap core CSS-->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Page level plugin CSS-->
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/backend.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<a class="navbar-brand" href="admin.php"><img class="logo" src="pictures/SurveyPortal Logo.png"></a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="admin.php">
						<i class="fa fa-fw fa"></i>
						<span class="nav-link-text">Dashboard</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Survey Topics">
					<a class="nav-link" href="survey_topics.php">
						<i class="fa fa-fw fa"></i>
						<span class="nav-link-text">Survey Topics</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Survey Records">
					<a class="nav-link" href="survey_records.php">
						<i class="fa fa-fw fa"></i>
						<span class="nav-link-text">Survey Records</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
					<a class="nav-link" href="messages.php">
						<i class="fa fa-fw fa"></i>
						<span class="nav-link-text">Messages</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Accounts">
					<a class="nav-link" href="accounts.php">
						<i class="fa fa-fw fa"></i>
						<span class="nav-link-text">Accounts</span>
					</a>
				</li>
			</ul>
			 <ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-fw fa-sign-out"></i>Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="content-wrapper">
		<div class="container-fluid">

			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Dashboard</li>
			</ol>

			<!-- Icon Cards-->      
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i></div>
					<div class="table-responsive">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
									<td align="center"><b>Survey Topics</b></td>
									<td align="center"><b>Messages</b></td>
									<td align="center"><b>Accounts</b></td>
								</tr>
							</thead>
						</table>
					</div>
				</div>

				<div class="table-responsive">
					<form method="post" action="admin.php">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<tr>
								<td align="center" colspan="3"><b>HOME</b></td>
							</tr>

							<!-- PHP -->

							<?php
								require('connection.php');

								$sqlEdit1 = "SELECT * FROM tbl_home WHERE id = 1";
								$results1 = mysqli_query($link, $sqlEdit1);

								$sqlEdit2 = "SELECT * FROM tbl_home WHERE id = 2";
								$results2 = mysqli_query($link, $sqlEdit2);

								while ($rows1 = mysqli_fetch_array($results1)) {
									echo "
											<tr>
												<td><textarea class=homeedit name=fhome>" . $rows1['home'] . "</textarea></td>
									";
								}

								while ($rows2 = mysqli_fetch_array($results2)) {
									echo "
												<td><textarea class=homeedit name=shome>" . $rows2['home'] . "</textarea></td>
											</tr>
									";
								}
							?>

							<tr>
								<td align="right" colspan="3">
									<input class="button" name="btnupdate1" type="submit" value="Update">
								</td>
							<tr>
						</table>
					</form>
				</div>

				<div class="table-responsive">
					<form method="post" action="admin.php">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<tr>
								<td align="center" colspan="3"><b>ABOUT US</b></td>
							</tr>

							<!-- PHP -->

							<?php
								require('connection.php');

								$sqlEdit1 = "SELECT * FROM tbl_about WHERE id = 1";
								$results1 = mysqli_query($link, $sqlEdit1);

								$sqlEdit2 = "SELECT * FROM tbl_about WHERE id = 2";
								$results2 = mysqli_query($link, $sqlEdit2);

								while ($rows1 = mysqli_fetch_array($results1)) {
									echo "
											<tr>
												<td><textarea class=aboutedit name=fabout>" . $rows1['about'] . "</textarea></td>
									";
								}

								while ($rows2 = mysqli_fetch_array($results2)) {
									echo "
												<td><textarea class=aboutedit name=sabout>" . $rows2['about'] . "</textarea></td>
											</tr>
									";
								}
							?>
							<tr>
								<td align="right" colspan="3">
									<input class="button" name="btnupdate2" type="submit" value="Update">
								</td>
							<tr>
						</table>
					</form>
				</div>  
			</div>
		</div>

		<!-- /.container-fluid-->
		<!-- /.content-wrapper-->
		<footer class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>Copyright &copy; SurveyPortal 2018</small>
				</div>
			</div>
		</footer>

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="login.php">Logout</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
		<!-- Page level plugin JavaScript-->
		<script src="vendor/chart.js/Chart.min.js"></script>
		<script src="vendor/datatables/jquery.dataTables.js"></script>
		<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin.min.js"></script>
		<!-- Custom scripts for this page-->
		<script src="js/sb-admin-datatables.min.js"></script>
		<script src="js/sb-admin-charts.min.js"></script>		
	</div>
	
</body>

</html>

<!-- PHP -->

<?php
	if (isset($_POST['btnupdate1'])) {
		require('connection.php');

		$fhome = $_POST['fhome'];
		$shome = $_POST['shome'];

		$sqlUpdate1 = "UPDATE tbl_home SET home = '$fhome' WHERE id = 1";
		$sqlUpdate2 = "UPDATE tbl_home SET home = '$shome' WHERE id = 2";

		mysqli_query($link, $sqlUpdate1);
		mysqli_query($link, $sqlUpdate2);
		mysqli_close($link);

		echo "<script>alert('Update successful.')</script>";
		echo "<script>window.location.assign('admin.php')</script>";
	}

	if (isset($_POST['btnupdate2'])) {
		require('connection.php');

		$fabout = $_POST['fabout'];
		$sabout = $_POST['sabout'];

		$sqlUpdate1 = "UPDATE tbl_about SET about = '$fabout' WHERE id = 1";
		$sqlUpdate2 = "UPDATE tbl_about SET about = '$sabout' WHERE id = 2";

		mysqli_query($link, $sqlUpdate1);
		mysqli_query($link, $sqlUpdate2);
		mysqli_close($link);

		echo "<script>alert('Update successful.')</script>";
		echo "<script>window.location.assign('admin.php')</script>";
	}
?>