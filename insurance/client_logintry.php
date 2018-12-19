<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><title>Insurance Management System</title>

<style>
        .black_overlay{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.80;
            filter: alpha(opacity=80);
        }
        .white_content {
            display: none;
            position: absolute;
            top: 20%;
            left: 25%;
            width: 50%;
            height: 70%;
            padding: 16px;
            border:none;
            background-color: white;
            z-index:1002;
            overflow: hidden;
        }
    #light label{
    display:block;
    text-align:left;
    margin-top: 10px;
    width:200px;
    float:none;
    padding-left:10px;
    font-family: Kavoon;

             }
    #light input{
    display: block;
    height: 30px;
    float:left;
    padding:5px;
    width:210px;
    margin:2px 0 20px 10px;
    font-family: Nova;
    font-size: 12px;

}
#light button{
    display: inline-block;
    
    margin:2px 0 20px 10px;
    width:210px;
    height:38px;
    
    background-color: #0071CC;
    color:#FFFFFF;
    text-align:center;
    font-size: 18px;
    font-family: Nova;
    border-radius: 5px;
    outline: none;

}
#light button:hover
{
    background: #428217;
}    

#left_side{
float: left;
width:60%;
}
#right_side{
    margin-top: -35%;
    float:left;
    width:350px;
    margin-left: 45%;
    height: 350px;
}
    </style>
    <script type="text/javascript">

   window.document.onkeydown = function (e)
{
    if (!e){
        e = event;
    }
    if (e.keyCode == 27){
        lightbox_close();
    }
}

function lightbox_open(){
    window.scrollTo(0,0);
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';
    //document.getElementById('fr').innerHTML="a.html";
}

function lightbox_close(){
    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
	window.location.assign("index.php");
}
  </script>



<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body style="background-color:transparent" onload="lightbox_open();">
<?php
//include all the headers of the page
include "header1.html";
?>
<?php
include "home_header2.php";
?>
<?php
$error="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$user=$_POST["username"];
$pass=$_POST["password"];
include 'connection.php';
//check if the user is valid user or not 
	 $quer="Select *from customer where username='$user' and password='$pass'";
	 $result=mysql_query($quer,$con);
	  $var=mysql_num_rows($result);
	 if($var==1)
	 {
	 $_SESSION['username']=$user;
	 $_SESSION['password']=$pass;
	 header("Location:user_home_page.php");
	 }
	 else{
	 $error="Username or Password is incorrect";
	 }
	
}
?>
<div id="side_bar" style="float:left">
<button id="login" disabled=true;>LOGIN SECTION</button>
<a href="#" ><button class="button ">Agent</button></a>
<a href="#"><button class="button">Client</button></a>
<a href="#"><button class="button">Admin</button></a>
</div>
<div width="80%" style="float:left;height:70%">
<?php
include("slider.html");
?>
 </div>
 
 <div id="light" class="white_content">

            <span style="padding-left:650px;margin-top:-1;">
            <a href = "javascript:void(0)" onclick="lightbox_close();"><img src="close.png"></a>
            </span>
			<!-- Client Login Form -->
			<h2>Client Login Form</h2>
			<p style="clear:both;margin-left:10px;"><b style="color:red"><?php echo $error; ?></b></p>
        <div id="left_side">
        <form name="login" action="<?php $_SERVER['PHP_SELF']?>" method="post" >

        <label>Username</label>
        <input type="text" name="username">
        <br/>
        <label>Password</label>

        <input type="password" name="password">
        <br/><br/><br/>
        <button type="submit">Submit</button>
    </form>
	<p>If not have account then <a href="client_registrationform_try.php"><b style="color:black">Register</b></a>
    </div>
    <div id="right_side"><iframe src="slider.html" frameborder="0" width="340px" height="340px" scrollbar="none"></iframe></div>
        </div>
    
        <div id="fade" class="black_overlay"></div>
        
</body>

</html>