<?php
include 'db_connect.inc.php';
if(isset($_POST['uname']))
{
	$temp=htmlspecialchars($_POST['uname']);
	
	$query="Select username,firstname,lastname from login where username like '%$temp%'";
	if($doquery=mysql_query($query))
	{
		$no=mysql_num_rows($doquery);
		if($no)
		{
		echo "<span style='padding-left:20%;font-weight:bold;'>Suggestions Retrieved....</span><hr>";	
		}
		else
		{
			echo "<span style='padding-left:20%;font-weight:bold;'>Sorry!!Nothing found....</span><hr>";
			
		}
		while($arr=mysql_fetch_array($doquery))
		{
			echo "<li>".$arr['username']." (".$arr['firstname']." ".$arr['lastname'].")</li>";	
		}
		
	}
}
?>