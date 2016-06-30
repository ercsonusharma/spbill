	
<?php

$usr=getdata('username');
if(isset($_POST['creategroup'])&&isset($_POST['groupname']))
{
if(!empty($_POST['groupname']))
{
	$groupname=mysql_escape_string($_POST['groupname']);
	$check=globetwo('id','gname','groupname',$groupname,'userid',$userid);
	if($check)
	{
		$mess="Group Name already exist!!Try with different Group Name";
	}
	else
	{
	$query="INSERT INTO gname set groupname='$groupname',userid='$userid'";
	if(@$query_name=mysql_query($query))
	{
		$username=getdata('username');
		$gid=globe('id','gname','groupname',$groupname);
	$query3="INSERT INTO link set usrname='$username',groupid='$gid',isadmin='yes'";
	if(@$query_name2=mysql_query($query3))
	{
		$mess="Group Created Successfully!!!";
		?>
        <script type="text/javascript">
		alert('Group Created Successfully!!!');
		</script>
        
        <?php
	}
	}}
}
else
{
?>
        
		 <span style="position:absolute;top:440px;left:730px;color:red;">Field is empty!!! </span>
	<?php	
}
}


if(isset($_GET['reftype']))
{
	if(isset($_COOKIE['dedit']))
	setcookie('dedit',' ',time()-120);
	if(isset($_COOKIE['reftype']))
	setcookie('reftype',' ',time()-120);
setcookie('reftype',$_GET['reftype'],time()+120);
	
	//echo $_SERVER['reftype'];
	header('Location:gdisplay.php');
	
}
if(isset($_GET['dedit']))
{
	if(isset($_COOKIE['dedit']))
	setcookie('dedit',' ',time()-120);
	if(isset($_COOKIE['reftype']))
	setcookie('reftype',' ',time()-120);
		setcookie('dedit',$_GET['dedit'],time()+120);
	//echo $_SERVER['reftype'];
	header('Location:gdisplay.php');
	
}
//search username should also be there in form (to do)


?>


<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | Group Details</title>
<script src="../../jquery.js" type="text/javascript"></script>
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
	
	$('#showg li').click(function(){
		$('#showg li').css('background','#0FF');
		$('#panel1').hide();
				$('#panel2').hide();

	$(this).css('background','#EBEBEB');
	var panel=$(this).find('a').attr('href');
	$(panel).show();
	return false;
});
	
	$('#showg li:first').click();
	$('#create').click(function(){
		
		$('#creategp').fadeToggle(1000);
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
	margin-top:12%;
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
#showg
{
background:#EBEBEB;
height:70px;
width:85%;

	
}
#showg a
{
font-weight:bold;
display:block;
width:100%;
height:100%;	
}
#showg li
{
list-style-type:none;
display:inline-block;
background:#0FF;
padding-top:10px;
height:40px;
width:49.5%;
text-align:center;
border-bottom:1px black inset;	
}
#panel1,#panel2
{
background:#EBEBEB;
width:85%;
margin-top:-17px;
display:none;
font-weight:350;	
}
#panel1 li,#panel2 li
{
margin-top:5%;

padding-bottom:2%;
	
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
margin-top:80px;
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

#rightcontent
{
margin-left:40%;
margin-top:5%;	
}
span.mid
{
	margin-left:30%;
	text-decoration:underline;
	
	
}
.link
{
display:inline;	
}
#creategp input#gname
{
	height:30px;
	margin:1%;
	margin-left:5%;
width:60%;	
}
.gdname
{
	display:inline-block;
	width:40%;


}
#mess
{
color:red;
font-size:16px;}
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
<li><a href="../index.php">Home</a></li>
<li><a href="../../howitworks.php">How it Works</a></li>
<li><a href="../../contact.php">Contact Us</a></li>
<li><a href="../../about.php">About Us</a></li>
</ul>
<div id="logreg">
<a href="/new_sb/sbill/users?Username=<?php echo $usr;?>" >Hello, <?php echo getdata('firstname')." (".getdata('username').")"; ?></a></div>

<hr width="104%">
<div id="content">

<div id="sidenav">
<img src="<?php echo $realphoto; ?>" id="ppic">
<ul id="dis">
<li><a href="#">Account &nbsp;&nbsp;<img src="../fancy_nav_right.png" style="top:10px;" width="20"></a></li>
<li><a href="../friends">Friends Zone</a></li>
<li><a href="../monthly">Monthly Details</a></li>
<li><a href="../gpay">Group Details</a></li>
<li><a href="../../logout.php">Sign Out</a></li>
</ul>
<ul id="hover">
<ll>Balance: <?php $bud=getcal('balance');if(!(isset($bud))) echo 'Not Set';else echo " INR ".$bud; ?></li>
<li>Borrows: <?php ;if(!(isset($borrow))) echo ' NA';else echo " INR ".$borrow; ?></li>--------------------------
<br>
<li><a href="/new_sb/sbill/users?Username=<?php echo $usr;?>">Profile</a></li>
</ul>
</div>
<div id="rightcontent">
<div id="mess"><?php if(isset($mess)) echo $mess; ?></div>
<h3 style="margin-left:30%;text-decoration:underline;">Group View</h3><h5>
If you have not created any group Create Now <br>
or Click on the Group Name below to see its details<br></h5>
<div id="showg">
<li><a href="#panel1">Self Created Group</a></li>
<li><a href="#panel2">Others Group Membership</a></li>
</div>
<div id="panel1">
<ol class="gd">

<?php

$query="Select groupname,id from gname where userid='$userid'";
if($query_name=mysql_query($query))
{
	if($row=mysql_num_rows($query_name))
	{
	?>
  <span class="mid"> Total Groups:<?php echo  $row;  ?></span>
   
   
   <?php
while($arr=mysql_fetch_array($query_name))
{
	$gpid=$arr['id'];
	?>
 <li><div class="gdname"><a href="./gdisplay.php?gid=<?php echo $gpid; ?>" class="link">
    <?php echo $arr['groupname'];?></a></div>
    </li>
    <?php
}
}
else
{
?>
<span class="mid">No Groups</span>
<?php } ?>
</ol>
<span style="margin-left:50%;font-size:16px;">Create New Group Click <input type="button" id="create" value="Here">
</span>
<div id="creategp" style="display:none;">
<form action="" method="post">
<span style="margin-left:20%;font-size:14px;">Group Name(Max.20 characters)</span>
<input type="text" name="groupname" placeholder="Enter Group Name here" id='gname' maxlength="20"/><br>
<input type="submit" value="Create" name="creategroup" style="margin-left:20%;width:30%;" >
</form>
</div>

</div>



<div id="panel2">
<ol class="gd">

<?php
//group of others
$username=getdata('username');
$query3="Select groupid from link where usrname='$username' and isadmin='no'";



if(@$query_name3=mysql_query($query3))
{
if($row1=mysql_num_rows($query_name3))
{
	?>
    
    <span class="mid">Total Groups:<?php echo $row1; ?></span>
	
	<?php
	while($arr1=mysql_fetch_array($query_name3))
	{
		$gpid=$arr1['groupid'];
		$query4="Select groupname,userid from gname where id='$gpid'";
		if($query_name4=mysql_query($query4))
		{
			if($newrow=mysql_fetch_array($query_name4))
			{
			
			$gpname=$newrow['groupname'];
			$usrid=$newrow['userid'];
			
			?>
   
 <li><div class="gdname"><a href="./gdisplay.php?gid=<?php echo $gpid; ?>" class="link">
    <?php echo $gpname;?></a></div>	<a href="/new_sb/sbill/users?Username=<?php echo getadmin($usrid);?>" class="link">	
Admin:&nbsp;<?php echo getadmin($usrid); ?></a>
    </li>
  
    <?php
			}
		}
	}
}
else
{
?>
<span class="mid">No groups</span>
<?php
}
}
	//done
}
?>
</ol>

</div>


</div>



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