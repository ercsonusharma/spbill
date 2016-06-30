<?php
//Borrow
$userid=$_COOKIE['userid'];
$q="Select sum(owe) as owen from getowe where userid=$userid";
$quer=mysql_query($q);
if($arr=mysql_fetch_array($quer))
	$borrow=$arr['owen'];
if(isset($_POST['update']))
{
	
if(isset($_POST['email'])&&(!empty($_POST['email'])))
{	
	$email=mysql_escape_string($_POST['email']);
	$email2=getdata('email');
	if($email!=$email2)
updatedata('email',$email);
}
if(isset($_POST['fname'])&&(!empty($_POST['fname'])))
{	
	$email=mysql_escape_string($_POST['fname']);
	$email2=getdata('firstname');
	if($email!=$email2)
updatedata('firstname',$email);
}
if(isset($_POST['lname'])&&(!empty($_POST['lname'])))
{	
	$email=mysql_escape_string($_POST['lname']);
	$email2=getdata('lastname');
	if($email!=$email2)
updatedata('lastname',$email);
}
if(isset($_POST['pass1'])&&(!empty($_POST['pass1']))&&isset($_POST['pass2'])&&(!empty($_POST['pass2'])))
{	
	$pass1=mysql_escape_string($_POST['pass1']);
		$pass2=mysql_escape_string($_POST['pass1']);
	if($pass1==$pass2)
	{
		$newpass=md5($pass1);
updatedata('password',$newpass);
	}
	else
	{
		$mess="Password donot match";
	?>
   
    <script type="text/javascript">
    alert("Password donot match!!!Try Again");
	</script>
    
    <?php
	}
}
if(isset($_POST['hcity'])&&(!empty($_POST['hcity'])))
{	
	$email=mysql_escape_string($_POST['hcity']);
updatedata('htown',$email);
}
if(isset($_POST['ccity'])&&(!empty($_POST['ccity'])))
{	
	$email=mysql_escape_string($_POST['ccity']);
updatedata('ccity',$email);
}
if(isset($_POST['cont'])&&(!empty($_POST['cont'])))
{	
	$email=mysql_escape_string($_POST['cont']);
updatedata('cnumber',$email);
}
if(isset($_FILES['photo']['name'])&&(!empty($_FILES['photo']['name'])))
{
	$picname=$_FILES['photo']['name'];	
	$size=$_FILES['photo']['size'];
	$tmp=$_FILES['photo']['tmp_name'];
	
	//echo $picname.$size." ".$tmp." ".$_FILES['photo']['type'];
	$ext=explode('/',$_FILES['photo']['type']);
	$extension=$ext[1];
	if($extension=='jpeg' or $extension=='png')
	{
	$userid=getdata('id');
	$dir="./photos/$userid.$extension";
	move_uploaded_file($tmp,$dir);
?>
	<script type="text/javascript">
    alert("Uploaded Successfully!!!");
	</script>
<?php
	}
	else
	{
		$mess="Invalid image format!!!";
	?>	
    
     <script type="text/javascript">
    alert("Invalid image format!!!Image must be in either jpeg or png format");
	</script>
		<?php
	}
	
}
$mess="Account updated Successfully!!";
?>
<?php
}
?>



<?php
$usr=getdata('username');

?>
<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | Update Account</title>
<script src="../jquery.js" type="text/javascript"></script>
<script src="../online/onlinejs.js" type="text/javascript"></script>
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
	
	
$('#photo').change(function(){
	var value=$(this).val();
	var arr=value.split('.');
	if(arr[1]=='png'||arr[1]=='jpg'||arr[1]=='jpeg')
	{
	$('#error').text("Valid image format!!").css('color','green');	
	}
	else
	{
		$('#error').text("Invalid image format!!").css('color','red');	
		return false;
	}
//	alert('dsaf');
//alert(value);
	//});
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

#sidenav ul#dis 
{
margin-top:70px;
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
width:100%;
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
	width:130px;
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
margin-left:37%;
margin-top:-380px;	
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
edit 
{

}
.block
{
margin-top:14px;	
	
}
.pedit
{
background:#EFEFEF;	
}
.pedit input
{
	display:block;
	height:40px;
	width:50%;
	margin-top:14px;
	margin-left:10%;
	
	
}
.pedit .lbel
{
display:inline;	
margin-left:25%;
font-size:14px;
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
<li><a href="howitworks.php">How it Works</a></li>
<li><a href="contact.php">Contact Us</a></li>
<li><a href="about.php">About Us</a></li>
</ul>

<div id="logreg"><a href="/new_sb/sbill/users?Username=<?php echo $usr;?>" >Hello, <?php echo getdata('firstname')." (".getdata('username').")"; ?></a>
</div>

<hr width="104%">
<div id="mess" style="left:55%;position:absolute;top:40%;color:red;"><?php if(isset($mess)) echo $mess;  ?></div>
<div id="content">
<div id="sidenav">

<ul id="dis"><span style="color:green;">
Update your account details<br> by clicking on Edit account below<br></span><br>
You're here:Home>Profile
<li><a href="#">Account &nbsp;&nbsp;<img src="../home/fancy_nav_right.png" style="top:10px;" width="20"></a></li>
<li><a href="../home/friends">Friends Zone</a></li>
<li><a href="?edit" id="edit">Edit Account</a></li>
<li><a href="../home/monthly">Monthly Details</a></li>
<li><a href="../home/gpay">Group Details</a></li>
<li><a href="../logout.php">Sign Out</a></li>
</ul>
<ul id="hover">
<ll>Credit:<?php $bud=getcal('budget');if(!(isset($bud))) echo 'Not Set';else echo " INR ".$bud; ?></li>
<li>Borrows: <?php ;if(!(isset($borrow))) echo ' NA';else echo " INR ".$borrow; ?></li>--------------------------
<br>
<li><a href="/new_sb/sbill/users?Username=<?php echo $usr;?>">Profile</a></li>
</ul>
</div>

<?php

	$real=getdata('username');
$fname=globe('firstname','login','username',$real);
$lname=globe('lastname','login','username',$real);
$email=globe('email','login','username',$real);
$htown=globe('htown','login','username',$real);
$ccity=globe('ccity','login','username',$real);
$cnum=globe('cnumber','login','username',$real);

$real1=getdata('id');
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
     
     <form class="pedit" action="" method="post" enctype="multipart/form-data">
     
     <div id="inbox">
    <span class="lbel">E-mail Address</span>
    
    <input type="email" name="email" value="<?php echo $email;?>" maxlength="30" id="email"> 
   
    <span class="lbel">Password</span>
    <input type="password"  name="pass1" id="pass1" placeholder="Password" required>
    
    <span class="lbel">Confirm Password</span>
    <input type="password" name="pass2"   id="pass2" placeholder="Re-Enter Password" required>
    
    <span class="lbel">First Name</span>
    <input type="text" name="fname" value="<?php echo $fname;?>" maxlength="30" id="fname"> 
    
    
   
    <span class="lbel">Last Name</span>
    <input type="text" name="lname" value="<?php echo $lname;?>" maxlength="30" id="lname"> 
    
    <span class="lbel">Hometown</span>
    <input type="text" name="hcity" placeholder="Enter Your Hometown" maxlength="30" id="hcity"> 
    
    <span class="lbel">Current City</span>
    <input type="text" name="ccity" placeholder="Enter Your Current City" maxlength="30" id="ccity"> 
    
 
    
    
    <span class="lbel">Contact Number</span>
    <input type="text" required  name="cont" placeholder="Without +91 or 0" maxlength="10" id="lname"> 
    
    
    <span class="lbel">Upload Picture of Yourself</span>
    <input type="file" name='photo' id="photo" >
    <div id="error" style="position:absolute;left:65%;top:161%;font-size:16px;"></div>
    </div>
    <input type="submit" name="update" value="Update It" id="update">
    </form>
     
    </div>
    

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

