<?php
include 'dbconn.php';
include 'dbcontroller.php';
include('includes/config.php');

session_start();

$db_handle = new DBController();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// Get staff email
$sql0 = "SELECT * FROM staff";
$result0 = mysqli_query($conn, $sql0);
$num_rows = mysqli_num_rows($result0);

if ($num_rows > 0) {
	while ($res = mysqli_fetch_assoc($result0)) {
		$id = $res["id"];
		$staff = $res["email"];
	}
}


// Get selected field
if (isset($_GET["id"])) {
	$id = $_GET["id"];

	$query = "SELECT * FROM field WHERE id='$id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type"
		  content="text/html; charset=utf-8">

	<meta http-equiv="X-UA-Compatible"
		  content="IE=edge">

	<meta name="viewport"
		  content="width=device-width, initial-scale=1">

	<meta name="keywords" content="">
	<meta name="description" content="">

	<title>Checkout</title>

	<link rel="stylesheet"
		  href="assets/css/bootstrap.min.css"
		  type="text/css">

	<link rel="stylesheet"
		  href="assets/css/style.css"
		  type="text/css">

	<link rel="stylesheet"
		  href="assets/css/owl.carousel.css"
		  type="text/css">

	<link rel="stylesheet"
		  href="assets/css/owl.transitions.css"
		  type="text/css">

	<link href="assets/css/slick.css"
		  rel="stylesheet">

	<link href="assets/css/bootstrap-slider.min.css"
		  rel="stylesheet">

	<link href="assets/css/font-awesome.min.css"
		  rel="stylesheet">

	<link rel="stylesheet"
		  id="switcher-css"
		  type="text/css"
		  href="assets/switcher/css/switcher.css"
		  media="all">

	<link rel="alternate stylesheet"
		  type="text/css"
		  href="assets/switcher/css/red.css"
		  title="red"
		  media="all"
		  data-default-color="true">

	<link rel="alternate stylesheet"
		  type="text/css"
		  href="assets/switcher/css/orange.css"
		  title="orange"
		  media="all">

	<link rel="alternate stylesheet"
		  type="text/css"
		  href="assets/switcher/css/blue.css"
		  title="blue"
		  media="all">

	<link rel="alternate stylesheet"
		  type="text/css"
		  href="assets/switcher/css/pink.css"
		  title="pink"
		  media="all">

	<link rel="alternate stylesheet"
		  type="text/css"
		  href="assets/switcher/css/green.css"
		  title="green"
		  media="all">

	<link rel="alternate stylesheet"
		  type="text/css"
		  href="assets/switcher/css/purple.css"
		  title="purple"
		  media="all">

	<link rel="apple-touch-icon-precomposed"
		  sizes="144x144"
		  href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">

	<link rel="apple-touch-icon-precomposed"
		  sizes="114x114"
		  href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">

	<link rel="apple-touch-icon-precomposed"
		  sizes="72x72"
		  href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">

	<link rel="apple-touch-icon-precomposed"
		  href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">

	<link rel="shortcut icon"
		  href="assets/images/favicon-icon/favicon.png">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900"
		  rel="stylesheet">

	<link rel="stylesheet"
		  type="text/css"
		  href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">

	<link rel="stylesheet"
		  type="text/css"
		  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

<?php include('includes/colorswitcher.php'); ?>

<?php include('includes/header.php'); ?>

<h1 align="center">
	Please confirm your booking before proceeding to payment
</h1>

<?php
$student_id = $_SESSION['student_id'];

$id = $_GET["id"];

$getBookingDetail =
	"SELECT *
	 FROM bookings
	 WHERE id = " . $id . "
	 AND student_id = " . $student_id;

$bookDetail = mysqli_query($conn, $getBookingDetail);
$book = mysqli_fetch_assoc($bookDetail);


if (isset($_POST['submit'])) {
	$student_id = $_SESSION['student_id'];
	$car_id = $_POST['id'];

	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];

	$booking_fee = $_POST['booking_fee'];
	$booking_duration = $_POST['booking_duration'];

	$start_timestamp =
		strtotime(
			$_POST['start_date'] . ' ' .
			$_POST['start_time']
		) . "<br/>";

	$end_timestamp =
		strtotime(
			$_POST['end_date'] . ' ' .
			$_POST['end_time']
		);

	$checkDateTime =
		"SELECT *
		 FROM bookings
		 WHERE NOT (
			(end_timestamp < '$start_timestamp')
			OR
			(start_timestamp > '$end_timestamp')
		 )
		 AND id = '$id'";

	$checkResult = mysqli_query($conn, $checkDateTime);
	$checkRow = mysqli_num_rows($checkResult);

	if ($checkRow > 0) {
		echo "
			<script>
				alert(
					'This Time and Date already Booked! ' +
					'Please choose another field.'
				);
			</script>
		";

		echo "
			<script>
				window.location = 'fieldlists.php';
			</script>
		";
	} else {
		$start_timestamp =
			strtotime(
				$_POST['start_date'] . ' ' .
				$_POST['start_time']
			);

		$end_timestamp =
			strtotime(
				$_POST['end_date'] . ' ' .
				$_POST['end_time']
			);

		$sql =
			"INSERT INTO bookings (
				student_id,
				id,
				start_date,
				end_date,
				start_time,
				end_time,
				booking_duration,
				booking_fee,
				booking_payment,
				start_timestamp,
				end_timestamp
			)
			VALUES (
				'$student_id',
				'$id',
				'$start_date',
				'$end_date',
				'$start_time',
				'$end_time',
				'$booking_duration',
				'$booking_fee',
				'unpaid',
				'$start_timestamp',
				'$end_timestamp'
			)";

		$res = mysqli_query($conn, $sql);

		$lastUpdatedId = $conn->insert_id;

		$percentToGetOwner = 90;
		$percentInOwner = $percentToGetOwner / 100;
		$owner_rate = $percentInOwner * $booking_fee;

		$percentToGetAdmin = 10;
		$percentInAdmin = $percentToGetAdmin / 100;
		$admin_rate = $percentInAdmin * $booking_fee;

		$payment =
			"INSERT INTO payment (
				booking_id,
				student_id,
				id,
				total_rate,
				owner_rate,
				admin_rate
			)
			VALUES (
				'$lastUpdatedId',
				'$student_id',
				'$car_id',
				'$booking_fee',
				'$owner_rate',
				'$admin_rate'
			)";

		$result = mysqli_query($conn, $payment);

		if (!$result) {
			echo "Booking Failed";
		} else {
			echo "
				<script>
					alert('Successfully Booked!');
				</script>
			";

			echo "
				<script>
					window.location =
						'paymentmethod.php?booking_id=$lastUpdatedId';
				</script>
			";


			/*
			 * ADMIN EMAIL
			 */
			$mail = new PHPMailer(true);

			try {
				$mail->SMTPDebug = SMTP::DEBUG_OFF;
				$mail->isSMTP();

				$mail->Host =
					'sandbox.smtp.mailtrap.io';

				$mail->SMTPAuth = true;

				$mail->Username =
					'39cb05021a0873';

				$mail->Password =
					'2123f4369f9904';

				$mail->SMTPSecure =
					PHPMailer::ENCRYPTION_STARTTLS;

				$mail->Port = 587;

				$mail->setFrom(
					'noreply@badminton.com',
					'Badminton Arena'
				);

				$mail->addAddress($staff);

				$mail->addReplyTo(
					'noreply@badminton.com',
					'Information'
				);

				$mail->isHTML(true);

				$mail->Subject =
					'New Booking Received';

				$mail->Body =
					'This is the <b>New Booking</b>' .
					'<br>ID: ' .
					$lastUpdatedId .
					'<br>Field ID: ' .
					$id .
					'<br>Booking Duration: ' .
					$booking_duration .
					' Hours';

				$mail->send();

				// Wait before sending the customer email
				sleep(11);

			} catch (Exception $e) {
				error_log(
					'Admin email failed: ' .
					$mail->ErrorInfo
				);

				echo
					"Admin email could not be sent. " .
					"Mailer Error: " .
					$mail->ErrorInfo;
			}


			/*
			 * CUSTOMER EMAIL
			 */
			$user_query =
				"SELECT email
				 FROM customer
				 WHERE student_id = '$student_id'";

			$user_result =
				mysqli_query($conn, $user_query);

			if (!$user_result) {
				error_log(
					'Customer email query failed: ' .
					mysqli_error($conn)
				);

				echo 'Customer email query failed.';
			} else {
				$user_row =
					mysqli_fetch_assoc($user_result);

				if (
					!$user_row ||
					empty(trim($user_row['email']))
				) {
					error_log(
						'Customer email was not found ' .
						'for student ID: ' .
						$student_id
					);

					echo 'Customer email was not found.';
				} else {
					$user_email =
						trim($user_row['email']);

					if (
						!filter_var(
							$user_email,
							FILTER_VALIDATE_EMAIL
						)
					) {
						error_log(
							'Invalid customer email ' .
							'for student ID: ' .
							$student_id
						);

						echo
							'Customer email address is invalid.';
					} else {
						$user_mail =
							new PHPMailer(true);

						try {
							$user_mail->SMTPDebug =
								SMTP::DEBUG_OFF;

							$user_mail->isSMTP();

							$user_mail->Host =
								'sandbox.smtp.mailtrap.io';

							$user_mail->SMTPAuth =
								true;

							$user_mail->Username =
								'39cb05021a0873';

							$user_mail->Password =
								'2123f4369f9904';

							$user_mail->SMTPSecure =
								PHPMailer::ENCRYPTION_STARTTLS;

							$user_mail->Port = 587;

							$user_mail->setFrom(
								'noreply@badminton.com',
								'Badminton Arena'
							);

							$user_mail->addAddress(
								$user_email
							);

							$user_mail->addReplyTo(
								'noreply@badminton.com',
								'Information'
							);

							$user_mail->isHTML(true);

							$user_mail->Subject =
								'Your Booking Confirmation';

							$user_mail->Body =
								'Dear Customer,' .
								'<br>Your booking has been confirmed.' .
								'<br>Booking ID: ' .
								$lastUpdatedId .
								'<br>Field: ' .
								$row['name'] .
								'<br>Date: ' .
								$start_date .
								'<br>Time: ' .
								$start_time .
								' - ' .
								$end_time .
								'<br>Thank you!';

							$user_mail->send();

						} catch (Exception $e) {
							error_log(
								'Customer email failed for ' .
								$user_email .
								': ' .
								$user_mail->ErrorInfo
							);

							echo
								"User email could not be sent. " .
								"Mailer Error: " .
								$user_mail->ErrorInfo;
						}
					}
				}
			}
		}

		$_SESSION["kucing"] = $lastUpdatedId;
	}
}
?>

<form method="post"
	  action=""
	  enctype="multipart/form-data">

	<div class="container">

		<br>
		<br>

		<input type="hidden"
			   class="form-control"
			   name="student_id"
			   value="<?php echo $_SESSION['student_id']; ?>">

		<input type="hidden"
			   class="form-control"
			   name="id"
			   value="<?php echo $id; ?>">

		<input type="hidden"
			   class="form-control"
			   name="booking_id"
			   value="<?php
					echo isset($book['booking_id'])
						? $book['booking_id']
						: '';
			   ?>">

		<table id="example"
			   class="table table-striped table-bordered">

			<thead>
				<tr>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Start Time</th>
					<th>End Time</th>
					<th>Duration (hours)</th>
					<th>Booking Fee (RM)</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<?php
					if (isset($_SESSION['book_duration'])) {
						$hour =
							$_SESSION['book_duration'];

						$totalhour = round($hour);

						$booking_rate =
							$row["rate"] * $totalhour;
					} elseif (
						isset($_SESSION['st_date']) &&
						isset($_SESSION['en_date']) &&
						isset($_SESSION['st_time']) &&
						isset($_SESSION['en_time'])
					) {
						$date1 =
							$_SESSION['st_date'] .
							' ' .
							$_SESSION['st_time'];

						$date2 =
							$_SESSION['en_date'] .
							' ' .
							$_SESSION['en_time'];

						$timestamp1 = strtotime($date1);
						$timestamp2 = strtotime($date2);

						$hour =
							abs(
								$timestamp2 -
								$timestamp1
							) / (60 * 60);

						$totalhour = round($hour);

						$booking_rate =
							$row["rate"] *
							$totalhour;
					}
					?>

					<td>
						<input type="text"
							   class="form-control"
							   name="start_date"
							   value="<?php
									if (
										isset($_SESSION['st_date'])
									) {
										echo $_SESSION['st_date'];
									}
							   ?>">
					</td>

					<td>
						<input type="text"
							   class="form-control"
							   name="end_date"
							   value="<?php
									if (
										isset($_SESSION['en_date'])
									) {
										echo $_SESSION['en_date'];
									}
							   ?>">
					</td>

					<td>
						<input type="text"
							   class="form-control"
							   name="start_time"
							   value="<?php
									if (
										isset($_SESSION['st_time'])
									) {
										echo $_SESSION['st_time'];
									}
							   ?>">
					</td>

					<td>
						<input type="text"
							   class="form-control"
							   name="end_time"
							   value="<?php
									if (
										isset($_SESSION['en_time'])
									) {
										echo $_SESSION['en_time'];
									}
							   ?>">
					</td>

					<td>
						<input type="text"
							   class="form-control"
							   name="duration"
							   value="<?php
									if (isset($hour)) {
										echo round($hour);
									}
							   ?>">
					</td>

					<td>
						<input type="text"
							   class="form-control"
							   name="booking"
							   value="<?php
									if (isset($booking_rate)) {
										echo $booking_rate;
									}
							   ?>">
					</td>

					<input type="hidden"
						   class="form-control"
						   name="booking_fee"
						   value="<?php
								if (isset($booking_rate)) {
									echo $booking_rate;
								}
						   ?>">

					<input type="hidden"
						   class="form-control"
						   name="booking_duration"
						   value="<?php
								if (isset($hour)) {
									echo round($hour);
								}
						   ?>">
				</tr>
			</tbody>
		</table>

		<div class="card-body">
			<a class="btn btn-danger"
			   href="index.php"
			   role="button">
				Edit Booking
			</a>
		</div>

		<br>
		<br>

		<table id="example"
			   class="table table-striped table-bordered">

			<thead>
				<tr>
					<th>Field Name</th>
					<th>Size (metre)</th>
					<th>Rate (RM)</th>
					<th>Description</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>
						<?php echo $row["name"]; ?>
					</td>

					<td>
						<?php echo $row["size"]; ?>
					</td>

					<td>
						<?php echo $row["rate"]; ?>
					</td>

					<td>
						<?php echo $row["info"]; ?>
					</td>
				</tr>
			</tbody>
		</table>

		<div class="card-body">
			<a class="btn btn-danger"
			   href="fieldlists.php"
			   role="button">
				Change Field
			</a>
		</div>

		<br>

		<div>
			<button id="payment-button"
					type="submit"
					name="submit"
					class="btn btn-lg btn-info btn-block">

				<i class="fa fa-lock fa-lg"></i>
				&nbsp;

				<span id="payment-button-amount">
					Proceed
				</span>

				<span id="payment-button-sending"
					  style="display:none;">
					Sending...
				</span>
			</button>
		</div>
	</div>
</form>

</body>
</html>