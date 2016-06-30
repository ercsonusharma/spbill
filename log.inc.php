
<?php

//include 'db_connect.inc.php';
if(isset($_POST['username'])&&isset($_POST['password']))
{
	if(!empty($_POST['username'])&&!empty($_POST['password']))
	{
		$username=mysql_escape_string($_POST['username']);
		$password=mysql_escape_string($_POST['password']);
		$pass_hash=md5($password);
		$query="SELECT `id` from `login` where `username`='$username' and `password`='$pass_hash'";
		if($query_name=mysql_query($query))
		{
		if($row=mysql_num_rows($query_name))
		{
			$id=mysql_result($query_name,0,'id');
			//session_start();
			setcookie('userid',$id,time()+22200);
			//$_SESSION['userid']=$id;
			header('Location:index.php');
		}
		else
		{
		$error="Invalid Username/Password Combination!";
		}
	}
	}
	else 
	$error="Please fill in requeired fields!";

}

//for registration of new user
else if(isset($_POST['regusername'])&&isset($_POST['password1'])&&isset($_POST['password2'])&&isset($_POST['firstname'])&&isset($_POST['email']))
{
	if(!empty($_POST['regusername'])&&!empty($_POST['password1'])&&!empty($_POST['password2'])&&!empty($_POST['firstname'])&&!empty($_POST['email']))
	{
		$regusername=mysql_escape_string($_POST['regusername']);
		$password1=mysql_escape_string($_POST['password1']);
		$password2=mysql_escape_string($_POST['password2']);
		$firstname=mysql_escape_string($_POST['firstname']);
		$lastname=mysql_escape_string($_POST['lastname']);
		$email=mysql_escape_string($_POST['email']);
		$finalmail=explode('@',$email);
		//2 query below
		$query="SELECT id from login where username='$regusername'";
		$querynew="SELECT id from login where email like '$finalmail[0]%'";
		$prod=true;
		//query 1
		
		if($query_name=mysql_query($query))
		{
			
		if($row=mysql_num_rows($query_name))
		{
		$error="Username already exits!";	
		$prod=false;
		}
		}
		
		//query2
		if(($query_name=mysql_query($querynew))&&$prod)
		{
		if($row=mysql_num_rows($query_name))
		{
		$error="E-mail already exits!";	
		$prod=false;
		}
		}

		 if(strcmp($password1,$password2)==0&&$prod)
		{
			$pass_hash=md5($password1);
		$query1="INSERT INTO login set username='$regusername',password='$pass_hash',firstname='$firstname',lastname='$lastname',email='$email'";
		if($query_name=mysql_query($query1))
		{
			$id=getcal('id',$regusername);
			
			setcookie('userid',$id,time()+22200);
			//$_SESSION['userid']=$id;
			header('Location:home');
		}
		
		}
		else if(strcmp($password1,$password2)!=0)
			$error="Password donot match!";
		
	}
	else 
	$error="Please fill in required fields!";	

}
else
$error="You're not logged in!";	
?>

<!DOCTYPE HTML>
<html lang="en" >
<head>
<title>Split Bill | Home</title>
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    setInterval("var date=Date();$('#clock').text(date);",1000);
	
	
 $('#tabs li').click(function(){
	 
	 var panel=$(this).find('a').attr('href');
	// $(panel).show();
	 $('#panel1,#panel2').hide();
	 $(panel).show();
	 $('#tabs').find('a').css('background','#0F5');
	 $(this).find('a[href="'+panel+'"]').css('background','#F7F7F7');
	 return false;
	 });
	 $('#tabs li:first').click();
	 $('input:not(input:submit)').focusin(function(){
	 $(this).css('border-color','navy');
	}).focusout(function() {
        	 $(this).css('border','');
    });;
	
	var gl=false;var count=0;
	 var pass1=0;
	 $('input:password[name=password1]').keyup(function(){
		
		 pass1=jQuery.trim($(this).val());
		  plen=pass1.length;
		  if(count==0)
		  $(this).after('<div class="current"></div>');
		  count++;
		//alert(plen);
		
		 if(plen<5 && plen>=0)
		 {
			// alert(e.clientX);
		 $('.current').css('color','red').text('Password Strength:Poor');
		 $(this).css('border-color','red');
		 //return false;
		 }
		 else if(plen>4 && plen<9)
		 {
		 $('.current').css('color','green').text('Password Strength:Good');
		 $(this).css('border-color','green');
		 }
		 else
		 {
		  $('.current').css('color','green').text('Password Strength:Strong');
		  $(this).css('border-color','green');
		 }
		 //gl=true;
		
		  	 }).blur(function(){ $('.current').text('');});;
			 
	$('input:password[name=password2]').keyup(function(){
		pass2=jQuery.trim($(this).val());
		//if(count==0)
		$(this).after('<div class="current"></div>');
		
		if(pass1==pass2 && pass1!=0)
		{
			$('.current').css('color','green').text('Password Matched!!!');
		 $(this).css('border-color','green');
		}
		else
		{
			$('.current').css('color','red').text('Password donot match!!!');
		 $(this).css('border-color','red');
		}
		 $(this).blur(function(){ $('.current').text('');});
	});
	
	
	
		function Login()
		{
		var name=jQuery.trim($('#name').val());
		var pass=jQuery.trim($('#password').val());
		//alert(name+pass);
			if(name=='')
			{
			$('#name').css('border-color','red');
			 return false;	
			}
			if(pass=='')
			{
			$('#password').css('border-color','red');
			return false;	
			}
			return true;
		}
	 
	 function SignUp()
		{
		var fname=jQuery.trim($('#firstname').val());
		var pass1=jQuery.trim($('#password1').val());
		
		var lname=jQuery.trim($('#lastname').val());
		var pass2=jQuery.trim($('#password2').val());
		
		var uname=jQuery.trim($('#Uname').val());
		var email=jQuery.trim($('#Email').val());
		//alert(name+pass);
			if(uname=='')
			{
			$('#Uname').css('border-color','red');
			 return false;	
			}
			if(pass1==''||pass2=='' || pass1!=pass2)
			{
			$('#password1').css('border-color','red');
			$('#password2').css('border-color','red');
			return false;	
			}
			if(email=='')
			{
			$('#Email').css('border-color','red');
			 return false;	
			}
			if(fname=='')
			{
			$('#firstname').css('border-color','red');
			 return false;	
			}
			//if($('#email_feed').val()!='That\'s a Valid Email Address!')
			//return false;
			//else
			//return true;
			return true;
		}
	 
	 $('#LoginSubmit').mousemove(function(){

if(Login())
{
	//validate();
$('input:submit').removeAttr('disabled').click(function(){
	$(this).attr('disabled',true).attr('value','Please Wait....');
	});
}
	 });
	  $('#RegSubmit').mousemove(function(){

if(SignUp())
{
	//validate();
$('input:submit').removeAttr('disabled').click(function(){
	$(this).attr('disabled',true).attr('value','Please Wait....');
	});
}
	 });
	 function val_email(email){
		
		 $.post('email.php',{email:email},function(data){
			 $('.currnt').html(data);
			
			 });
			 
		 }
	 
	 $('#Email').focusin(function(){
		  $(this).after('<div class="currnt"></div>');
		 if($(this).val()=='')
		 $('.currnt').text('Enter a valid E-mail address!');
		 else
		 {
			 val_email($(this).val());
			  
		 }
		 
		 }).blur(function(){
			 $('.currnt').text('');
			 
			 }).keyup(function(){
				 val_email($(this).val());
				 
				 });
				 
				 function user_search(uname){
					 $.post('email.php',{uname:uname},function(data){
						 
						  $('.uname').html(data);
						 });
					 
					 
					 }
				 
				 $('#Uname').focusin(function(){
					  $(this).after('<div class="uname"></div>');
					 if($(this).val()=='')
					 {
						 $('.uname').html('Enter a Username....');
					 }
					 else
					 {
						 $('.uname').html('Loading....');
						 user_search($(this).val());
					 }
					 
					 }).blur(function(){
			 $('.uname').text('');
			 
			 }).keyup(function(){
				 if($(this).val()=='')
					 {
						 $('.uname').html('Enter a Username....');
					 }else
					 {
				 $('.uname').html('Loading....');
				 user_search($(this).val());
					 }
				 });
	

});


</script>
<style type="text/css">

.current,.currnt,.uname
{
color:red;
font-size:12px;
margin:-15px 0 0 200px;
}

#tabs a
{
	display:block;
text-decoration:none;
width:100%;
//background:#7FFF00;
height:35px;
padding-top:15px;
}

li
{
list-style-type:none;
text-align:center;
display:inline-block;
width:217.5px;
	
}
#tabs
{

background:#F7F7F7;	
width:440px;
height:70px;
margin-left:-40px;
}
.inputbox input
{
	display:block;
	height:30px;
	margin-bottom:6%;
	width:65%;
	margin-left:15%;
	
	
}
.text
{
font-size:14px;
margin-left:150px;	
}
#panel1,#panel2
{
background:#F7F7F7;	
//margin-bottom:-10px;
margin-top:-18px;
width:440px;

}
.Submit
{
margin-left:120px;
width:180px;
height:40px;
font-size:100%;
letter-spacing:2px;	
}
#forgot
{
margin-left:120px;
font-size:17px;	
}

body
{
	border-left:1px #A0A0A4 outset;
	padding-right:40px;
	border-right:1px #A0A0A4 outset;
	margin-bottom:30px;
	border-radius:5px;
	font-size:17px;
	
	margin-left:130px;
	//background-size:80%;
	
	width:990px;
}
#content
{
padding-left:50px;
margin-bottom:50px;	
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
#nav li a
{text-decoration:none;
color:white;
display:block;
width:100%;
}
#instruct
{
font-size:15px;
float:right;
margin-top:50px;
line-height:20px;
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
	border-top:1px black outset;
	padding-top:10px;
	padding-left:20%;
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
#error
{
color:red;
font-size:15px;
line-height:0px;
margin-left:200px;	
	
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
Login or SignUp below</div>

<hr width="104%">
<div id="content">
<div id="instruct">
<h2 >Instructions</h2></br>
1.Fields marked with <span style="color:red">*</span> are important<br>
2.Move your mouse pointer on Login/Register after filling the form correctly
<br>
3.New User?Click on SignUp button to register first<br>
<br>
<span style="color:red;margin-left:50px;">
Having Trouble while Logging in</span>
<div id="forgot">

<a href="?forgot">Forgot Password/Username? Click here</a>
</div>
</div>
<div id="left">
<div id="error"><?php if(isset($error)) echo $error; ?></div>
<ul>
<div id="tabs">
<li><a href="#panel1">Login</a></li>
<li><a href="#panel2">Sign Up</a></li>
</div>
</ul>


<form action="" method="post">
<div id="panel1">
<div class='inputbox'><span class="text"><span style="color:red">*</span>Your Username</span>
<input type="text"  name="username" placeholder="Username" id="name" maxlength="10" required/>
<span class="text"><span style="color:red">*</span>Your Password</span>
<input type="password"  name="password" id="password" maxlength="20" placeholder="Password" required/>
</div>
<div id="LoginSubmit">
<input type="submit" value='Login' name="goForLogin" class="Submit" disabled onClick="Login();"/>

</div>
<br>

</div>
</form>
<form action="" method="post">
<div id="panel2">
<div class='inputbox'>
<span class="text"><span style="color:red">*</span>Your First Name</span>
<input type="text" name="firstname"  placeholder="First Name" id="firstname" maxlength="10" value="<?php if(isset($firstname)) echo $firstname;?>" required />
<span class="text">Your Last Name</span>
<input type="text" name="lastname" placeholder="Last Name" id="lastname" maxlength="12" value="<?php if(isset($firstname)) echo $lastname;?>" />
<span class="text"><span style="color:red">*</span>Choose a Username</span>
<input type="text" name="regusername"  placeholder="Username" id="Uname" maxlength="10" required/>
<span class="text"><span style="color:red">*</span>Your Personal E-mail ID</span>
<input type="email" name="email" placeholder="E-Mail" id="Email" required/>

<span class="text"><span style="color:red">*</span>Choose a Password</span>
<input type="password" name="password1" id="password1" maxlength="20" placeholder="Password" required/>
<span class="text"><span style="color:red">*</span>Re-Enter Password</span>
<input type="password" name="password2"  id="password2" maxlength="20" placeholder="Confirm Password" required/>
</div>

<div id="RegSubmit">
<input type="submit" value='Register' name="goForRegister" class='Submit' disabled onClick="SignUp" />
</div><br>
</div>
</form>
</div>
</div>
<div id="footer">
&copy;Copyright 2015  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Rights Reserved Feel free to contact us anytime!!!
<br>Your IP:<?php if(isset($forip))
echo $forip.',';
echo $remote;
?>
Total Hits:
</div>
</body>
</html>


