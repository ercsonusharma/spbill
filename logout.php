<?php
//unset($_COOKIE['userid']);
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
$userid=$_COOKIE['userid'];
		if(isset($userid))
		{
		if(check_exist($userid))
		{
	delete_user($userid);
	
		}
		}
setcookie('userid',0,time()-3600);
header('Location:/new_sb/sbill/');

?>