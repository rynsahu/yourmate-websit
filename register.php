<?php
require 'core.php';

if(!loggedin())
{
	if(isset($_POST['f_name']) && isset($_POST['l_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password']) && isset($_POST['select_month']) && isset($_POST['select_day']) && isset($_POST['select_year']) && isset($_POST['sex']))
	{
	    $firstname   = $_POST['f_name'];
		$lastname    = $_POST['l_name'];
		$email       = $_POST['email'];
		$password    = $_POST['password'];
		$re_password = $_POST['re_password'];
		$mounth      = $_POST['select_month'];
		$day         = $_POST['select_day'];
		$year        = $_POST['select_year'];
		$sex         = $_POST['sex'];
		
		if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($re_password) && !empty($month ) && !empty($day) && !empty($year) && !empty($sex))
		{
			echo "OK";
		}
		else
		{
			echo "All fields are required";
		}
	}
}
else if(loggedin())
{
	echo 'you\'re alresdy registered and Log In.';
}
 
?>