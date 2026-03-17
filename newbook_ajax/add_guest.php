<?php
require_once('includes/config.php');
$errors = array();
$guests=new guests;
if(!isset($_SESSION['Auth']['id']))
{
	header("Location: login.html");
	exit;
}
if(isset($_POST['name']))
{
	$errors = $guests->validate();
	if(!count($errors))
	{
		  	if($_FILES['avatar']['error'] == 0)
			{
				$src = $_FILES['avatar']['tmp_name'];
				$dest = FTP_AVATAR_DIR.$_FILES['avatar']['name'];
				if(move_uploaded_file($src, $dest))
				{
					$_POST['avatar'] = $_FILES['avatar']['name']; 
				}
			  }
		  $_POST['user_id'] = $_SESSION['Auth']['id']; 
		  
		  $_POST['created'] = date('Y-m-d h:m:s');
			if($guests->save($guests->table,$_POST))
		    {
				header("location: guests.html");exit;
				// echo "true";
			}
			else
			{

				header("location: add_guest.html");exit;
				// echo "false";
			}
	  
	}
	else
	{	
		
	header("location: add_guest.html");exit;
	}
}
?>