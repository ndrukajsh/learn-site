<?php
	require '../dbconnect.php';
	$query = "select * from uhr_tabelle order by RAND() limit 5";


	$stmt = $dbh->query($query);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


	$end = '';
	foreach ($result as $row) {
		$end.="<img class='center-block' src='".$row['uhr_bild']."' width='250' height='250'> <br/>|".$row['wrong']."|".$row['righ']."$";
	}


	echo $end;


?>
