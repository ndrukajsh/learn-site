<?php

	// $DB_HOST = 'bigshopal.ipagemysql.com';
	// $DB_USER = 'langbook';
	// $DB_PASS = '1Schueler!';
	// $DB_NAME = 'test1';

	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = '';
	$DB_NAME = 'test1';
	
	try{
		$dbh = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}	
	
	
?> 