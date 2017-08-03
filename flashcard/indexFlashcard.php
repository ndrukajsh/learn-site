<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Flashcards - Langbook DE - Learn German the easy Way.</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">

	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../style/main.css" type="text/css">
	<link rel="stylesheet" href="../style/flashcards.css" type="text/css">


	<script src="../js/all.js"></script>

	<!-- Favicons - Desktop Browser / Anroid Chrome / Apple Touch  -->
	<link rel="shortcut icon" href="../img/favicons/favicon.png">
	<link rel="icon" type="image/png" sizes="192x192" href="img/favicons/android-icon-192x192.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-icon-180x180.png">
</head>
<body>
	<div class="nav-side-menu">
		<div class="brand"><a href="http://langbook.plazhet.com/home.php"><img src="../img/nav-logo.png"></a></div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
		<div class="menu-list">
			<ul id="menu-content" class="menu-content collapse out">
				<li>
					<button class="btn btn-default dropdown-toggle" type="button" id="buttonuser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-user" style="font-size: 25px; vertical-align: middle; white-space: nowrap; display: inline-block;"></span>
							<?php
								if (isset($_SESSION['vorname'], $_SESSION['nachname'])) {
									echo "<span>" . $_SESSION['vorname'] . " " . $_SESSION['nachname'] . "</span>";
								}
							?>
					</button>
				</li>
				<li><?php include_once("../c_progress.php"); ?></li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="http://langbook.plazhet.com/bildwort/indexBildwort.php">Bildwort<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="http://langbook.plazhet.com/flashcard/indexFlashcard.php">Flashcard Lernmodus<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="http://langbook.plazhet.com/flcards_sp/indexFlcards_sp.php">Flashcard Testmodus<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="http://langbook.plazhet.com/uhr/indexUhr.php">Wie sp&auml;t ist es? Testmodus<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="http://langbook.plazhet.com/learn_uhr/indexLearnUhr.php">Wie sp&auml;t ist es? Lernmodus<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="http://langbook.plazhet.com/satzeargenzung/indexSatzeargenzung.php">Satzerg&auml;nzung<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="http://langbook.plazhet.com/rede_satzerg/indexRede_satzerg.php">Rede Satzerg&auml;nzung<span class="arrow"></span></a>
				</li>
				<li data-toggle="collapse" data-target="#products" class="collapsed active">
					<a href="http://langbook.plazhet.com/wortanpassung/indexWort.php">Wortanpassung<span class="arrow"></span></a>
				</li>
				<li><a href="http://langbook.plazhet.com/settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
				<li>
					<form method="post" action="http://langbook.plazhet.com/logout.php">
						<span class="glyphicon glyphicon-off"></span><input type="submit" name="logout" value="Log out" class="logout">
					</form>
				</li>
			</ul>
		</div>
	</div>


	<div class="col-xs-12 col-sm-8 col-sm-offset-3 text-center" style="margin-left:300px;">

				<div class="container">
					<div class="row">
					&nbsp;
						<div class="">
							<div id="flip3D" class="col-xs-12" flipped='true'>
								<div id="back" style="width: 40% !important;">
									<h1 id="the-h" class="text-center"></h1>
								</div>
								<div id="front" style="width: 40% !important;">
									<h1 id="the-p" class="text-center"></h1>
									<p id="noun" class="text-center text-uppercase"></p><br>
									<p id="gender" class="text-center text-capitalize"><em></em></p><br>
									<p id="synonyms" class="text-center"></p>
								</div>
							</div>
							<p style="padding: 3%;"></p>
							<div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
								<button id="deco" class="btn btn-default btn-block btn-lg"><span class="glyphicon glyphicon-circle-arrow-left"></span></button>
							</div>
							<div class="col-xs-6 col-sm-5 col-md-4 col-lg-3">
								<button id="inco" class="btn btn-success btn-block btn-lg"><span class="glyphicon glyphicon-circle-arrow-right"></span></button>
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
	<script src="../js/flashcards.js"></script>
	<script src="../js/sp_textChange.js"></script>
</body>
</html>
