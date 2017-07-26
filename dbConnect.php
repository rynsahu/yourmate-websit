<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';

$mysql_db='users';
$connect_db=mysqli_connect($mysql_host, $mysql_user, $mysql_pass);

if(!$connect_db || !mysqli_select_db($connect_db, $mysql_db))
  {
	die('Database not connected.<br> Try letter.');
  }

?>