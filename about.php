<?php include 'db_connect.inc.php';
include 'main.inc.php'; ?>
<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | About Us</title>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    setInterval("var date=Date();$('#clock').text(date);",1000);
	$('#rem').slideDown(3000).delay(5000).slideUp(1000);
});


</script>
<style type="text/css">

#rem
{
position:fixed;
display:none;width:40%;background:#808080;margin-left:13%;text-align:center;
border-bottom:1px #D45F00 solid;
color:white;
margin-top:0;
margin-top:-8px;
}
body
{
	border-left:1px #A0A0A4 outset;
	padding-right:40px;
	border-right:1px #A0A0A4 outset;
	border-radius:5px;
	font-size:17px;
	
	margin-left:130px;
	//background-size:80%;
	
	width:990px;
}
#content
{
padding:0 0 0 50px;	
margin:0;
//padding-left:250px;
}
#header
{
font-size:72px;
background:#FFBF00;
width:99%;
padding-left:50px;
font-weight:500;
letter-spacing:8px;
}

#nav
{

background:#A0A0A4;
width:72.6%;
margin-top:2px;
}
#nav li
{
list-style-type:none;
background:navy;
display:inline-block;
width:170px;
height:30px;
border-right:5px white solid;
text-align:center;
	
}
li a
{text-decoration:none;
color:white;
display:block;
width:100%;
}


#header img
{
height:90px;
width:150px;
border-radius:10px;
margin-top:10px;	
}

#footer
{
	padding-bottom:20px;
	//position:relative;
	top:-80px;
padding-left:200px;	

}
	h1
	{
		text-align:center;
		text-transform:capitalize;
		text-decoration:underline;
	}
#content #invite
{
position:relative;
bottom:80px;
left:120px;	
}
#content #details
{
margin-left:250px;
font-family:Verdana, Geneva, sans-serif;
font-size:16px;
}
#content #iinv
{
width:110px;	
}
#content #paisa
{
width:100px;
position:relative;
bottom:60px;
height:140px;	
}

a
{
	text-decoration:none;
}
#logreg
{
margin:-4.5% 0 0 78%;
background:#E9E9E9;
width:23%;
height:26px;
border-radius:10px;
text-align:center;	
}
#clock
{
	
margin-left:57%;
	
}
#last
{
	position:relative;
bottom:120px;	
color:green;
font-size:20px;
border-bottom:1px #A0A0A4 solid;
}
</style>
</head>
<body >
<?php if(!loggedin()){ ?>
<div id="rem" style="">Hey!We see, You're not logged in.<br>Please login or Sign up Now!!!<br>-------------</div>
<?php } ?>
<div id="clock"></div>
<div id="header">
<img src="split-bill-friends.png" alt="Image" id='heading'>
<span style='font-size:86px;'>S</span>plit Bill
</div>

<ul id="nav">
<li><a href="index.php">Home</a></li>
<li><a href="howitworks.php">How it Works</a></li>
<li><a href="contact.php">Contact Us</a></li>
<li><a href="about.php">About Us</a></li>
</ul>
<div id="logreg">
<?php if(!loggedin()){ ?>
<a href="signin.php" >Login or SignUp</a>
<?php }else { ?>

<a href="/new_sb/sbill/users?Username=<?php echo $usr;?>" >Hello, <?php echo getdata('firstname')." (".getdata('username').")"; ?></a>
<?php } ?>

</div>
<hr width="104%">
<div id="content">
<h2 style="text-decoration:underline;text-align:center;">About Us</h2>
<div id="details">
Sonu Kumar Sharma<br>
Bachelor of Technology,<br>
Computer Science And Technology,<br>
MNNIT - Allahabad
</div>
</div>
<hr>
<div id="footer">
&copy;Copyright 2015  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Rights Reserved  Feel free to contact us!!!
<br>Your IP:<?php if(isset($forip))
echo $forip.',';
echo $remote;
?>
Total Hits:
</div>
</body>
</html>