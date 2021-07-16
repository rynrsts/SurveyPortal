<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Survey</title>
	<link rel="stylesheet" type="text/css" href="css/frontend.css">
	<link rel="stylesheet" type="text/css" href="css/answer_survey.css">
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
	
	<!-- Survey area -->
	<div class="container">
		<form method="post">
			<h3>Please answer all the questions given</h3>
			<p>Just click one radio button per row so that your answers will be saved.<br>Thank you!</p>
			<p>&nbsp;</p><p>&nbsp;</p>

			<table class="tblsurvey" cellspacing="0" cellpadding="0">

				<!-- PHP -->

				<?php
					require('connection.php');
					require('get_address.php');

					$sqlGet1 = "SELECT * FROM tbl_topics WHERE id=$idNo[1]";
					$result1 = mysqli_query($link, $sqlGet1);
					$rdbtn = 1;

					while ($row1 = mysqli_fetch_array($result1)) {
						$topic = $row1['topic'];

						$sqlGet2 = "SELECT * FROM tbl_choices WHERE id=$idNo[1]";
						$result2 = mysqli_query($link, $sqlGet2);

						$sqlGet3 = "SELECT * FROM tbl_questions WHERE id=$idNo[1]";
						$result3 = mysqli_query($link, $sqlGet3);

						echo "<tr>
							<td class=tspacing><b>" . $topic . "</b></td>";

							while ($row2 = mysqli_fetch_array($result2)) {
								echo "<td class=tspacing>" . $row2['choices'] . "</td>";
							}
						echo "</tr>";

						while ($row3 = mysqli_fetch_array($result3)) {
							$c = 1;

							echo "<tr>
								<td class=lspacing>" . $row3['questions'] . "</td>";

								while ($c <= $row1['choices']) {
									echo "<td class=cspacing><input type=radio name=vote" . $rdbtn ."[] value=" . $c . " required></td>";
									$c++;
								}
							echo "</tr>";
							$rdbtn++;
						}
					}
				?>

				<tr>
					<td align="right" id="btnspacing" colspan="3">
						<input class="btntopic" name="btnsubmit" type="submit" value="Submit">
					</td>
				</tr>
			</table>
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

</body>

</html>

<!-- PHP -->

<?php
	if (isset($_POST['btnsubmit'])) {
		require('connection.php');
		require('get_address.php');

		$num = 1;
		$vote = $_POST['vote' . $num];
		$q = 1;

		$sqlGet1 = "SELECT * FROM tbl_topics WHERE id=$idNo[1]";
		$result1 = mysqli_query($link, $sqlGet1);

		while ($row1 = mysqli_fetch_array($result1)) {
			$id = $row1['id'];
			$respo = $row1['respondent'];
			while ($q <= $row1['questions']) {
				foreach($vote AS $cvote){
					$sqlGet2 = "SELECT * FROM tbl_records WHERE id=$idNo[1] AND question_number = $q AND choice_number = $cvote";
					$result2 = mysqli_query($link, $sqlGet2);

					while ($row2 = mysqli_fetch_array($result2)) {
						$votecount = $row2['vote'];
						$count1 = 1;
						$count1 += $votecount;

						$sqlUpdate1 = "UPDATE tbl_records SET vote = '$count1' WHERE id = $id AND question_number = $q AND choice_number = $cvote";
						mysqli_query($link, $sqlUpdate1);
					}
					$num++;
					$vote = $_POST['vote' . $num];
					$q++;
				}
			}
			$count2 = 1;
			$count2 += $respo;

			$sqlUpdate2 = "UPDATE tbl_topics SET respondent = $count2 WHERE id=$idNo[1]";
			mysqli_query($link, $sqlUpdate2);
		}
		echo "<script>alert('Survey submitted.')</script>";
		echo "<script>window.location.assign('survey.php')</script>";
	}
?>

<!-- UPDATE `tbl_records` SET `vote`=0 WHERE id = 16000