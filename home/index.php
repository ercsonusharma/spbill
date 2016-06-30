
<?php
include '../db_connect.inc.php';
include 'main.inc.php';
if(loggedin())
{
	
	include 'data.inc.php';
}
else
header('Location:../');
?>
