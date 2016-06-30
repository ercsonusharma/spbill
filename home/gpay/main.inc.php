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
if(isset($_COOKIE['userid'])||(!empty($_COOKIE['userid'])))
{
//	echo $_SESSION['userid'];

return true;
}
else
 return false;
}



$userid=$_COOKIE['userid'];
//global $userid;
//echo $userid;
$photo1="../../users/photos/$userid.png";
$photo2="../../users/photos/$userid.jpeg";

if(file_exists($photo1))
$realphoto=$photo1;
else if(file_exists($photo2))
$realphoto=$photo2;
else
$realphoto="/new_sb/sbill/users/photos/default.svg";


//Borrow
//Borrow
$q="Select sum(owe) as owen from getowe where userid=$userid";
$quer=mysql_query($q);
if($arr=mysql_fetch_array($quer))
	$borrow=$arr['owen'];
	

function globe($output,$dbname,$hinttype,$hint)
{
	$query="Select $output from $dbname where $hinttype='$hint'";	
	if($query_st=mysql_query($query))
	{
if($arr=mysql_fetch_array($query_st))
{
return $arr[$output];	
}
	}
	
}
function globetwo($output,$dbname,$hinttype,$hint,$hinttype2,$hint2)
{
	$query="Select $output from $dbname where $hinttype='$hint' and $hinttype2='$hint2'";	
	if($query_st=mysql_query($query))
	{
	if($arr=mysql_fetch_array($query_st))
	return $arr[$output];	
	}
	
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
		$arr=mysql_fetch_array($query_st);
		return $arr[$data];
	}
}
function getadmin($data)
{
$query="Select username from login where id=$data";	
	if($query_st=mysql_query($query))
	{
	if($arr=mysql_fetch_array($query_st))
	return $arr['username'];	
	}
}
?>
