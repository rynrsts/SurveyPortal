<?php
	require('connection.php');
	require('get_address.php');

	$sqlGet1 = "SELECT * FROM tbl_topics WHERE id=$idNo[1]";
	$result1 = mysqli_query($link, $sqlGet1);

	while ($row1 = mysqli_fetch_array($result1)) {
		$sqlGet2 = "SELECT * FROM tbl_questions WHERE id=$idNo[1]";
		$result2 = mysqli_query($link, $sqlGet2);

		while ($row2 = mysqli_fetch_array($result2)) {
			if ($row1['id'] = $row2['id']) {
				echo "<script>alert('Survey has already been created.')</script>";
				echo "<script>window.location.assign('survey_topics.php')</script>";
			}
		}
	}
?>

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
				<li class="breadcrumb-item">Survey Topics</li>
			</ol>

			<!-- Icon Cards-->
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i></div>
				<div class="card-body">
					<div class="table-responsive">
						<form method=post>
							<table cellpadding=10 cellspacing=0>
								<tr>
									<td>Questions</td>
									<td>Choices</td>
								</tr>

								<!-- PHP -->

								<?php
									require('connection.php');
									require('get_address.php');

									$sqlGet = "SELECT * FROM tbl_topics WHERE id=$idNo[1]";
									$result = mysqli_query($link, $sqlGet);

									while ($row = mysqli_fetch_array($result)) {
										$q = 1;
										$c = 1;

										while ($q <= $row['questions'] || $c <= $row['choices']) {
											if ($q <= $row['questions']) {
												echo "<tr>
													<td>
														<input class=txtedit name=questions[] placeholder=Question" . $q . " size=30 type=text required>
													</td>";
												$q++;
											}
											else {
												echo "<tr>
													<td></td>";
											}

											if ($c <= $row['choices']) {
													echo "<td>
														<input class=txtedit name=choices[] placeholder=Choice" . $c . " size=30 type=text required>
													</td>
												</tr>";
											$c++;
											}
										}
									}
								?>

								<tr>
									<td align=right colspan=2><input class="button" name="btncreate" type=submit value=Create></td>
								</tr>
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
	
	<!-- Custom JavaScript -->
	<script src="js/function.js"></script>

</body>

</html>

<!-- PHP -->

<?php
	if (isset($_POST['btncreate'])) {
		require('connection.php');
		require('get_address.php');

		$questions = $_POST['questions'];
		$choices = $_POST['choices'];
		$qnum = 1;
		$cnum = 1;

		$sqlGet = "SELECT * FROM tbl_topics WHERE id=$idNo[1]";
		$result = mysqli_query($link, $sqlGet);

		while ($row = mysqli_fetch_array($result)) {
			$id = $row['id'];

			foreach ($questions AS $qvalue) {
				$sqlSave = "INSERT INTO tbl_questions(id, question_number, questions)
				VALUES('$id', '$qnum', '$qvalue')";

				mysqli_query($link, $sqlSave);
				$qnum++;
			}

			foreach ($choices AS $cvalue) {
				$sqlSave = "INSERT INTO tbl_choices(id, choice_number, choices)
				VALUES('$id', '$cnum', '$cvalue')";

				mysqli_query($link, $sqlSave);
				$cnum++;
			}

			$qnum = 1;

			while ($qnum <= $row['questions']) {
				$cnum = 1;
				
				while ($cnum <= $row['choices']){
					$sqlSave = "INSERT INTO tbl_records(id, question_number, choice_number, vote)
					VALUES('$id', '$qnum', '$cnum', 0)";

					mysqli_query($link, $sqlSave);
					$cnum++;
				}
				$qnum++;
			}

			echo "<script>alert('Survey created.')</script>";
			echo "<script>window.location.assign('survey_topics.php')</script>";
		}
	}
?>