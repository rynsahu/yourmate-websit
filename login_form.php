<?php

function mysqli_result($res, $row, $field=0) 
  { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array(); 
    return $datarow[$field]; 
  }
/*----------------------------------------------------------------*/

if(isset($_POST['email']) && isset($_POST['password']))
  {
	$email        = $_POST['email'];
	$password     = $_POST['password'];
	$password_hash= md5($password);
	
	if(!empty($email) && !empty($password))
      {
		$query= "SELECT `id` FROM `user_admin` WHERE `email`='$email' AND `password`='$password_hash'";
         
        if($query_run= mysqli_query($connect_db,$query))
		  {
			$query_num_rows= mysqli_num_rows($query_run);
			if($query_num_rows== 0)
			  { 
				echo '<p style="color:#FF5733;">Invalid Email/Passaword.</p>';
			  }
			else if($query_num_rows== 1)
			  {
				$user_id= mysqli_result($query_run, 0, 'id');
			    $_SESSION['user_id']= $user_id;
				header('Location: loginRec.php');
		      }
	      }			
	  }
	 else 
	  {
	   echo '<p style="color:#FF5733;">you must supply a email and password.</p>';
	  }
  }

?>