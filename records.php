<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Records</title>

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
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Accounts">
					<a class="nav-link" href="survey_topics.php">
						<i class="fa fa-fw fa"></i>
						<span class="nav-link-text">Survey Topics</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
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
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reservation">
					<a class="nav-link" href="accounts.php">
						<i class="fa fa-fw fa"></i>
						<span class="nav-link-text">Accounts</span>
					</a>
				</li>
			</ul>
			 <ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-fw fa-sign-out"></i>Logout
					</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="content-wrapper">
		<div class="container-fluid">

			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Survey Records</li>
			</ol>

			<!-- Icon Cards-->      
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i></div>
				<div class="card-body">
					<div class="table-responsive">
						<form method="post">
							<table class="table table-bordered" width="100%" cellspacing="0">

								<!-- PHP -->

								<?php

									require('connection.php');
									require('get_address.php');

									$sqlGet1 = "SELECT * FROM tbl_topics WHERE id=$idNo[1]";
									$result1 = mysqli_query($link, $sqlGet1);

									$sqlGet2 = "SELECT * FROM tbl_choices WHERE id=$idNo[1]";
									$result2 = mysqli_query($link, $sqlGet2);

									$sqlGet3 = "SELECT * FROM tbl_questions WHERE id=$idNo[1]";
									$result3 = mysqli_query($link, $sqlGet3);

									while ($row1 = mysqli_fetch_array($result1)) {
										echo "<tr>
											<td align=center><b>" . $row1['topic'] . " (" . $row1['respondent'] . " respondents)</b></td>";
											while ($row2 = mysqli_fetch_array($result2)) {
												echo "<td align=center><b>" . $row2['choices'] ."</b></td>";
											}
										echo "</tr>";

										$q = 1;
										$c = 1;

										while ($row3 = mysqli_fetch_array($result3)) {
											echo "<tr>
												<td><b>" . $row3['questions'] ."</b></td>";

												while ($c <= $row1['choices']) {
													$sqlGet4 = "SELECT * FROM tbl_records WHERE id=$idNo[1] AND question_number = $q && choice_number = $c";
													$result4 = mysqli_query($link, $sqlGet4);

													while ($row4 = mysqli_fetch_array($result4)) {
														echo "<td align=center>" . $row4['vote'] . "</td>";
														$c++;
													}
												}
											echo "</tr>";
											$q++;
											$c = 1;
										}
									}
								?>

							</table>
						</form>
					</div>
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