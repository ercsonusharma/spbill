<?php
$servername='localhost';
$password='toor';
$username='root';
$db_name='test';
//mysql command to connect to the server
$link=mysql_connect($servername,$username,$password);
if(!$link)
die('Connection Failed');
if(!mysql_set_charset('utf8'))
die('Error!!!');
if(!mysql_select_db($db_name))
die('Error!!!');


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
?>