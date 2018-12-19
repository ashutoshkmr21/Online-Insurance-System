<html>
<head>
<style>
#table{
width:100%;
}


</style>

</head>
<body>
<?php
//start session when admin logs in ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page

include 'header1.html';
?>
<?php 
include 'admin_home_header.php';
include 'admin_sidebar.php';
?>
<?php
include 'connection.php';
 
// Display all the agents request available for hiring
$query="select agent_id0,fname1,lname1,email1,gender1,dob1,address1,field_type,yoe from agent_register";
$result=mysql_query($query,$con);
echo '<div style="padding-left:10px">';
$var=mysql_num_rows($result);
if($var>0)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:68%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">

<tr style="background-color:#7FAAFF;"><th height="50">Agent Username</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email Id</th>
<th>Gender</th>
<th>DOB</th>
<th>Address</th>
<th>Field</th>
<th>YOE</th>
<th>Salary</th>
<th>Hire Agent</th>';

while($row=mysql_fetch_array($result))
{
echo '<form method="post" action="hire_agent_data.php">';
echo '<tr  >';
echo '<td height="40"><center><input type="text" style="border:none;background-color:#d2d2d2;"name="agent_id0" value='.$row['agent_id0'].' readonly></center></td>';
echo "<td><center>".$row['fname1']."</center></td>";
echo "<td><center>".$row['lname1']."</center></td>";
echo "<td><center>".$row['email1']."</center></td>";
echo "<td><center>".$row['gender1']."</center></td>";
echo "<td><center>".$row['dob1']."</center></td>";
echo "<td><center>".$row['address1']."</center></td>";
echo "<td><center>".$row['field_type']."</center></td>";
echo "<td><center>".$row['yoe']."</center></td>";
echo '<td ><center><input type="text" style="border:none"name="salary" placeholder="Enter salary"></center></td>';
echo '<td><center><input type="submit" value="Hire"></center>';
echo "</tr>";
echo "</form>";
}
echo "</table></div>";
}
else
{
include 'afterbar.php';
echo '<script>alert("No Agent Request Available!!")</script>';
header( "refresh:0;url=admin_home_page.php" );
}
echo "</div>";
?>


</body>
</html>