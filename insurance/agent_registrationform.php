<?php
include 'header1.html';
include 'home_header2.';
?>
<html>
<head>
<style>
#reg_div{
border: 1px solid black;
margin-left:30%;
margin-right:30%;
background-color:#AAD4FF;
margin-top:30px;
}
span{
color:red;
}

</style>
</head>
<body>

<?php
// define variables and set to empty values
$usernameErr=$passwordErr=$fnameErr=$lnameErr = $emailErr = $genderErr = $dobErr=$addressErr =$fieldErr=$yoeErr=$contactErr= "";
$usernname=$password=$fname=$lname = $email = $gender = $dob = $address =$field=$yoe=$contact= "";
$valid=0;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   if (empty($_POST["username"]))
     {$usernameErr = "Username is required";
	 $valid++;
	 }
   else
     {
     $username = test_input($_POST["username"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$username))
       {
       $usernameErr = "Only letters and white space allowed";
        $valid++;	   
       }
     }
	   if (empty($_POST["fname"]))
     {$fnameErr = "First name is required";
	 $valid++;
	 }
   else
     {
     $fname = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$fname))
       {
       $fnameErr = "Only letters and white space allowed";
        $valid++;	   
       }
     }
	 
	    if (empty($_POST["lname"]))
     {$lnameErr = "Last name is required";
	 $valid++;
	 }
   else
     {
     $lname = test_input($_POST["lname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lname))
       {
       $lnameErr = "Only letters and white space allowed";
        $valid++;	   
       }
     }
	 
	 
	 
      if (empty($_POST["password"]))
     {$passwordErr = "password is required";
	 $valid++;
	 }
   else
     {
     $password = test_input($_POST["password"]);
     // check if name only contains letters and whitespace
     if ($password==$fname||$password==$lname)
       {
       $passwordErr = "password should not match first name or last name";
        $valid++;	   
       }
	   if (!preg_match("/^[a-zA-Z0-9!@#$%&]+.{8,100}/",$password))
       {
       $passwordErr = "password should conatin atleast one special character and minimum length must be 8";
        $valid++;	   
      }
     }
   if (empty($_POST["email"]))
     {$emailErr = "Email is required";
	 $valid++;
	 }
   else
     {
     $email = test_input($_POST["email"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
       {
       $emailErr = "Invalid email format"; 
       $valid++;
	   }
     }
   if (empty($_POST["gender"]))
     {$genderErr = "Gender is required";
	 $valid++;}
   else
     {$gender = test_input($_POST["gender"]);}
	 
	 if($_POST["dob"]=="")
	 {
	 $dobErr="Select a valid date of birth";
	 $valid++;
	 }
	 else{
	 $dob=test_input($_POST["dob"]);
	 }
	 
	   if (empty($_POST["address"]))
     {$addressErr = "Address is required";
	 $valid++;}
   else
     {$address = test_input($_POST["address"]);}
	 
	   if (empty($_POST["field"]))
     {$fieldErr = "Select a Field";
	 $valid++;}
   else
     {$field = test_input($_POST["field"]);}
	 
	    if (empty($_POST["yoe"]))
     {$yoeErr = "Year of Experience required";
	 $valid++;}
   else
     {$yoe = test_input($_POST["yoe"]);
	 
	 }
	 
	   if (empty($_POST["contact"]))
     {$contactErr = "contact no. is required";
	 $valid++;
	 }
   else
     {
     $contact = test_input($_POST["contact"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]{10}/",$contact))
       {
       $contactErr = "Only numbers allowed of 10 digits";
        $valid++;	   
       }
     }
	 if($valid==0)
	 {
	include 'connection.php';
	 $quer="Select agent_id0 from agent_register where agent_id0='$username'";
	  $query="Select agent_id1 from agent where agent_id1='$username'";
	 $result=mysql_query($quer,$con);
	 $result1=mysql_query($quer,$con);
	 $var=mysql_num_rows($result);
	 $var1=mysql_num_rows($result1);
	 if($var==0 && $var1==0)
	 {
	$num=$_POST["contact"];
	$y=$_POST["yoe"];
   $query="insert into agent_register values('$username','$password','$fname','$lname','$email','$gender','$dob','$address',$num,'$field',$y)";	
	 
	 $retval = mysql_query( $query, $con );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
else{
 echo '<p style="color:red;text-align:center;"><b>Registraion Successful. You will be able to login only Admin approves</b>
 <p><b>You will be redirected to home page .....</b></p></p>';
header( "refresh:5;url=index.php" );

}
}
else{
echo '<p style="color:red;text-align:center;font-size=30px;"><b>User already exist, Enter another username.</b><p>';
}
mysql_close($con);
	 
	 }
	 
}
	 
function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>





<div id="reg_div">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
<table width="500"  align="center" border="0" cellpadding="6" cellspacing="0">

				<tr>
					<th colspan="2"><em>New User Registration</em></th>
				</tr>

				<tr>
					<td colspan="2">
						Please fill this form in order to register.
						Note that the fields with
						<span class="error">*</span> are mandatory. <br><br>
					</td>
				</tr>


				<tr>
					<td align="right">Profile: </td>
					<td><select name="profile">
					<option selected>Agent</option>
					</select>
					</td>
				</tr>
				<tr>
					<td align="right">Username: </td>
					<td><input type="text" name="username" size="15" value=""><span class="error">*<?php echo $usernameErr;?></span></td>
				</tr>
				<tr>
					<td align="right">password: </td>
					<td><input type="password" name="password" size="10" value=""><span class="error">*<?php echo $passwordErr;?></span></td>
				</tr>
				<tr>
					<td align="right">First Name: </td>
					<td><input type="text" name="fname" size="15" value=""><span class="error">*<?php echo $fnameErr;?></span></td>
				</tr>
				<tr>
					<td align="right">Last Name: </td>
					<td><input type="text" name="lname" size="15" value=""><span class="error">*<?php echo $lnameErr;?></span></td>
				</tr>
				<tr>
					<td align="right">Email: </td>
					<td><input type="text" name="email" size="40" value=""><span class="error">*<?php echo $emailErr;?></span></td>
				</tr>
				<tr>
					<td align="right">Gender: </td>
					<td>
				<input type="radio" name="gender" value="female">Female
   <input type="radio" name="gender" value="male">Male
   <span class="error">* <?php echo $genderErr;?></span>
					</td>
				</tr>
				<tr>
					<td align="right">Date of Birth: &nbsp;</td>
					<td><input type="date" value="" name="dob"><span class="error">*<?php echo $dobErr;?></span>
					</td>
				</tr>
				<tr>
					<td align="right">Address: </td>
					<td><input type="text" name="address" size="40" value=""><span class="error">*<?php echo $addressErr;?></span></td>
				</tr>
				
				<tr>
					<td align="right">Contact No: </td>
					<td><input type="text" name="contact" size="10" ><span class="error">*<?php echo $contactErr;?></span>
					
					</td>
				</tr>
				
					<tr>
					<td align="right">Select a Field: </td>
					<td>
				<input type="radio" name="field" value="Vehicle">Vehicle
                <input type="radio" name="field" value="Health">Health
				<input type="radio" name="field" value="Home">Home
   <span class="error">* <?php echo $fieldErr;?></span>
					</td>
				</tr>
				<tr>
					<td align="right">Year of Experience: </td>
					<td><input type="number" min="0" max="10" name="yoe" size="2" ><span class="error">*<?php echo $yoeErr;?></span></td>
				</tr>
				
				
				<tr align="right">
					<td colspan="3" align="center"><input type="submit" name="submit" value="submit">
					<input type="reset" name="reset" value="Reset" class="button">
					</td>
				</tr>
				</table>
				</form>
		</div>
		</body>
		</html>