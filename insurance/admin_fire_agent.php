<?php
//start session when admin logs in ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
?>
<html>
<head>
<style>

</style>

</head>
<body>
<?php
//include all the headers of the page
include 'header1.html';
?>
<?php 
include 'admin_home_header.php';
include 'admin_sidebar.php';
?>
<?php
include 'connection.php';
//Display all the agents available to fire
$query="select agent_id1,fname2,lname2,email2,gender2,dob2,address2,field_type1,yoe1,start_date,income from agent";
$result=mysql_query($query,$con);
$var=mysql_num_rows($result);
if($var>0)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
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
<th>Joining Date</th>
<th>Salary</th>
<th>Fire Agent</th>';

while($row=mysql_fetch_array($result))
{
echo '<form method="post" action="fire_agent_data.php">';
echo '<tr  >';
echo '<td height="40"><center><input type="text" style="border:none;background-color:#d2d2d2;"name="agent_id" value='.$row['agent_id1'].' readonly></center></td>';
echo "<td><center>".$row['fname2']."</center></td>";
echo "<td><center>".$row['lname2']."</center></td>";
echo "<td><center>".$row['email2']."</center></td>";
echo "<td><center>".$row['gender2']."</center></td>";
echo "<td><center>".$row['dob2']."</center></td>";
echo "<td><center>".$row['address2']."</center></td>";
echo "<td><center>".$row['field_type1']."</center></td>";
echo "<td><center>".$row['yoe1']."</center></td>";
echo '<td ><center>'.$row['start_date'] .'</center></td>';
echo '<td ><center>'.$row['income'].'</center></td>';
echo '<td ><center><input type="submit" value="Fire" size="20"></center>';
echo "</tr>";
echo "</form>";
}
echo "</table></div>";
}
else
{
include 'afterbar.php';
echo '<script>alert("No Agent Available!!")</script>';
header( "refresh:0;url=admin_home_page.php" );
}
?>


</body>
</html>