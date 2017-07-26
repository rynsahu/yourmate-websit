<?php
require 'core.php';
require 'dbConnect.php';
require 'login_form.php';

if(!loggedin())
{
 include 'login.html';
} 
else
{
	include 'user_home.html';
}	

?>