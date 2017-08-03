<?php 
	session_start();
	require '../dbconnect.php';
	//nga fili bildwort.js marrim nr total te pikeve qe ka fituar useri te loja dhe kete numer do e fusim
	//tek kolona bildwort_progress dmth do i bejme update kesaj kolone per kete user
	$punkt = $_POST["p"];
	//query me poshte sherben per te numeruar nqs useri qe ekziston te tabela progress apo jo
	//pra kontrollojme nqs id e tij eshte te tabela. Nqs useri eshte ateher i bejme update kolones
	//bildwort_progress. Ne te kundert bejme insert te tabela progress qe te ruajme progressin e tij
	$ctrl_query = "select count(kunde_ID) as total from progress where kunde_ID = ?";
	//funksioni count i sql numeron rreshtat e kolones kunde_ID te tabela progress dhe na tregon sa here haset
	//id qe ne po kerkojme. Me ane te 'as total' ne bejme te mundur qe te kapim vleren qe kthen query
	$stmt = $dbh->prepare($ctrl_query);
	$stmt->bindParam(1,$_SESSION['kunde_ID']);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if ($result[0]['total'] != 0) {
		$query = "update progress set bildwort_progress = ".$punkt." where kunde_ID = '".$_SESSION['kunde_ID']."'";
		$st = $dbh->prepare($query);

		$st->execute();
		// echo "table updatet";
	}else{
		$st2 = $dbh->prepare("insert into progress (kunde_ID, bildwort_progress) values ('".$_SESSION['kunde_ID']."', '".$punkt."')");

		$st2->execute();
		// echo "First record inserted";
	}


	// te pjesa me poshte, pasi kemi bere update pikeve te lojes specifike ku jemi, i bejme update edhe totalit te pikeve
	$s = $dbh->prepare("select * from progress where kunde_ID = ?");
	$s->bindParam(1,$_SESSION['kunde_ID']);
	$s->execute();
	$r = $s->fetchAll(PDO::FETCH_ASSOC);

	$total = intval($r[0]['bildwort_progress']) + intval($r[0]['flashcard_progress']) + intval($r[0]['rede_satzerg_progress']) + intval($r[0]['satzerg_progress']) + intval($r[0]['uhr_tabelle_progress']) + intval($r[0]['wortanpassung_progress']);

	echo $total;
	$update_q = "update progress set total_progress = ".$total." where kunde_ID = '".$_SESSION['kunde_ID']."'";
	$stat = $dbh->prepare($update_q);
	$stat->execute();
	
	
 ?>