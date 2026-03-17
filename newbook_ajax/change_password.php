<?php
	require_once('includes/config.php');
	if(!isset($_SESSION['Auth']['id']))
	{
		header("Location: login.html");
		exit;
	}

	$errors = array();
	$users=new users;
	if(isset($_POST['opass']))
	{
			$condition ="password ='".md5($_POST['opass'])."'";
			
			$getdata = $users->select($users->table,'password',$condition);
			
			if(($getdata[0]['password'] == md5($_POST['opass'])) && ($_POST['npass']== $_POST['cpass']))
			{
				$_POST['password']= md5($_POST['npass']);
				if($users->save($users->table,$_POST,$condition))
       			 {
        			//$result = "successfully done";
					echo "true";
					exit;
        		}
				else
				{
				    //$result = "not done";
					echo "false";
				}
			//}
		}
	}	
?>

