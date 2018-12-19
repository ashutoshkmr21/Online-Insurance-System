<?php
session_start();
include 'header1.html';
include 'home_header2.php';
?>
<html>
<head>
<style>
form{
border:1px solid black;
background-color:#AAD4FF;
margin-left:400px;
margin-right:400px;

}
</style>
</head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$user=$_POST["username"];
$pass=$_POST["password"];
include 'connection.php';
	 $quer="Select *from agent where agent_id1='$user' and password2='$pass'";
	 $result=mysql_query($quer,$con);
	  $var=mysql_num_rows($result);
	 if($var==1)
	 {
	 $_SESSION['username']=$user;
	 $_SESSION['password']=$pass;
	 header("Location:agent_home_page.php");
	 }
	 else{
	
	 	 echo '<p style="color:red;text-align:center;"><b>Username or password is wrong or Agent is not approved yet.</b></p>';
		
	 }
}
?>

<form name="login" action="<?php $_SERVER['PHP_SELF']?>" method="post">

	<table>
		<tr><td><br/><br/><br/></td></tr>
	</table>
	
	<table align="center" border="0" width="300" cellpadding="6" cellspacing="0" class="std">		

		
		<tr><th colspan="2"><em>IMS Login System</em></th></tr>

		<tr>
			
			<td align="right">Username: </td>
					
		<td align="left"><input type="text" name="username" size="30"></td>
	
		</tr>
		
		<tr>
		
			<td align="right">Password:</td> 
			<td align="left"><input type="password" name="password" size="30"></td>
			
		</tr>
		
		
		<tr>
			<td colspan="2" align="center" valign="bottom" nowrap>
				<input type="submit" name="login" value="Login"  />
			</td>
		</tr>
	

	</table>

	<br>

	<table align="center" border="0" width="300" cellpadding="6" cellspacing="0">
		<tr>
			<td>
				If you have not done so then please  <a href="agent_registrationform.php"><b>register</b></a>, its free. 
			</td>
		</tr>
	</table>



</form>
</body>
</html>
