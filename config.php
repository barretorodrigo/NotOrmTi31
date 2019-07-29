<?php 
	
	include_once "NotORM.php";

	$pdo = new PDO("mysql:host=localhost;dbname=censo", "root", "");
	$db = new NotORM($pdo);

 ?>