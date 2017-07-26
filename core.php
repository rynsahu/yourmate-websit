<?php
ob_start();
session_start();
$current_file= $_SERVER['SCRIPT_NAME'];

function loggedin()
{
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function getuseridfield($field)
{require 'dbConnect.php';

	$query="SELECT `$field` FROM `user_admin` WHERE `id`='".$_SESSION['user_id']."'";
	if($query_run = mysqli_query($connect_db,$query))
	{
		if($query_result= mysqli_result($query_run,0,$field))
		{
			return $query_result;
		}
	}
}
?>