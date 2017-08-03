<?php
session_start();

if(isset($_SESSION['email'])){
	header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Langbook DE - Learn German the easy Way.</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="../style/main-en.css" type="text/css">

	<!-- Favicons - Desktop Browser / Anroid Chrome / Apple Touch  -->
	<link rel="shortcut icon" href="../img/favicons/favicon.png">
	<link rel="icon" type="image/png" sizes="192x192" href="../img/favicons/android-icon-192x192.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../img/favicons/apple-icon-180x180.png">
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">
					<img alt="Langbook DE" src="../img/nav-logo.png">
				</a>
			</div>
		</div>
	</nav>


	<!-- <h1 class="text-center">Langbook DE&#42;</h1>

	<h2>Learn German the easy way...</h2>
	<div class="row col-sm-offset-2">
	<div class="col-sm-4">
	<a href="signup.php" type="button" class="btn btn-primary btn-block biggie-btn">Sign Up</a>
</div>
<div class="col-sm-4">
<a href="login.php" type="button" class="btn btn-default btn-block biggie-btn">Login</a>
</div>
</div> -->

<div class="jumbotron">
	<h1 class="text-center">Langbook DE&#42;</h1>
	<p>Learn German the easy Way...</p>
	<div class="container">
		<div class="row col-lg-offset-2">
			<div class="col-xs-12 col-sm-6 col-lg-5">
				<a class="btn btn-primary btn-lg biggie-btn btn-block" href="../signup.php" role="button">Sign Up</a>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-5">
				<a class="btn btn-default btn-lg biggie-btn btn-block" href="../login.php" role="button">Login</a>
			</div>
		</div>
	</div>
</div>

</body>
</html>
