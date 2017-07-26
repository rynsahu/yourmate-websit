<?php
require 'core.php';


if(!loggedin())	
	{ require 'dbConnect.php';

		$firstname    = $_POST['f_name'];
		$lastname     = $_POST['l_name'];
		$email        = $_POST['email'];
		$password     = $_POST['password'];
		$re_password  = $_POST['re_password'];
		$password_hash= md5($password);
		$month        = $_POST['select_month'];
		$day          = $_POST['select_day'];
		$year         = $_POST['select_year'];
		
		if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($re_password) && !empty($month ) && !empty($day))
		{
			if ($password!=$re_password)
			{
				echo '<p style="color:black;">Password do not match.</p>';
			}
			else
			{
				$query = "SELECT `email` FROM `user_admin` WHERE `email`='$email'";
				$query_run = mysqli_query($connect_db,$query);
				
				if(mysqli_num_rows($query_run)==1)
				{
					echo '<p style="color:black;">You\'re alredy registered '.$firstname.' '.$lastname.'.<br> Please <a href="login.html" style="color:#49F9E3;"> Log In</a></p>';
					
				}
				else
				{
					$query = "INSERT INTO `user_admin` VALUES('','".mysqli_real_escape_string($connect_db,$email)."','".mysqli_real_escape_string($connect_db,$password_hash)."','".mysqli_real_escape_string($connect_db,$firstname)."','".mysqli_real_escape_string($connect_db,$lastname)."','".mysqli_real_escape_string($connect_db,$month)."','".mysqli_real_escape_string($connect_db,$day)."')";
		            if($query_run = mysqli_query($connect_db,$query))
					{
						header ('Location: register_success.php');
					}
					else
					{
						echo '<p style="color:#FF5733;">Sorry, we couldn\'t register you at this time. Try again later.</p>';
					}
         		}	
			}
		}
		else
		{
			echo '<p style="color:black;">All fields are required.</p>';
			
		}
		require 'signup.html';
				
	}
else if(loggedin())
{
	echo 'you\'re alresdy registered and Log In.';
}
