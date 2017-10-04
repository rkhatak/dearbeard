<?php
session_start();
require('config.php');
require('session.php');
if(isset($_SESSION['uname']))
{
	session_destroy();
	header('Location:index.php');
}

?>