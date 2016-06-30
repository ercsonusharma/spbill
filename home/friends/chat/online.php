<?php

include 'db_connect.inc.php';
include 'main.inc.php';
session_start();
function check_exist($userid)
{
$query="Select count(*) from online where userid=$userid";
if($doquery=mysql_query($query))
{
	$arr=mysql_fetch_assoc($doquery);
	//echo 'rows'.$arr;
	if($arr['count(*)'])
	return true;
	else
	return false;
}}
function delete_user($userid)
{
	$query="Delete from online where userid=$userid";
	if(mysql_query($query))
	{	//done
	}
}
function add_user($userid)
{
	$query="insert into online set userid=$userid";
	if(mysql_query($query))
	{	//done
	}
}

if(isset($_POST['status']))
{
	
	if($_POST['status']=='winopen')
	{
		
if(isset($_COOKIE['userid']))
{

		if(!(isset($_SESSION['chat'])))
		{
			
	$_SESSION['chat']=$_COOKIE['userid'];
	
		}
	$userid=$_SESSION['chat'];
	if(!(check_exist($userid)))
	{
		add_user($userid);
		//echo 'added';	
	}
}
else
{
	if((isset($_SESSION['chat'])))
		{
			if(check_exist($_SESSION['chat']))
		{
	delete_user($_SESSION['chat']);
	
	//echo 'deleted';
	session_destroy();
	
		}
		}
}
	}
	
	
	
	
	
	
	
	if($_POST['status']=='winclose')
	{
		$userid=$_SESSION['chat'];
		if(isset($userid))
		{
		if(check_exist($userid))
		{
	delete_user($userid);
	//echo 'deleted';
	session_destroy();
		}
	}
	}
	
	if($_POST['status']=='list')
	{
		$query="Select userid from online";
		if($doq=mysql_query($query))
		{
		$usersno=mysql_num_rows($doq);
		echo "<span style='color:green;font-weight:bold;'>Total Online:".$usersno."</span>";
		while($arr=mysql_fetch_array($doq))	
			{
				$usid=$arr['userid'];
				echo '<li value='.$usid.'>'.globe('firstname','login','id',$arr['userid'])." ".globe('lastname','login','id',$arr['userid'])."</li>";
			}
		}
	}
	
}

?>