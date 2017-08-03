<?php session_start();
	if (!isset($_SESSION['email'])) {
		header("Location: en/index.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Langbook DE - Learn German the easy Way.</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style/main-en.css" type="text/css">
	<link rel="stylesheet" href="style/main.css" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- Favicons - Desktop Browser / Anroid Chrome / Apple Touch  -->
	<link rel="shortcut icon" href="img/favicons/favicon.png">
	<link rel="icon" type="image/png" sizes="192x192" href="img/favicons/android-icon-192x192.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-icon-180x180.png">

<script src="js/all.js"></script>

</head>
<body>

	<div class="nav-side-menu">
		<div class="brand"><a href="http://langbook.plazhet.com/home.php"><img src="img/nav-logo.png"></a></div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
		<div class="menu-list">
			<ul id="menu-content" class="menu-content collapse out">
				<li>
					<button class="btn btn-default dropdown-toggle" type="button" id="buttonuser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-user" style="font-size: 20px; vertical-align: middle; display: inline-block;"></span>
							<?php
								if (isset($_SESSION['vorname'], $_SESSION['nachname'])) {
									echo "<span>" . $_SESSION['vorname'] . " " . $_SESSION['nachname'] . "</span>";
								}
							?>
						</button>
				</li>
				<li><?php include_once("c_progress.php"); ?></li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="bildwort/indexBildwort.php">Bildwort<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="flashcard/indexFlashcard.php">Flashcard Lernmodus<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="flcards_sp/indexFlcards_sp.php">Flashcard Testmodus<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="uhr/indexUhr.php">Wie sp&auml;t ist es? Testmodus<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="learn_uhr/indexLearnUhr.php">Wie sp&auml;t ist es? Lernmodus<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="satzeargenzung/indexSatzeargenzung.php">Satzerg&auml;nzung<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="rede_satzerg/indexRede_satzerg.php">Rede Satzerg&auml;nzung<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="wortanpassung/indexWort.php">Wortanpassung<span class="arrow"></span></a>
				</li>
				<li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
				<li>
					<form method="post" action="logout.php">
						<span class="glyphicon glyphicon-off"></span><input type="submit" name="logout" value="Log out" class="logout">
					</form>
				</li>
			</ul>
		</div>
	</div>

	<div class="container" id="main">
		<div class="row">
			<div class="jumbotron">
				<h1 class="text-center">Welcome to Langbook DE</h1>
				<div class="container">
					<div class="row col-lg-offset-2">
						<div class="col-xs-12 col-sm-9 col-lg-8">
							<a class="btn btn-primary btn-lg biggie-btn btn-block" href="bildwort/indexBildwort.php" role="button">Begin!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	 <script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
   </script>

</body>
</html>
