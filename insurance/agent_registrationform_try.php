
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><title>Insurance Management System</title>

<style>

.error{
color:red;
}
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
            top: 15%;
            left: 25%;
            width: 40%;
            height: 70%;
            padding: 16px;
            border:none;
            background-color: white;
            z-index:1002;
            overflow-y: auto;
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
 /*   #light input{
   
    height: 30px;
    width:210px;
    margin:2px 0 10px 10px;
    font-family: Nova;
    font-size: 12px;

}*/

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
margin-left:20px;
float: left;
width:100%;
}
    </style>
    <script type="text/javascript">
//Display transparent registration form(pop up) 
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
include 'home_sidebar.php';
include 'afterbar.php';
?>
<?php
//Validate all the input fields of the agent form with given conditions
$error="";
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
   
     if ($password==$fname||$password==$lname)
       {
       $passwordErr = "password should not match first name or last name";
        $valid++;	   
       }
	     // check if password contains atleast one  special character,digit,uppercase,lowercase letter and minimum length must be 8
	   if (!preg_match("/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/",$password))
       {
        $passwordErr = "password should conatin atleast one special character,digit,uppercase,lowercase letter and minimum length must be 8";
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
	 //check if gender selected or not
   if (empty($_POST["gender"]))
     {$genderErr = "Gender is required";
	 $valid++;}
   else
     {$gender = test_input($_POST["gender"]);}
	 //check if date of birth is selected or not
	 
	 	 $date1=$_POST["dob"];
	 
	 $date2 = date("Y-m-d");

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);


$month1 = date('m', $ts1);
$month2 = date('m', $ts2);
$day1 = date('d', $ts1);
$day2 = date('d', $ts2);

$diff = (($year1 - $year2) * 12*30) + (($month1 - $month2)*30)+($day2-$day1);
	 
	 
	 if($_POST["dob"]=="")
	 {
	 $dobErr="Select a valid date of birth";
	 $valid++;
	 }
	 else{
	 if($diff>0||$diff==0)
	 {
	 $dobErr="Date of Birth must be before current date";
	 $valid++;
	 }
	 else
	 {
	 $dob=test_input($_POST["dob"]);
	 }
	 }
	 //check if address field is filled or not
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
	 //check if year of experience is filled or not 
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
     // check if contact numbers only contains 10 digit numbers or not
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
	 $result1=mysql_query($query,$con);
	 $var=mysql_num_rows($result);
	 $var1=mysql_num_rows($result1);
	 //if agent details are valid and if the agent has not registered before the store in database 
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
//display message if registration done successfully
else{
echo '<script>alert("Registraion Successful. You will be able to login only Admin approves!!")</script>';
header("refresh:0;url=index.php");
}
}
//display message if user already exist 
else{
$error="User already exist, Enter another username";
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
<!-- Agent Registration/sign up form -->
 
 <div id="light" class="white_content">
  <span style="padding-left:490px;margin-top:-1;">
            <a href = "javascript:void(0)" onclick="lightbox_close();"><img src="close.png"></a>
            </span>
 <h2> Agent Sign Up</h2>
           Please fill this form in order to register.
						Note that the fields with
						<span class="error">*</span> are mandatory.
						<p style="float:left;margin-left:10px;"><b style="color:red"><?php echo $error; ?></b></p>
        <div id="left_side">
        <form name="login" action="<?php $_SERVER['PHP_SELF']?>" method="post" >

        <label>Username</label>
        <input type="text" name="username"><span class="error">*<?php echo $usernameErr;?></span>
        <br/>
        <label>Password</label>

        <input type="password" name="password"><span class="error">*<?php echo $passwordErr;?></span>
        <br/>
		 <label>First Name</label>

        <input type="text" name="fname"><span class="error">*<?php echo $fnameErr;?></span>
        <br/>
		 <label>Last Name</label>

        <input type="text" name="lname"><span class="error">*<?php echo $lnameErr;?></span>
        <br/>
		 <label>Email</label>

        <input type="email" name="email"><span class="error">*<?php echo $emailErr;?></span>
        <br/>
		 <label>Gender</label>

        <input type="radio" name="gender" class="radio"  value="female">Female
		<input type="radio" name="gender" class="radio"  value="male">Male
		<span class="error">*<?php echo $genderErr;?></span>
        <br/>
		 <label>Date Of Birth</label>

        <input type="date" name="dob" value=""><span class="error">*<?php echo $dobErr;?></span>
        <br/>
		 <label>Address</label>

        <input type="text" name="address"><span class="error">*<?php echo $addressErr;?></span>
        <br/>
		 <label>Contact No</label>

        <input type="text" name="contact"><span class="error">*<?php echo $contactErr;?></span>
        <br/>
		 <label>Select a field</label>

        <input type="radio" name="field"class="radio" value="Vehicle">Vehicle
		<input type="radio" name="field" class="radio"  value="Health">Health
		<input type="radio" name="field" class="radio"  value="Home">Home
        <span class="error">*<?php echo $fieldErr;?></span>
		<br/>
		<label>Year Of Experience</label>

        <input type="number" name="yoe" min="0" max="10" size="5"><span class="error">*<?php echo $yoeErr;?></span>
        <br/>
		<br/><br/><br/>
        <button type="submit">Submit</button>
		<button type="reset">Reset</button>
    </form>
    </div>
        </div>
    
        <div id="fade" class="black_overlay"></div>
        
</body>

</html>