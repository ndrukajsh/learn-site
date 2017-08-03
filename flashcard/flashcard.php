<?php 

	require '../dbconnect.php';
	//marrim te gjithe te dhenat nga tabela flashcards ne nje rend random
	$query = "select *from flashcard order by RAND()";


	$stmt = $dbh->query($query);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



	foreach ($result as $row) {
		//fjalen anglisht, gjermanisht, gjinine, noun/verb/ sinonimet i dergojme te fili textChange.js
		//meqe kemi cikel foreach dhe kemi marre te gjithe rreshtat e db, ne po i dergojme filit js komplet permbajtjen e tabeles
		//flashcards
		echo $row['en_wort']."#".$row['de_wort']."#".$row['gender']."#".$row['noun_verb']."#".$row['synonym']."#".$row['alt1']."#".$row['alt2']."#".$row['alt3']."<br>";
	}




	

?>