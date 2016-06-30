
<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | Users-<?php echo $user; ?></title>
<script src="../jquery.js" type="text/javascript"></script>
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
	margin-bottom:60px;
	//position:relative;
	//top:-80px;
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
img#ppic
{
width:110px;	
//margin-left:40%;
display:inline;
}

#pdetails
{
margin-left:34%;
margin-top:20px;	
}
label.fleft
{
display:block;
	float:left;
	width:200px;
	
}
.lright
{
display:inline;
margin-top:8px;
	
}
.block
{
margin-top:14px;	
	
}
</style>
</head>
<body >
<div id="rem" style="">Hey!We see, You're not logged in.<br>Please login or Sign up Now!!!<br>-------------</div>
<div id="clock"></div>
<div id="header">
<img src="../split-bill-friends.png" alt="Image" id='heading'>
<span style='font-size:86px;'>S</span>plit Bill
</div>

<ul id="nav">
<li><a href="../index.php">Home</a></li>
<li><a href="howitworks.php">How it Works</a></li>
<li><a href="contact.php">Contact Us</a></li>
<li><a href="about.php">About Us</a></li>
</ul>
<div id="logreg"><a href="../signin.php"> Login or Register</a>
</div>

<hr width="104%">
<div id="content">


<?php

if(isset($_GET['Username']))
{
if(!empty($_GET['Username']))
{
	$real=htmlspecialchars($_GET['Username'],ENT_QUOTES,'utf-8');
	$getid=globe('id','login','username',$real);
	if(isset($getid)&&(!empty($getid)))
	{
$fname=globe('firstname','login','username',$real);
$lname=globe('lastname','login','username',$real);
$email=globe('email','login','username',$real);
$htown=globe('htown','login','username',$real);
$ccity=globe('ccity','login','username',$real);
$cnum=globe('cnumber','login','username',$real);


$real1=globe('id','login','username',$real);
$photo1="./photos/$real1.png";
$photo2="./photos/$real1.jpeg";

if(file_exists($photo1))
$realphoto=$photo1;
else if(file_exists($photo2))
$realphoto=$photo2;
else
$realphoto="photos/default.svg";
?>	
<div id="pdetails">

    <img src="<?php echo $realphoto; ?>" id="ppic" alt="Image">
    
    <h2 style="margin-left:135px;margin-top:-50px;"> <?php echo "$fname $lname"; ?> </h2>
    <hr>
     
    <div class="block">

    <label class="fleft">
    Username: </label> <div class="lright"> <?php echo $real; ?></div>
    </div>
       
    <div class="block">

    <label class="fleft">
    E-mail Address: </label><div class="lright"> <?php echo $email; ?></div>
   </div>
   <div class="block">
    <label class="fleft">
    Facebook id: </label> <div class="lright"> <?php if(isset($fb)&&(!empty($fb))) echo $fb; else echo '-'; ?></div>
    </div>
   
       <div class="block">
    <label class="fleft">
    Hometown: </label> <div class="lright"> <?php if(isset($htown)&&(!empty($htown))) echo $htown; else echo '-'; ?></div>
    </div>
       
    <div class="block">
    <label class="fleft">
    Current City: </label> <div class="lright"> <?php if(isset($ccity)&&(!empty($ccity))) echo $ccity;else echo '-'; ?></div>
    </div>
       
    <div class="block">
    <label class="fleft">
    Contact Number: </label><div class="lright"> <?php if(isset($cnum)&&(!empty($cnum))) echo $cnum;else echo '-'; ?></div>
    <br>
    </div>
    </div>
    
    
    
	<?php
}
else
{
	
?>
<h2 style="mar<gin-left:150px;color:red;">OOPS!!!No such user exists.....</h2>
<script type="text/javascript">
alert('No such user exist!!!');

</script>

<?php	
	
}
}
else
{
?>
<h2 style="mar<gin-left:150px;color:red;">OOPS!!!No such user exists.....</h2>

<?php	
}
}
else
{
header('Location:../error');
}

?>

<br><br>
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














