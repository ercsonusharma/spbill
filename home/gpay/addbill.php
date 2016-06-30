<?php
include '../../db_connect.inc.php';
include 'main.inc.php';

if(loggedin())
{
	$groupid=htmlentities(($_GET['gid']));
	$check=globe('groupname','gname','id',$groupid);
	if($check)
	{
	$user_id=$_COOKIE['userid'];
	include 'addbilldata.inc.php';
	}
	else
header('Location:./');
}
else
header('Location:../../');


?>