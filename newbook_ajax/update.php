<?php
require_once('includes/config.php');
if(!isset($_SESSION['Auth']['id']))
{
	header("Location: login.html");
	exit;
}

	$guests = new guests;
	if(isset($_POST['update']))
  	{
	 $errors = $guests->validate();
		 if(isset($_POST['hobbies']))
				$_POST['hobbies'] = implode(', ',$_POST['hobbies']);

			
			  $_POST['modified'] = date('Y-m-d h:m:s');
			if($guests->save($guests->table,$_POST,"id=".$_POST['getid']))
		    {
				header("Location: guests.html");
				
			}
  }
  
  ?>