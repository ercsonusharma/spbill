<?php
include '../db_connect.inc.php';
include 'main.inc.php';
if(loggedin())
{
	
	if(isset($_GET['Username']))
	{
	$uname=mysql_real_escape_string($_GET['Username']);
	$exist=globe('id','login','username',$uname);
	}
	if(isset($uname)&&isset($exist))
include 'data.inc.php';
else if(isset($_GET['edit']))
include 'edit.inc.php';
else
header('Location:/new_sb/sbill/error');
//	header('Location:home');
}
else if(!loggedin())
{
	if(isset($_GET['Username']))
	$user=$_GET['Username'];
//	echo $user;
//header('Location:./logreg.php?Username='.$user.'');
include "logreg.inc.php";
}
else
header('Location:/new_sb/sbill/error');
?>
