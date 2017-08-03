<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wie sp&auml;t ist es? - Langbook DE - Learn German the easy Way.</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../style/main.css" type="text/css">
	<link rel="stylesheet" href="../style/clock.css" type="text/css">

	<script src="../js/learn_uhr.js"></script>
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
	</div>  <!-- /col-md-2 navigation -->
				<div class="container">
					<div class="row">
						<div class="col-xs-11 col-sm-6 col-md-7 col-lg-8 col-xs-offset-1 col-sm-offset-5 col-lg-offset-4 text-center">
						&nbsp;



							<div class="pull-left" style="font-weight: bold; font-size: 100px; width: 40%;">
								<button type="button" class="btn btn-default uph" style="width: 100%"><span class="glyphicon glyphicon-chevron-up"></span></button>
								<div>
									<p id="hours">00</p>
								</div>
								<button type="button" class="btn btn-default downh" style="width: 100%"><span class="glyphicon glyphicon-chevron-down"></span></button>
							</div>

							<div class="pull-left" style="font-size: 100px; font-weight: bold; padding-top: 18%;">
								<span>:</span>
							</div>


							<div class="pull-left" style="font-weight: bold; font-size: 100px; width: 40%;">
								<button type="button" class="btn btn-default upmin" style="width: 100%"><span class="glyphicon glyphicon-chevron-up"></span></button>
								<div>
									<p id="min">00</p>
								</div>
								<button type="button" class="btn btn-default downmin" style="width: 100%"><span class="glyphicon glyphicon-chevron-down"></span></button>
							</div>

							<button id="confirm" type="button" class="btn btn-success pull-left" style="width: 85%">Confirm</button>

							<label class="result pull-left" style="margin-top: 5%; margin-left: 39%; text-align: center;"></label>


						</div>
					</div>
				</div> <!-- /col-md-10 content -->
		<script type="text/javascript">
			$(document).ready(function () {
				$('.dropdown-toggle').dropdown();
			});
		</script>
	</body>
	</html>
