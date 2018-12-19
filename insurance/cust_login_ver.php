<?php
//start session for client ,if no session exist then home page
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$user=$_POST["username"];
$pass=$POST["password"];
include 'connection.php';
	 $quer="Select *from customer where username='$user' and password='$pass'";
	 $result=mysql_query($quer,$con);
	  $var=mysql_num_rows($result);
	  //verify login details from the database
	 if($var==1)
	 {
	 $_SESSION['username']=$user;
	 $_SESSION['password']=$pass;
	 header("Location:user_home_page.php");
	 }
	 else{
	 header("Location:login_main.php");

	 }

}
?>