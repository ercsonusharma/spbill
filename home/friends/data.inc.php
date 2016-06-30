	
<?php
if(isset($confid)&&(!empty($confid)))
{
	$exist1=globethree('id','friend','w_ho',$confid,'with_whom',$userid,'status','0');
	$exist2=globethree('id','friend','w_ho',$userid,'with_whom',$confid,'status','0');
	if($exist2)
	{
	$query="Update friend set status='1' where (w_ho=$userid and with_whom=$confid)";
	if(mysql_query($query))
	{
		$fname=globe('firstname','login','id',$confid);
	$lname=globe('lastname','login','id',$confid);
	$mess='<span style="color:green">You are now friends with '.$fname." ".$fname.'</span>';	
	}
	}
	else if($exist1)
	{
	$query="Update friend set status='1' where (w_ho=$confid and with_whom=$userid)";
	if(mysql_query($query))
	{
		$fname=globe('firstname','login','id',$confid);
	$lname=globe('lastname','login','id',$confid);
	$mess='<span style="color:green">You are now friends with '.$fname." ".$fname.'</span>';	
	}	
	}
	else
	$mess='OOps!Something went wrong';
	
	
}
$usr=getdata('username');
if(isset($_POST['creategroup'])&&isset($_POST['groupname']))
{
	
if(!empty($_POST['groupname']))
{
	$groupname=mysql_escape_string($_POST['groupname']);
	$wid=globe('id','login','username',$groupname);
	if($wid)
	{
	$query3="INSERT INTO friend set with_whom=$wid,w_ho=$userid,status='0'";
	if(@$query_name2=mysql_query($query3))
	{
		$mess="Friend Request Sent!!!";
		?>
        <script type="text/javascript">
		alert('Friend Request Sent!!!');
		</script>
        
        <?php
	}
	}
	else
	$mess="<span style='color:red'>Username doesnot exist!!!Take help of search box..</span>";
}
else
{
?>
        
		 <span style="position:absolute;top:440px;left:730px;color:red;">Field is empty!!! </span>
	<?php	
}
}



?>


<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | Friend Zone</title>
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
#creategp
{
background:#EBEBEB;
padding-bottom:3%;
padding-top:2%;
margin-top:2%;
width:85%;
margin-bottom:3%;	
}
#creategp input#gname
{
	height:30px;
	margin:1%;
	margin-left:15%;
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
<li><a href="../contact.php">Contact Us</a></li>
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
<li><a href="friends">Friends Zone</a></li>
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
<h3 style="margin-left:30%;text-decoration:underline;">Friends Section</h3><h5>
If you have no friends yet.. <br>
Don't Worry!!! Go ahead and Click on the add Friends button now <br>
and search friends and send them requests..
<br></h5>
<span style="margin-left:50%;font-size:16px;">Add Friends<input type="button" id="create" value="Here">
</span>
<div id="creategp" style="display:none;">
<form action="" method="post">
<span style="margin-left:20%;font-size:14px;">Friend's Name(Max.20 characters)</span>
<input type="text" name="groupname" placeholder="Enter Group Name here" id='gname' maxlength="20"/>
<input type="submit" value="Add Now" name="creategroup" style="//margin-left:30%;//width:30%;" >
</form>
</div>
<div id="showg">
<li><a href="#panel1">Friends</a></li>
<li><a href="#panel2">Requests Pending</a></li>
</div>
<div id="panel1">
<ol class="gd">

<?php

$query="Select * from friend where (w_ho='$userid' or with_whom='$userid') and status='1'";
if($query_name=mysql_query($query))
{
	if($row=mysql_num_rows($query_name))
	{
	?>
  <span class="mid"> Total Friends:<?php echo  $row;  ?></span>
   
   
   <?php
while($arr=mysql_fetch_array($query_name))
{
	if($arr['with_whom']!=$userid)
		$uid=$arr['with_whom'];
	else
	$uid=$arr['w_ho'];
	$uname=globe('username','login','id',$uid);
	$fname=globe('firstname','login','id',$uid);
	$lname=globe('lastname','login','id',$uid);
	?>
 <li><div class="gdname"><a href="../users?Username=<?php echo $uname; ?>" class="link">
    <?php echo $fname." ".$lname;?></a></div>
    </li>
    <?php
}
}
else
{
?>
<span class="mid">No Friends..Yet</span>
<?php } ?>
</ol>


</div>



<div id="panel2">
<ol class="gd">

<?php
//pending
$query="Select with_whom from friend where w_ho=$userid and status='0'";

if($query_name3=mysql_query($query))
{
if($row1=mysql_num_rows($query_name3))
{
	?>
    
    <span class="mid">Sent Requests:<?php echo $row1; ?></span>
	
	<?php
	while($arr1=mysql_fetch_array($query_name3))
	{
		$uid=$arr1['with_whom'];
			$uname=globe('username','login','id',$uid);
	$fname=globe('firstname','login','id',$uid);
	$lname=globe('lastname','login','id',$uid);
		
		?>
 <li><?php echo $fname." ".$lname; ?></li>
  
    <?php
		
	}
}
else
{
?>
<span class="mid">No Sent Requests..</span>
<?php
}
}
?>
</ol>

<ol class="gd">
<?php
//pending
$query="Select w_ho from friend where with_whom=$userid and status='0'";

if($query_name3=mysql_query($query))
{
if($row1=mysql_num_rows($query_name3))
{
	?>
    
    <span class="mid">Friend Requests:<?php echo $row1; ?></span>
	
	<?php
	while($arr1=mysql_fetch_array($query_name3))
	{
		$uid=$arr1['w_ho'];
			$uname=globe('username','login','id',$uid);
	$fname=globe('firstname','login','id',$uid);
	$lname=globe('lastname','login','id',$uid);
		
		?>
 <li><div class="gdname"><a href="../users/?Username=<?php echo $uname; ?>" class="link">
    <?php  echo $fname." ".$lname; ?></a></div>	<a href="/new_sb/sbill/home/friends?add&id=<?php echo $uid;?>" class="link">	
Confirm Now</a>
    </li>
  
    <?php
		
	}
}
else
{
?>
<span class="mid">No Friend Requests..</span>
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