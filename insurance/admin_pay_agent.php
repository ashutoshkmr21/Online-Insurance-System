<?php
//start session when admin logs in ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
?>
<html>
<head>
</head>
<body>
<?php
include 'header1.html';
include 'admin_home_header.php';
include 'admin_sidebar.php';
$user=$_SESSION['username'];
include 'connection.php';
$query="select*from agent ";
$result=mysql_query($query,$con);
$var=mysql_num_rows($result);
//show all the agent list to whom salary has to be pay
if($var>0)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">
<tr style="background-color:#7FAAFF;"><th height="50">Agent Username</th>
<th>First Name</th>
<th>Last Name</th>
<th>Field Type</th>
<th>Start Date</th>
<th>Pay Salary</th>';
while($row=mysql_fetch_array($result))
{
echo '<form method="post" action="agent_pay_salary.php">';
echo "<tr>";
echo '<td height="40"><center><input type="text" style="border:none;background-color:#d2d2d2;"name="user" value='.$row['agent_id1'].' readonly></center></td>';
echo "<td><center>".$row['fname2']."</center></td>";
echo "<td><center>".$row['lname2']."</center></td>";
echo "<td><center>".$row['field_type1']."</center></td>";
echo "<td><center>".$row['start_date']."</center></td>";
echo '<td><center><input type="submit" value="Pay Salary"></center>';
echo "</tr>";
echo "</form>";
}
echo "</table></div>";
}
else
{
include 'afterbar.php';
echo '<script>alert("No Policy Available for Paying Premium!!")</script>';
header("refresh:0;url=user_home_page.php");
}
?>
</body>
</html>