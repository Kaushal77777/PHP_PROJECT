<?php
session_start();
try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=mydairy','root','');
	//echo "Connection is established...<br/>";
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//PDO::ATTR_ERRMODE: for Error reporting
	//PDO::ERRMODE_EXCEPTION for Error handling and exception
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>