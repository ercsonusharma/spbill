

<?php
include 'db_connect.inc.php';
if(isset($_POST['email']))
{
	
	$email=htmlentities($_POST['email']);
	if(!empty($email))
	{
	if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
	{
		echo 'Oops!Invalid Email-address..';
	}
	else
	echo "<span style='color:green'>That's a Valid Email Address!</span>";	
	}
}

if(isset($_POST['uname']))
{
	
	$uname=htmlentities($_POST['uname']);
	 $query="Select count(*) from login where username='$uname'";
	 $quer=mysql_query($query);
	 $res=mysql_result($quer,0);
	 if($res)
	 echo 'Oops!Username already exists...Try another';
	 else
	 echo  "<span style='color:green'>Username available!</span>";

}

?>