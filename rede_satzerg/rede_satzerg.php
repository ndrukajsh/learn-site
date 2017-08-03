<?php 
	require '../dbconnect.php';
	//marrim 5 fjali te dhenat nga tabela satzerg ne nje rend random
	$query = "select * from rede_satzerg order by RAND() limit 5";

	$stmt = $dbh->query($query);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $row) {
		//te gjitha fjalite i postojme te fili satzeargenzung.js
		echo $row['satz']."||".$row['satz_audio']."<br>";
	}

?>