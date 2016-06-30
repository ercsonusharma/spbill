<?php

	$usr=getdata('username');


if(isset($_POST['billn']))
{
	$no=false;
if(!empty($_POST['bill']))
	{
		$bill=mysql_real_escape_string($_POST['bill']);
		$query="Select usrname from link where groupid='$groupid'";
if($query_name1=mysql_query($query))
{
if($row=mysql_num_rows($query_name1))
{
	$perhead=$bill/($row);
	$owefrom=getdata('username');
	 $query5="Select count,balance from monthly where userid='$user_id'";
	 if($query_name5=mysql_query($query5))
	 {
		 if($row=mysql_num_rows($query_name5))
		 {
			 if($rownew=mysql_fetch_array($query_name5))
			 {
				$newbal=$rownew['balance']-$bill;
				$day=24*60*60;
				 $timest=time();
				 $gap=((30)/(ceil(($timest-getcal('biltimest'))/$day)));
				 $newdaily=$newbal/$gap;
				 
				 $count=$rownew['count']+1;
				 
				 if($newbal>0&&$newdaily>0)
				 {
				 $query6="update monthly set daily='$newdaily',count='$count',balance='$newbal',timest='$timest' where userid='$user_id'";
	 if($query_name6=mysql_query($query6))
	 {
		 //done
	 }
				 }else $no=true;
			 }
	if(!$no)
	{
	while($rownew=mysql_fetch_array($query_name1))
	{
	$userid=globe('id','login','username',$rownew['usrname']);
	$getfrom=$rownew['usrname'];
	if($userid!=$user_id)
	{
		$query1="Insert into getowe set userid='$userid',owe='$perhead',owefrom='$owefrom',groupid='$groupid'";
			if($query_name2=mysql_query($query1))
{
				
}

	}
	}
	$error="<span style='color:green;'>Bill equally Splitted Successfully  among all group members..</span><br><a href='./gdisplay.php?gid=".$groupid."'>Go back to group to see the distribution details</a>";
	
}
		 }
		 
else
{ 
$error="Set Monthly Allowance First!!!";
}
	 }

}
else
{ $error="No members added!!!";
}
}
		
	}
	else
	{
		$error="Field is empty!!!";
	}
	if($no)
	{
		$error="Insufficient Monthly Balance!!!";
	}
}
?>

<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | Add Bill-<?php echo globe('groupname','gname','id',$groupid); ?></title>
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
	
	$(':radio').change(function(){
		$('.inbox').fadeIn(600);
		var choice=$(this).attr('id');
		if(choice=='sequal')
		{
			var bill=$('input:text').val();
		
			var t=0;
			$(':input[type=number]').each(function() {
                t+=1;
            });
				
			var phead=bill/t;
			$(':input[type=number]').attr('value',Math.floor(phead));
			
		}
		else if(choice=='smanual')
		{
			
			$(':input[type=number]').attr('value',0);
			
		}
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
	top:290px;
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
margin-left:38%;
padding-top:3%;	
}


.mess,#mess1
{
color:red;
font-size:16px;
display:inline;
margin-left:30px;
}
#mess1
{
position:absolute;
top:35%;	
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
.inbox
{
margin-top:2%;
margin-left:20%;
display:none;	
}
.rt
{
background:#E0E0E0;	
padding:2% 0 3% 0;
}
.formclass
{
padding-top:2%;	
	
}

</style>
</head>
<body >
<div id="clock">Current-Time and Date:</div>
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
<li><a href="./">Group Details</a></li>
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

<div class="mess"><?php if(isset($error)) echo $error; ?></div>
<h3 style="margin-left:30%;text-decoration:underline;">Group Details</h3>
<hr>

<?php
$groupname=globe('groupname','gname','id',$groupid);
$adminid=globe('userid','gname','id',$groupid);
$when=globe('created','gname','id',$groupid);
//calculate no of members
$query="Select id from link where groupid=$groupid";	
	$query_st=mysql_query($query);
$members=mysql_num_rows($query_st);
	
?>
<span class="left" >Group Name:</span> <span class="right"> <?php echo $groupname; ?> </span><br>
<span class="left" >Group Admin:</span> <span class="right"> <?php echo getadmin($adminid); ?> </span><br />
<span class="left" >Created on:</span> <span class="right"> <?php echo $when; ?> </span><br />
<span class="left" >Total No. of members:</span> <span class="right"> <?php echo $members; ?> </span>
<hr>
<div class="rt">
<h3 style="margin-left:30%;text-decoration:underline;">Add a Bill</h3>

<?php if($members>1){ ?>
<span class="mess">
Uncheck the box or set amount 0 to exclude user from list</span>
<form action="" method="post" class="formclass">
<span style="font-size:14px;margin-left:30%;">Total Amount</span><br>
<input type="text" name="bill" placeholder="Enter Amount in Rs." style="margin-left:20%;width:30%;height:25px;">
<label for="sequal">Split Equally</label><input type="radio" value="equal" name="smode" id="sequal">&nbsp;
<label for="smanual">Split Manully</label><input type="radio" value="manual" name="smode" id="smanual">
<?php
if(isset($_POST['bill']))
$bill=mysql_real_escape_string($_POST['bill']);
$query="Select usrname from link where groupid='$groupid'";
if($query_name1=mysql_query($query))
{
	$arr=array();
if($row=mysql_num_rows($query_name1))
{
	if(isset($bill))
	$perhead=$bill/($row);
	$i=0;
	while($rownew=mysql_fetch_array($query_name1))
	{
		$i++;
	$userid=globe('id','login','username',$rownew['usrname']);
	$firstname=globe('firstname','login','username',$rownew['usrname']);
	$getfrom=$rownew['usrname'];
	if($userid!=$user_id)
	{
	?>
    <div class="inbox">
    <input type="checkbox" name="tick" value="0" checked="checked" >
    <input type="number" name="prhead<?php echo $i;  ?>" value="0">
     <span style="display:inline-block;width:40%;margin-left:3%;color:#36006C;"><?php echo $firstname." (".$getfrom.") "; ?></span>
    </div>
    <?php
		if(isset($_POST["prhead$i"]))
		{
		$temp=mysql_escape_string($_POST["prhead$i"]);
		if(is_numeric($temp)&&isset($temp))
		{
			if($temp>0)
			{
		$arr[$getfrom]=$temp;
			}
			
		}
		}
	}
	
	}
}

}

?>
<input type="submit" value="Go! Split it" style="margin-left:27%;width:20%;height:30px;margin-top:2%;" id="subform">
</form>


<?php
if(isset($_POST['bill'])&&isset($_POST['smode']))
{
	$no=false;
if(!empty($_POST['bill']))
	{
		$bill=mysql_real_escape_string($_POST['bill']);
		$query="Select usrname from link where groupid='$groupid'";
if($query_name1=mysql_query($query))
{
if($row=mysql_num_rows($query_name1))
{
	$perhead=$bill/($row);
	$owefrom=getdata('username');
	 $query5="Select count,balance from monthly where userid='$user_id'";
	 if($query_name5=mysql_query($query5))
	 {
		 if($row=mysql_num_rows($query_name5))
		 {
			 if($rownew=mysql_fetch_array($query_name5))
			 {
				$newbal=$rownew['balance']-$bill;
				$day=24*60*60;
				 $timest=time();
				 $gap=((30)/(ceil(($timest-getcal('biltimest'))/$day)));
				 $newdaily=$newbal/$gap;
				 
				 $count=$rownew['count']+1;
				 
				 if($newbal>0&&$newdaily>0)
				 {
				 $query6="update monthly set daily='$newdaily',count='$count',balance='$newbal',timest='$timest' where userid='$user_id'";
	 if($query_name6=mysql_query($query6))
	 {
		 //done
	 }
				 }else $no=true;
			 }
			 
			 
	if(!$no)
	{
		
		if($_POST['smode']=='equal')
		{
	while($rownew=mysql_fetch_array($query_name1))
	{
		
	$userid=globe('id','login','username',$rownew['usrname']);
	$getfrom=$rownew['usrname'];
	if($userid!=$user_id)
	{
		$query1="Insert into getowe set userid='$userid',owe='$perhead',owefrom='$owefrom',groupid='$groupid'";
			if(mysql_query($query1))
{
		//owe		
}
			$query2="Insert into getowe set userid='$user_id',toget='$perhead',getfrom='$getfrom',groupid='$groupid'";
			if(mysql_query($query2))
{
		//getlist		
}
	}
	}
	$error="<span style='color:green;'>Bill equally Splitted Successfully  among all group members..</span><br><a href='./gdisplay.php?gid=".$groupid."'>Go back to group to see the distribution details</a>";
	
}
else
{
	

foreach($arr as $getfrom => $amount)
{
	$userid=globe('id','login','username',$getfrom);
	echo $getfrom."=>userd".$owefrom."<br>";
	$query1="Insert into getowe set userid='$userid',owe='$amount',owefrom='$owefrom',groupid='$groupid'";
			if(mysql_query($query1))
{
		//owe		
}
			$query2="Insert into getowe set userid='$user_id',toget='$amount',getfrom='$getfrom',groupid='$groupid'";
			if(mysql_query($query2))
{
		//getlist		
}
	
}

	
	$error="<span style='color:green;'>Bill manually Splitted Successfully  among selected group members..</span><br><a href='./gdisplay.php?gid=".$groupid."'>Go back to group to see the distribution details</a>";
	
	

	
	
}

	}}
		 
else
{ 
$error="Set Monthly Allowance First!!!";
}
	 }

}
else
{ $error="No members added!!!";
}
}
		
	}
	else
	{
		$error="Field is empty!!!";
	}
	if($no)
	{
		$error="Insufficient Monthly Balance!!!";
	}
}
}else

{ ?>

<h4>Add members to this group to share bill and enjoy!!</h4>

<?php } ?>
<div id="mess1"><?php if(isset($error)) echo $error; ?></div>
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

