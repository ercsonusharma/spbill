
<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | Chat Box</title>
<script src="../../../jquery.js" type="text/javascript"></script>
<script src="./onlinejs.js" type="text/javascript"></script>
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
	
	var val=0;
	$('#online').click(function(){
	var val=$(this).find('li').val();
		
		});
		
		
					
	
});

</script>
<style type="text/css">
.noclass
{
	
display:inline;

	
}
.open 
{

}
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
#nav li a,#sidenav li a
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
	margin-top:25%;
	border-top:1px black outset;
	//position:relative;
	//top:-80px;
padding-left:200px;	
padding-bottom:50px;	


}
	h1
	{
		text-align:center;
		text-transform:capitalize;
		text-decoration:underline;
	}

a
{
	text-decoration:none;
	display:block;
	width:100%;
	
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
	
margin-left:55%;
	
}
#move
{
margin-left:280px;
margin-top:-230px;	
}
#sidenav ul#dis 
{
	position:absolute;
margin-top:95px;
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
	top:210px;
	left:340px;
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

#rightcontent
{
margin-left:50%;
padding-top:5%;	
}
#midcontent
{
	position:absolute;
	left:30%;
	top:52%;
	width:16%;
	height:30%;
	overflow-y:scroll;
		border-left:3px inset #FF5FFF;
}

ul#online li
{
background:#24FF24;
list-style:none;
height:30px;
padding-top:15px;
padding-left:15px;
margin-left:-40px;
padding-bottom:10px;
border-bottom:1px solid black;	
cursor:pointer;
}

#mess
{
color:red;
font-size:16px;
display:inline;
margin-left:30px;
}
#ppic
{
width:60px;
position:absolute;
left:230px;
top:200px;
border:5px black outset;
border-radius:10px;	
	
}
.left
{
display:inline-block;
width:29%;	
}
.right
{
	
}
.mname
{
display:block;
margin-top:20px;
margin-left:25%;
background:#09FF46;
width:75%;
height:32px;
padding-top:10px;
text-align:center;	
}
.owelist li
{
margin-top:1%;
list-style-type:square;
}
.owelist a
{
display:inline;	
}
.owelist
{
	margin-left:25%;

	margin-top:0;
	background:#F3F3F3;
}
.mid
{
	display:block;
padding-left:35%;
width:60%;
border-bottom:1px black outset;
	
}
#searchbox
{
	display:none;
width:70%;
height:250px;
margin-left:10%;
overflow-y:scroll;
	overflow-x:hidden;
	white-space:pre-wrap;
	background:#FFBFFF;
	padding-left:5%;
	padding-right:5%;
}
ul#suggest
{
	margin-top:-10px;

}
ul#suggest li
{
list-style-type:none;
display:block;
margin-top:2%;
height:40px;
text-align:center;
padding-top:10px;
background:#A0A0A4;	

}
</style>
</head>
<body >
<div id="clock">Current-Time and Date:</div>
<div id="header">
<img src="../../../split-bill-friends.png" alt="Image" id='heading'>
<span style='font-size:86px;'>S</span>plit Bill
</div>

<ul id="nav">
<li><a href="../index.php">Home</a></li>
<li><a href="../../howitworks.php">How it Works</a></li>
<li><a href="../../contact.php">Contact Us</a></li>
<li><a href="../../about.php">About Us</a></li>
</ul>
<div id="logreg">
<a href="/new_sb/sbill/users?Username=<?php echo getadmin($userid);?>" >Hello, <?php echo getdata('firstname')." (".getdata('username').")"; ?></a></div>

<hr width="104%">
<div id="content">

<div id="sidenav">
<img src="<?php echo $realphoto; ?>" id="ppic">
<ul id="dis">
<li><a href="#">Account &nbsp;&nbsp;<img src="../../fancy_nav_right.png" style="top:10px;" width="20"></a></li>
<li><a href="../friends">Friends Zone</a></li>
<li><a href="../monthly">Monthly Details</a></li>
<li><a href="./">Group Details</a></li>
<li><a href="../../logout.php">Sign Out</a></li>
</ul>
<ul id="hover">
<ll>Balance: <?php $bud=getcal('balance');if(!(isset($bud))) echo 'Not Set';else echo " INR ".$bud; ?></li>
<li>Borrows: <?php ;if(!(isset($borrow))) echo ' NA';else echo " INR ".$borrow; ?></li>--------------------------
<br>
<li><a href="/new_sb/sbill/users?Username=<?php echo getadmin($userid);?>">Profile</a></li>
</ul>
</div>
<h4 style="position:absolute;left:30.5%;
	top:45.5%;
	width:16%;
	height:30%;"><u><b>Who is online</b></u></h4>
<div id="midcontent">
<ul id="online">
<h3>
Processing......<br>
Please Wait......
</h3>
</ul>
</div>


<div id="rightcontent">

<div id="mess"><?php if(isset($error)) echo $error; ?></div>
<h3 style="margin-left:20%;text-decoration:underline;">Chat Box</h3>
<hr>


</div>

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


