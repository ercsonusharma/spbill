<?php
$usr=getdata('username');

?>
<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | Home</title>
<script src="../jquery.js" type="text/javascript"></script>
<script src="online/onlinejs.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    setInterval("var date=Date();$('#clock').text(date);",1000);
	$('#rem').slideDown(3000).delay(5000).slideUp(1000);
	
	$('#dis li:first').hover(function(){
	$('#hover').show();	
	},
	function(){
		$('#hover').hide();
		
	});
	$('#hover').mousemove(function(){$(this).show();}).mouseleave(function(){$(this).hide();});
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
#ppic
{
width:60px;
position:absolute;
left:250px;
top:220px;
border:5px black outset;
border-radius:10px;	
	
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
	position:relative;
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
#content #iinvite
{
position:relative;
bottom:170px;
left:120px;	
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
#move
{
margin-left:280px;
margin-top:-230px;	
}
#sidenav ul#dis 
{
margin-top:10px;
margin-left:-50px;	
}
#sidenav ul#dis li
{
list-style-type:none;
width:200px;
background:#FF0080;
	margin-top:3px;
}
#sidenav ul#dis  a
{
display:block;
width:200px;
height:40px;
padding-top:10px;
text-align:center;
}
#sidenav ul#hover 
{
	list-style-type:none;
	display:none;	
	position:absolute;
	top:310px;
	left:360px;
	background:#FF0080;
	width:150px;
	color:white;
	
}
#sidenav ul#hover a
{
	//border-top:1px black solid;
		color:white;
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
<div id="clock"></div>
<div id="header">
<img src="../split-bill-friends.png" alt="Image" id='heading'>
<span style='font-size:86px;'>S</span>plit Bill
</div>

<ul id="nav">
<li><a href="../index.php">Home</a></li>
<li><a href="../howitworks.php">How it Works</a></li>
<li><a href="../contact.php">Contact Us</a></li>
<li><a href="../about.php">About Us</a></li>
</ul>
<div id="logreg">
<a href="/new_sb/sbill/users?Username=<?php echo $usr;?>" >Hello, <?php echo getdata('firstname')." (".getdata('username').")"; ?></a></div>

<hr width="104%">
<div id="content">
<div id="mess">j</div>
<div id="sidenav">

<h1>Easily share bills with roommates and friends</h1>
<span style="font-size:20px">
Splitting bills can be tedious and awkward.<br> Let Split Bill do the math for you, and split bills with friends without any hassle.</span><br>
<span style="font-size:20px;font-weight:bold;color:green;margin-left:55%;">
And don't worry, it's completely free! Yeah!!!
</span> 

<ul id="dis">
<li><a href="#">Account &nbsp;&nbsp;<img src="fancy_nav_right.png" style="top:10px;" width="20"></a></li>
<li><a href="friends">Friends Zone</a></li>
<li><a href="monthly">Monthly Details</a></li>
<li><a href="gpay">Group Details</a></li>

<li><a href="../logout.php">Sign Out</a></li>
</ul>
<ul id="hover">
<ll>Balance: <?php $bud=getcal('balance');if(!(isset($bud))) echo 'Not Set';else echo " INR ".$bud; ?></li>
<li>Borrows: <?php ;if(!(isset($borrow))) echo ' NA';else echo " INR ".$borrow; ?></li>--------------------------
<br>
<li><a href="/new_sb/sbill/users?Username=<?php echo $usr;?>">Profile</a></li>
</ul>
</div>
<br><br>
<div id="move">
<img src="../participants.png" id="iinv" >
<div id='invite'>
<span style="font-size:20px;font-weight:bolder;">
We'll keep you updated and send friendly reminders
</span>
<br>
You can choose what kind of notifications you want, <br>and how often we should send friendly reminders to those <br>who haven't yet settled their debt.
</div>
<img src="../expenses.png" id="paisa">
<div id="iinvite">
<span style="font-size:20px;font-weight:bolder;">
Learn the easiest way to settle the bill
</span><br>

We'll do the math for you, and <br>calculate the easiest way to settle the bill  also for uneven and complex splits.
</div>

</div>
<div id="last">Now,You can also chat with the group members.So,Sign Up now!!!</div>
</div>
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