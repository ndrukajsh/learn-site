<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome! - Langbook DE</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<script src="js/jquery-3.1.1.min.js"></script>
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
			<div class="col-xs-10 col-sm-8 col-md-8 col-lg-6 col-lg-offset-3 col-md-offset-2 col-sm-offset-2 col-xs-offset-1">
				<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
						<label for="vorname">First name:</label>
						<input type="text" class="form-control" id="vorname" name="vorname">
					</div>
					<div class="form-group">
						<label for="nachname">Last name:</label>
						<input type="text" class="form-control" id="nachname" name="nachname">
					</div>
					<div class="form-group">
						<label for="email">Email address:</label>
						<div class="input-group">
							<span class="input-group-addon">@</span>
							<input type="email" class="form-control" id="email" name="email">
						</div>
					</div>
					<div class="form-group">
						<label for="passwort">Password:</label>
						<input type="password" class="form-control" id="passwort" name="passwort">
					</div>
					<button type="submit" class="btn btn-primary btn-block" name="sub">Sign Up</button>
				</form>

				<!-- Formular verarbeiten -->
				<?php
					if(isset($_POST['sub'])) {

							// DB verbinden
						require('dbconnect.php');


							// Insert-Statement 1
						$insert1 = "INSERT INTO kunde (vorname, nachname, email, passwort) VALUES (?,?,?,?)";

						$sth1 = $dbh->prepare($insert1);

						$pwdencrypt=crypt($_POST['passwort'],'$6$rounds=4898$entenhausendagob$');

						$sth1->bindParam(1, $_POST['vorname']);
						$sth1->bindParam(2, $_POST['nachname']);
						$sth1->bindParam(3, $_POST['email']);
						$sth1->bindParam(4, $pwdencrypt);

						$sth1->execute();
						$dbh = null;

						echo '<script type="text/javascript">window.location = "login.php";</script>';
					}
				?>
			</div>
		</div>
	</div>



</body>
</html>
