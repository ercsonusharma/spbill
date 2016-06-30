<?php
if(isset($_SERVER['HTTP_CLIENT_IP']))
$clientip=$_SERVER['HTTP_CLIENT_IP'];
if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
$forip=$_SERVER['HTTP_X_FORWARDED_FOR'];
if(isset($_SERVER['REMOTE_ADDR']))
$remote=$_SERVER['REMOTE_ADDR'];
//ob_start();
$ret=$_SERVER['SCRIPT_NAME'];
//session_start();
function loggedin()
{
//	session_start();
if(isset($_COOKIE['userid'])&&(!empty($_COOKIE['userid'])))
{
//	echo $_SESSION['userid'];
return true;
}
else
 return false;
}



function getdata($data)
{
	$user_id=$_COOKIE['userid'];
$query="Select $data from login where id=$user_id";	
	if($query_st=mysql_query($query))
	{
	return mysql_result($query_st,0,$data);	
	}
}
function getcal($data)
{
	$user_id=$_COOKIE['userid'];
$query="Select $data from monthly where userid=$user_id";	
	if($query_st=mysql_query($query))
	{
	return mysql_result($query_st,0,$data);	
	}
	
}
function globe($data,$db,$hint,$hintcont)
{
$query="SELECT $data from $db where $hint='$hintcont'";	
	if($q_st=mysql_query($query))
	{
	if($arr=mysql_fetch_array($q_st))	
		return $arr[$data];
	}
}
function updatedata($old,$new)
{
	$user_id=$_COOKIE['userid'];
	$query="UPDATE login set $old='$new' where id=$user_id";
	if(mysql_query($query))
	{
	return;	
	}
}



?>