<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Settings! - Langbook DE</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="/style/main-en.css" type="text/css">

	<!-- Favicons - Desktop Browser / Anroid Chrome / Apple Touch  -->
	<link rel="shortcut icon" href="img/favicons/favicon.png">
	<link rel="icon" type="image/png" sizes="192x192" href="img/favicons/android-icon-192x192.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-icon-180x180.png">
</head>
<body>

	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">
					<img alt="Langbook DE" src="img/nav-logo.png">
				</a>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-6 col-lg-offset-3">
				<form role="form" method="POST" action="settings.php">
					<div class="form-group">
						<label for="vorname">New First name:</label>
						<input type="text" class="form-control" id="vorname" name="vorname">
					</div>
					<div class="form-group">
						<label for="nachname">New Last name:</label>
						<input type="text" class="form-control" id="nachname" name="nachname">
					</div>
					<div class="form-group">
						<label for="email">New Email address:</label>
						<div class="input-group">
							<span class="input-group-addon">@</span>
							<input type="email" class="form-control" id="email" name="email">
						</div>
					</div>
					<div class="form-group">
						<label for="passwort">Password:</label>
						<input type="password" class="form-control" id="passwort" name="passwort" required>
					</div>
					<button type="submit" class="btn btn-primary btn-block" name="edit">Change</button>
				</form>

				<!-- Formular verarbeiten -->

				<?php


					require('dbconnect.php');


					 if (isset($_POST['edit'])) {

						$vorname = $_POST['vorname'];
						$nachname = $_POST['nachname'];
						$newemail = $_POST['email'];
						$pwdencrypt = crypt($_POST['passwort'],'$6$rounds=4898$entenhausendagob$');
						$email = $_SESSION['email'];

						$update1 = "UPDATE kunde SET vorname = ?, nachname = ?, email = ?, passwort = ? WHERE email = ?";


						$sth2 = $dbh->prepare($update1);
						$sth2->bindParam(1, $vorname);
						$sth2->bindParam(2, $nachname);
						$sth2->bindParam(3, $newemail);
						$sth2->bindParam(4, $pwdencrypt);
						$sth2->bindParam(5, $email);


						//echo $update1;
						$sth2->execute();
						$dbh = null;

						$_SESSION['vorname'] = $vorname;
						$_SESSION['nachname'] = $nachname;
					}
				?>
			</div>
			<div class="col-md-12 col-lg-6 col-lg-offset-3">
				<?php echo "<h1 style='text-align:center'>Hello ".$_SESSION['vorname']."</h1>";	?>
			</div>
		</div>
	</div>

</body>
</html>
