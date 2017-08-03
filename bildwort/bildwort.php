<?php 
	require '../dbconnect.php';
	$query = "select * from bildwort order by RAND() limit 5";


	$stmt = $dbh->query($query);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


	$fund = '';
	foreach ($result as $row) {
		$fund.="<img src='".$row['bild']."' width='450' height='300'> <br/>|".$row['wort']."|";
	}


	echo $fund;
	

?>