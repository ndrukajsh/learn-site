<?php 
	require '../dbconnect.php';
	$query = "select * from wortanpassung order by RAND() limit 5";


	$stmt = $dbh->query($query);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


	$fund = '';
	foreach ($result as $row) {
		$fund.=$row['wort']."|";
	}


	echo $fund;
	

?>