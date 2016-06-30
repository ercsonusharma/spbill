<?php
include '../../db_connect.inc.php';
include 'main.inc.php';
if(loggedin())
{
	$userid=$_COOKIE['userid'];
	include 'data.inc.php';
}
else
header('Location:../../');
?>


