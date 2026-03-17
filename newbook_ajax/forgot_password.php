<?php
require_once('includes/config.php');
if(isset($_POST['email']))
{
	$users = new users;
	$errors = $users->validate_forgot();
	//print_r($errors);
	//exit;
	if(!count($errors))
	{
	$condition= "email='".$_POST['email']."'";
	$check = $users->select($users->table,'',$condition);
 		 
 		if(!count($check))
 		{
 			echo 0;exit;
 		}
 		else
 		{
 			$password = rand();
			$_POST['password'] = md5($password);
			$_POST['modified'] = date('Y-m-d h:m:s');
			//echo($_POST);exit;
			if($users->save($users->table,$_POST,$condition))
			{
				echo $password;exit;
			}
			else
			{
				echo 0;exit;
			}
 		}
 	}
}
?>

       
             
