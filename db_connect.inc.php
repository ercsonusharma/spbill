<?php
$servername='localhost';
$password='';
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


?>