<?php
//start session when agent logs in ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
?>
<html>
<head>
</head>
<body>
<?php
//include all the headers of the page
include 'header1.html';
include 'agent_home_header.php';
include 'agent_sidebar.php';
$user=$_SESSION['username'];
include 'connection.php';
$user=$_SESSION['username'];
$query="select r.policy_key1,r.register_date,r.end_date,c.fname,c.lname from registered_policy r,customer c where agent_id='$user' and c.username in (select username1 from registered_policy where agent_id='$user')";
$result=mysql_query($query,$con);
$var=mysql_num_rows($result);
if($var>0)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:68%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">
<tr style="background-color:#7FAAFF;"><th height="50">Policy Key</th>
<th>Policy Name</th>
<th>First Name</th>
<th>Last Name</th>
<th>Register Date</th>
<th>End Date</th>';
while($row=mysql_fetch_array($result))
{
$val=$row['policy_key1'];
$res=mysql_query("select policy_name from policy where policy_key='$val'");
$row1=mysql_fetch_array($res);
echo "<tr>";
echo '<td height="40"><center>'.$row['policy_key1'].'</center></td>';
echo "<td><center>".$row1['policy_name']."</center></td>";
echo "<td><center>".$row['fname']."</center></td>";
echo "<td><center>".$row['lname']."</center></td>";
echo "<td><center>".$row['register_date']."</center></td>";
echo "<td><center>".$row['end_date']."</center></td>";
echo "</tr>";
}
echo "</table></div>";
}
else
{
include 'afterbar.php';
echo '<script>alert("No Client available!!")</script>';
header( "refresh:0;url=agent_home_page.php" );
}
?>
</body>
</html>