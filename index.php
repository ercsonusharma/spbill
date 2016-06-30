<?php

include 'main.inc.php';
require 'db_connect.inc.php';

if(loggedin()==true)
{
	header('Location:home');
}
else
{
include 'logreg.inc.php';	
}

?>
