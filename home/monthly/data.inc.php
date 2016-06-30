<?php
$userid=$_COOKIE['userid'];
	$usr=getdata('username');
//header('Location:');	

if(isset($_POST['set']))
{
if(!empty($_POST['set']))
{
	$bud=mysql_real_escape_string($_POST['set']);
	
	$timesta=time();
	$check=getcal('balance');
	if(empty($check))
	{
		$daily=$bud/30;
	$query="INSERT INTO monthly set budget='$bud',daily='$daily',balance='$bud',userid='$userid',biltimest='$timesta'";
	if(mysql_query($query))
	{
	header('Location:.');	
	}}
	else
	{
		$newbud=getcal('balance')+$bud;
		$daily=$newbud/30;
		$query="update monthly set budget='$bud',daily='$daily',balance='$newbud',biltimest='$timesta' where userid='$userid'";
	if(mysql_query($query))
	{
	header('Location:.');	
	}
	}
	
}
else
?>
<h5 span style="position:absolute;left:330px;top:490px;color:red;font-size:30px;">Field is empty!!!</span></h5>
<?php
}

$x=false;
if(isset($_POST['res']))
{
$query="DELETE FROM monthly where userid='$userid'";
if(mysql_query($query))
{
header('Location:.');
}	
}
if(isset($_REQUEST['cont']))
{
	$currtime=time();
$query="update monthly set count='0',timest='0',biltimest='$currtime',budget='0' where userid='$userid'";
if(mysql_query($query))
{
header('Location:.');
}	
}
if(isset($_POST['bill']))
{
if(!empty($_POST['bill']))
{
	$newtimest=getcal('timest');
	$day=24*60*60;
	if(time()-$newtimest>$day)
	{
	$daily=getcal('daily');
	$balance=getcal('balance');
	$count=getcal('count');
	$bud=mysql_real_escape_string($_POST['bill']);
	if($bud>$daily)
	{
	//send mail	
	}
	$gap=((30)/(ceil((time()-getcal('biltimest'))/$day)));
	$newbud=$balance-$bud;
	$newdaily=$newbud/$gap;
	$count++;
	$timest=time();
	if($newdaily>=0&&$newbud>=0)
	{
	$query="update monthly set daily='$newdaily',balance='$newbud',count='$count',timest='$timest' where userid='$userid'";
	if(@mysql_query($query))
	{	
	header('Location:./');
	}
	}
	else
	{
		$x=true;
    $mess="You have crossed the allowance limit!";
	}
	}
	else
	{
	$mess="Bill for today has already been added!";
	}
$x=true;
}
else
{
	if($x)
$mess="Field is empty";
}}
?>


<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | Home</title>
<script src="../../jquery.js" type="text/javascript"></script>
<script src="../online/onlinejs.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    setInterval("var date=Date();$('#clock').text(date);",1000);
	//$('#rem').slideDown(3000).delay(5000).slideUp(1000);
	$('#dis li:first').hover(function(){
	$('#hover').show();	
	},
	function(){
		$('#hover').hide();
		
	});
	$('#hover').mousemove(function(){$(this).show();}).mouseleave(function(){$(this).hide();});
	$('#setnow').click(function(){
	$('#setform').show();	
	});
	$('#budamt').click(function(){
		var amont=$('#amount').val();
		if(jQuery.isNumeric(amont))
		{
			alert('Budget once set cannot be altered throughout the month!!!');
			var con=confirm('Do you want to continue');
			if(conf)
		return true;
		else
		return false;
		}
		else
		{
			$(':text').css('border-color','red');
			$('#error').css('color','red').html('Invalid amount');
		return false;
		
		
		}
		
		
		});
		
		$('#billamt').click(function(){
		var amont=$('#amount').val();
		if(jQuery.isNumeric(amont))
		{
			//alert('Budget once set cannot be altered throughout the month!!!');
			var con=confirm('Do you want to continue');
			if(conf)
		return true;
		else
		return false;
		}
		else
		{
			$(':text').css('border-color','red');
			$('#error').css('color','red').html('Invalid amount');
		return false;
		
		
		}
		
		
		});
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
	padding-bottom:40px;
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
#nav li a,#sidenav #dis li a
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
	padding-top:50px;
	//position:relative;
	//top:150px;
margin-left:200px;	

}
	h2
	{
		color:red;
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
#sidenav ul#dis 
{
margin-top:100px;
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
#content #right
{
	
margin:-290px 0 50px 380px;
font-size:16px;	
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
</style>
</head>
<body >
<div id="clock"></div>
<div id="header">
<img src="../../split-bill-friends.png" alt="Image" id='heading'>
<span style='font-size:86px;'>S</span>plit Bill
</div>

<ul id="nav">
<li><a href="../../index.php">Home</a></li>
<li><a href="../../howitworks.php">How it Works</a></li>
<li><a href="../../contact.php">Contact Us</a></li>
<li><a href="../../about.php">About Us</a></li>
</ul>
<div id="logreg">
<a href="/sbill/users?Username=<?php echo $usr;?>">Hello, <?php echo getdata('firstname')." (".getdata('username').")"; ?></a></div>

<hr width="104%">
<div id="content">
<div id="sidenav">
<img src="<?php echo $realphoto; ?>" id="ppic">
<ul id="dis"><span style="font-size:16px;">
You are here:
Home > Monthly</span>
<li><a href="#">Account &nbsp;&nbsp;<img src="fancy_nav_right.png" style="top:10px;" width="20"></a></li>
<li><a href="../friends">Friends Zone</a></li>
<li><a href="./">Monthly Details</a></li>
<li><a href="../gpay">Group Details</a></li>
<li><a href="../../logout.php">Sign Out</a></li>
</ul>
<ul id="hover">
<ll>Balance: <?php $bud=getcal('balance');if(!(isset($bud))) echo 'Not Set';else echo " INR ".$bud; ?></li>
<li>Borrows: <?php ;if(!(isset($borrow))) echo ' NA';else echo " INR ".$borrow; ?></li>--------------------------
<br>
<li><a href="/sbill/users?Username=<?php echo $usr;?>">Profile</a></li>
</ul>
</div>
<div id="right">
<?php $bud=getcal('budget');if(!(isset($bud))||(!$bud)) { ?>
<p style="color:red"><h2>
Hey,You have not set your monthly budget yet.....</h2>
If  (It's your first time and unable to understand anything),<br>Then, Click on How it Works link at the top...<br>
else<br>
Click the button below to set Monthly budget right now!!!
</p>
<input type="button" value="Set Now" id="setnow">
<br>
<form action="" method="post" style="display:none;" id="setform">
<br>
Enter the budget amount:
<input type="text" name="set" placeholder="Amount in Rs.Here" id="amount"/>
<input type="submit" value="Go" id="budamt">
</form>
<div id="error"></div>
<?php } else if(getcal('biltimest')>=(time()-(30*24*60*60)))
{
?> 
<h2>
Hey,Your monthly account details are as follows:</h2>
<p style="color:green">
Monthly allowance :INR <?php echo getcal('budget');?><br>
Balance amount:INR<?php echo getcal('balance'); ?>
<br>
Allowance for next day:INR<?php echo getcal('daily'); ?><br><br>
If (you have not set your today's bill)<br>
Then, go ahead and set it by clicking on the button below
</p>
<input type="button" value="Add Bill" id="setnow">
<br>
<form action="" method="post" style="display:none;" id="setform">
<br>
Enter the bill amount:
<input type="text" name="bill" placeholder="Amount in Rs.Here" id="amount"/>
<input type="submit" value="Go" id="billamt">
</form>
<div id="error" style="color:red;"><?php if(isset($mess)) echo $mess; ?></div>

<?php } if(getcal('biltimest')<=(time()-(30*24*60*60)))
{
	?><br>
    It's time to update your monthly allowance!!!<br>
    <span style="color:red;font-weight:bold;">Do you want to reset budget without adding it further?</span>
<form action="" method="post" id="reset">

<input type="radio" value="Reset" name="res">Reset&nbsp;&nbsp;OR&nbsp;<input type="radio" value="Continue" name="cont"> Continue<br> 
<input type="submit" value="Submit">

</form>
</div>
    
    <?php  }?>
</div>
</div>
<div id="footer">
<hr width="105%">
&copy;Copyright 2015  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Rights Reserved  Feel free to contact us!!!
<br>Your IP:<?php if(isset($forip))
echo $forip.',';
echo $remote;
?>
Total Hits:
</div>
</body>
</html>