<?php
define('HTTP_DOMAIN','http://localhost/projectajax/');
define('FTP_DOMAIN','F:/xampp/htdocs/projectajax/');

define('FTP_AVATAR_DIR','images/Avatar/');
define('HTTP_AVATAR_DIR',HTTP_DOMAIN.'images/Avatar/');

require_once('models/db.php');
require_once('includes/database.php');
session_name('Auth');
session_start();
?>