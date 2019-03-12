<?php
 
$server = "veraexchange.com";
$user_db = "veraexch_midnight";
$pass_db = "2789206a";
$base_db = "veraexch_cinemabd";
$mysqli = new mysqli($server, $user_db, $pass_db, $base_db);
if(mysqli_connect_errno()){
	printf("Сервер базы данных не доступен. Код ошибки: %s\n", mysqli_connect_error());
	exit;
}
?>

