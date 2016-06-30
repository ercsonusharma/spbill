<?php

	$usr=getdata('username');


if(isset($_POST['uname']))
{
if(!empty($_POST['uname']))
{
$stop=false;
	$addusername=mysql_real_escape_string($_POST['uname']);
	$query1="Select id from login where username='$addusername'";
	$query2="Select id from link where usrname='$addusername' and groupid=$groupid";
	
	if($query_name2=mysql_query($query2))
	{
		
		if((mysql_num_rows($query_name2)))
		{
			
		$stop=true;	
		}
	}
	
	if(($query_name1=mysql_query($query1)))
	{
	if(mysql_num_rows($query_name1)&&($stop==false))
	{
		if($arr=mysql_fetch_array($query_name1))
		$addid=$arr['id'];
		
		$query="Select id from friend where (((w_ho='$userid' and with_whom=$addid) or (w_ho='$addid' and with_whom=$userid)) and status='1')";
if($query_name=mysql_query($query))
{
if(mysql_num_rows($query_name))	
{
		
	$query="Insert into link set usrname='$addusername',groupid=$groupid,isadmin='no'";
	if(@mysql_query($query))
	{
		$lname=globe('lastname','login','username',$addusername);
		$fname=globe('firstname','login','username',$addusername);
	$error= "<span style='color:green;'>User:".$fname." ".$lname." Added Successfully!!!</span>"; 
	}
	}
else
{
	$error= "You both are not friend...First add him in your friend list and then go ahead!"; 
}
}
	
	}
	else if($stop==true)
	{
		$error= "User already exists in the group.."; 
	}
	else
	{
		$error="Invalid Username!!";
	}
	}
}
else
	{
		$error="Field is empty!!!";
	}
}



if(isset($_POST['amount'])&&isset($_POST['payfrom'])&&(!empty($_POST['amount'])))
{

	//$uid=mysql_real_escape_string($_GET['pay']);
	$paytoid=mysql_real_escape_string($_POST['payto']);
	$payto=getadmin($paytoid);
	//$payfrom=mysql_real_escape_string($_POST['payfrom']);
		 $oweing=mysql_real_escape_string($_POST['amount']);
		 //echo $oweing;
		//$ownfrm=globe('username','login','id',$uid);
		//echo "userid=".$user_id. " ".$oweing." ".$group_id." ".$ownfrm;
			//echo "df";
			
			$debited=false;
			$setfirst=false;
			$insufficent=false;
		$notexist=false;	
			$delted=false;
			$credited=false;
			//echo $user_id.$oweing.$groupid.$payto;
			$query4="Select id from getowe  where userid='$user_id' and owe='$oweing' and groupid='$groupid' and owefrom=$payto";
		if($query_name1=mysql_query($query4))
		{
			
			if(mysql_num_rows($query_name1))
		{
			
		}
		else
		$notexist=true;
		}
		
		//checking exist
		if(!$notexist)
			{
	$query5="Select count,balance from monthly where userid='$user_id'";
	 if($query_name5=mysql_query($query5))
	 {
		 if($row=mysql_num_rows($query_name5))
		 {
			 if($rownew=mysql_fetch_array($query_name5))
			 {
				$newbal=$rownew['balance']-$oweing;
				$day=24*60*60;
				 $timest=time();
				 $gap=((30)/(ceil(($timest-getcal('biltimest'))/$day)));
				 $newdaily=$newbal/$gap;
				 
				 $count=$rownew['count']+1;
				 
	//check for sufficient balance
				 if($newbal>0&&$newdaily>0)
				 {
				 $query6="update monthly set daily='$newdaily',count='$count',balance='$newbal',timest='$timest' where userid='$user_id'";
	 if($query_name6=mysql_query($query6))
	 {
		 $debited=true;
	 }
	 }
	 else
	 $insufficent=true;
			 }
			 
		 }
		 else
		 $setfirst=true;
	 }

//end of checking users monthly account

//messsage
if($insufficent)
{
$error='Insufficient Balance';
}
if($setfirst)
{
	$error="Set Monthly Allowance first"; 	
	
}
if((!$insufficent)&&(!$setfirst)&&$debited)
{
//updating others account also
	
	$usid=$paytoid;
	

$query9="Select count,balance from monthly where userid='$usid'";
	 if($query_name9=mysql_query($query9))
	 {
		 
		 if($row=mysql_num_rows($query_name9))
		 {
			
			 if($rownew=mysql_fetch_array($query_name9))
			 {
				$newbal=$rownew['balance']+$oweing;
				$day=24*60*60;
				 $timest=time();
				 $gap=((30)/(ceil(($timest-getcal('biltimest'))/$day)));
				 $newdaily=$newbal/$gap;
				 
				 $count=$rownew['count']+1;
				 
				 
				 $query7="update monthly set daily='$newdaily',count='$count',balance='$newbal',timest='$timest' where userid='$usid'";
	 if($query_name7=mysql_query($query7))
	 {
		 $credited=true;
		 
	
	 }//end of query_name6
			 }   //end of fetch_array
		 }  //end og num_rows
	 }  //end of query
	 
	//end of updating others account
	
	//deleting the data
	
			
if($credited)		
			{
				
				/*
				if(amount==gien imple)
				
				*/
				$uid=getadmin($user_id);
				
		$querynew="Select owe from getowe where userid='$user_id' and groupid='$groupid' and owefrom='$payto'";
				$doquery=mysql_query($querynew);
				$arr=mysql_fetch_array($doquery);
				$actualoweing=$arr['owe'];
				$fname=globe('firstname','login','id',$paytoid);
				if($actualoweing==$oweing)
				{
			$query2="Delete from getowe where userid='$paytoid' and groupid='$groupid' and toget='$oweing' and getfrom='$uid'";
$query1="Delete from getowe where userid='$user_id' and owe='$oweing' and groupid='$groupid' and owefrom='$payto'";
if(mysql_query($query1))
{
	$delted=true;
	if(mysql_query($query2))
	{
	
	$newdeleted=true;
			
	$error="<span style='color:green'>Congrats!!!!Transaction Successfull!!!</span><br>Debited INR ".$oweing." And Credited to "
												.$fname." (".$payto.")";
     	
	}
}
				}
				else if($actualoweing>$oweing) 
								{
					$remaining=$actualoweing-$oweing;
				$query2="update getowe set toget=$remaining where userid='$paytoid' and groupid='$groupid' and getfrom='$uid'";
$query1="update getowe set owe=$remaining where userid='$user_id' and groupid='$groupid' and owefrom='$payto'";
if(mysql_query($query1))
{
	$delted=true;
	if(mysql_query($query2))
	{
	
	$newdeleted=true;	
			
	$error="<span style='color:green'>Congrats!!!!Transaction Successfull!!!</span><br>Debited INR ".$oweing." And Credited to "
												.$fname." (".$payto.")";
     
	}
				}
				}
				else
				{
			
	$error="Invalid Amount!!!Requested amount is more than actual to paid..";
				}

			}

}
		
			}//end of not exist
		else
		{
		$error="Transaction Unsuccessfull!!!"; 
        
		
		}
}

?>






<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | Group-<?php echo globe('groupname','gname','id',$groupid); ?></title>
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
	$('.mname').click(function(){
		$('.getlist').hide();
		$('.owelist').hide();
		$(this).find('img:even').hide();
		//$(this).find('img').addClass('open');
	var l=$(this).find('a').attr('href');
	//alert(l);
	$(l).show();
	return false;
	});
	$('.noclass').click(function(){
		$('.noclass').find('form').fadeOut(500);
		var sh=$(this).find('form').attr('id');
		$(this).find('#'+sh).fadeToggle(1200);
		
		});
		$('#addm').click(function(){
			//alert('fs');
			$('#addmember').slideToggle(500);
			
			});
			
			function suggest_name(uname){
					 $.post('suggest.php',{uname:uname},function(data){
						 
						  $('#suggest').html(data);
						 });
					 
					 
					 }
			
			
			$('#Uname').focusin(function(){
				if($('#Uname').val()!='')
				{
					$('#searchbox').show(300);
					suggest_name($('#Uname').val());
				}
				else
				$('#searchbox').hide(300);
				
				}).blur(function(){
					
					$('#suggest').html('');
					$('#searchbox').slideUp(300);
					}).keyup(function(){
						
				if($('#Uname').val()!='')
				{
					$('#searchbox').show(300);
					suggest_name($('#Uname').val());
				}
				else
				$('#searchbox').hide(300);
						});
						
				$('#searchbox').mouseover(function(){
					var val=$(this).find('li').text();
					var user=val.split('(');
					var username=user[0];
					var ne=document.getElementById('Uname');
					ne.setAttribute('value',username);
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
padding-top:5%;	
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

<div id="mess"><?php if(isset($error)) echo $error; ?></div>
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
<?php if($adminid==$user_id) {
	 ?>
<span style="margin-left:25%">Add New Member <input type="button" value="Add Now" id="addm"></span>
<div id="addmember" style="display:none;">
<form action="" method="post" style="padding-left:30%;padding-top:10px;padding-bottom:10px;background:#FFBFFF;">
<span style="margin-left:10%;font-size:14px;"> Member Username:</span><br>
<input type="text" name="uname" id="Uname" placeholder="Enter Username here" style="width:95%;height:25px;margin-left:-25%;" maxlength="10">
<input type="submit" value="Go">
</form> 
</div>
<div id="searchbox">
<ul id="suggest">
</ul>
</div>
<?php }
 ?>
<br><br>
<?php if($members>1){ ?>
<a href="addbill.php?gid=<?php echo $groupid; ?>" style="margin-left:25%;">Click here to Add a New bill</a>
<?php }else{ ?>

<span style="margin-left:25%;">Add Members to share bill and enjoy</span>
<?php } ?>
<hr>

</div>

<div class="rt">
<?php
$query="Select usrname from link where groupid=$groupid";
$i=1;
if($query_name1=mysql_query($query))
{
if($row=mysql_num_rows($query_name1))
{
	
	while($realrow=mysql_fetch_array($query_name1))
	{
		$username=$realrow['usrname'];
		$userid=globe('id','login','username',$username);
		$firstname=globe('firstname','login','username',$username);
		$lastname=globe('lastname','login','username',$username);
	?>
    <div class="mname">
    <a href="#<?php echo $userid; ?>" style="color:#2A0000;" class="display">
    <img src="open.png" ><img src="close.png" class="close">
    <?php
	$online=globe('count(*)','online','userid',$userid);
	
    echo $firstname." ".$lastname." (".$username.")";
	
	
	?>
    <img src="open.png" ><img src="close.png" class="close">
    &nbsp;
    <?php if(isset($online)){
		if($online)
	echo ' (online)'; } ?>
    </a>
    </div>
    
</span>


<ul id="<?php echo $userid; ?>" class="owelist" style="display:none;">
<span class="mid">Owe List</span>
 <?php 
	$query2="Select owe,owefrom,timest from getowe where userid='$userid' and groupid=$groupid";
	if($query_name2=mysql_query($query2))
	{
		$x=0;
		if($p=mysql_num_rows($query_name2))
		{
			$owe=0;
	while($row1=mysql_fetch_array($query_name2))
	{
		if(!(empty($row1['owe'])))
		{
			$owe+=$row1['owe'];
	 ?>
<li>
   <span style="display:inline-block;width:12%;"> INR <?php echo $row1['owe']; ?> </span> <= <?php
	$firstname1=globe('firstname','login','username',$row1['owefrom']);
		
	?>
    <span style="display:inline-block;width:40%;">
    <?php	
	 echo $firstname1." (".$row1['owefrom'].")";?>
     </span>
     <span style="display:inline-block;width:26%;">
      on <?php echo $row1['timest']; ?></span>
     <?php 
	 $usrid=globe('id','login','username',$row1['owefrom']);
	 if($userid==$user_id)
	 {
		?>
       <div class="noclass">
          <input type="button"  value="Pay Now">
          <form action="" method="post" style="padding-left:30%;padding-top:10px;padding-bottom:10px;background:#FFBFFF;display:none;" id="<?php echo $x++; ?>" class="show">
        <input type="text" name="amount" placeholder="Amount in Rs." >
        <input type="hidden" name="payto" value="<?php echo $usrid;?>">
        <input type="hidden" name="payfrom" value="<?php echo $userid?>">
        <input type="submit" value="Pay" name="paynow">
        <div id="mess"></div>
        </form>
</div>
        
        </li>
        
        <?php 
	 }
	
	 
		}
	}
	?>
   
    <h5 style="margin-left:45%;">   Total Sum:<?php echo $owe; ?> from <?php echo $p; ?> People.</h5>
    
    <?php
	
		}
		else
		{		?>
       <h5> Owe Nothing</h5>
        <?php
		}
	}
	 ?>
   
 
   <span class="mid">Get List</span>
    <?php
	
	
	$query3="Select toget,getfrom,timest from getowe where userid='$userid' and groupid=$groupid";
	if($query_name2=mysql_query($query3))
	{
		if($p=mysql_num_rows($query_name2))
		{
			$get=0;
	while($row1=mysql_fetch_array($query_name2))
	{
		if(!empty($row1['toget']))
		{
			
	 ?>
    <li>
    <span style="display:inline-block;width:12%;"> INR.<?php echo $row1['toget'];?></span> => <?php
	$firstname1=globe('firstname','login','username',$row1['getfrom']);
		
	?>
    <span style="display:inline-block;width:40%;">
    <?php	
	 echo $firstname1." (".$row1['getfrom'].")"; ?>
     </span>  <span style="display:inline-block;width:26%;">
      on <?php echo $row1['timest']; ?></span>
     </li><?php
		$get+=$row1['toget'];
		}
		
	 
	}
	?>
    <br>
   <h5 style="margin-left:45%;">  Total Sum:<?php echo $get; ?> from <?php echo $p; ?> People.</h5>
    
    <?php
	
	}
	else
	{
	?>
   <h5> Get Nothing</h5>
    <?php	
	}
	}
     ?>
   
    </ul>
  
    <?php
}

}
	else
	{
	?>
    <span style="margin-left:160px;font:Arial,Helvetica,sans-serif;font-weight:bold;">The Group has currently no Members!!!</span><hr><br>
    
    <?php		
	}
	
}

?>
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

