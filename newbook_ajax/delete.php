<?php
require_once('includes/config.php');
if(!isset($_SESSION['Auth']['id']))
{
	header("Location: index.html");
	exit;
}
$guests = new guests;
$row = $guests->select($guests->table,array('avatar'),"id=".$_GET['id']);
   
  if($guests->delete($guests->table,"id=".$_GET['id']))
  {
	  unlink(FTP_AVATAR_DIR.$row[0]['avatar']);
	  $_SESSION['message'] = "Guest Deleted Successfully";
	  header("Location: guests.html");
	  exit;
  }
?>
