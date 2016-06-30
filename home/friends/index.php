<?php
include '../../db_connect.inc.php';
include 'main.inc.php';
if(loggedin())
{
	if(isset($_GET['id']))
	$confid=htmlentities($_GET['id']);
	$userid=$_COOKIE['userid'];
	include 'data.inc.php';
}
else
header('Location:../../');
?>


