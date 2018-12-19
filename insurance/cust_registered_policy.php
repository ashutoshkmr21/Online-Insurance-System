<html>
<head>
</head>
<body>
<?php
//start session for client ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page
include 'header1.html';
include 'cust_home_header.php';
include 'client_sidebar.php';
$user=$_SESSION['username'];
include 'connection.php';
$query="select r.policy_key1,p.policy_type,r.register_date,r.end_date,p.description,p.charges from registered_policy r,policy p where p.policy_key=r.policy_key1 and r.username1='$user'";
$result=mysql_query($query,$con);
$var=mysql_num_rows($result);
//Displayy all the registered policy of the client if there exist any 
if($var>0)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">
<tr style="background-color:#7FAAFF;"><th height="50">Policy Key</th>
<th>Policy Type</th>
<th>Description</th> 
<th>Start Date</th>
<th>End Date</th>
<th>Charges</th>';
while($row=mysql_fetch_array($result))
{

echo "<tr>";
echo '<td height="40"><center>'.$row['policy_key1'].'</center></td>';
echo "<td><center>".$row['policy_type']."</center></td>";
echo "<td><center>".$row['description']."</center></td>";
echo "<td><center>".$row['register_date']."</center></td>";
echo "<td><center>".$row['end_date']."</center></td>";
echo "<td><center>".$row['charges']."</center></td>";
echo "</tr>";
}
echo "</table></div>";
}
else
{
include 'afterbar.php';
echo '<script>alert("No Policy Registered yet!!")</script>';
header("refresh:0;url=user_home_page.php");
}
?>
</body>
</html>