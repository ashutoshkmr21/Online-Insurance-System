<?php
//start session for client ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the header of the page
include 'header1.html';
include 'cust_home_header.php';
include 'client_sidebar.php';
include 'connection.php';
$user=$_SESSION['username'];
$query="select r.policy_key2,r.claim_date,r.result,c.policy_type,c.policy_name from claim_policy r,policy c where r.policy_key2=c.policy_key and r.username2='$user'";
$result=mysql_query($query,$con);
$var=mysql_num_rows($result);
//display the status of all the claimed policies
if($var>0)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">
<tr style="background-color:#7FAAFF;"><th height="50">Policy Key</th>
<th>Policy Name</th>
<th>Policy Type </th>
<th>Claim Date</th>
<th>Status</th>';
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td height='40'><center>".$row['policy_key2']."</center></td>";
echo "<td><center>".$row['policy_name']."</center></td>";
echo "<td><center>".$row['policy_type']."</center></td>";
echo "<td><center>".$row['claim_date']."</center></td>";
if($row['result']=="")
{
$str="Status Pending";
echo "<td><center>".$str."</center></td>";
}
else
echo "<td><center>".$row['result']."</center></td>";
echo "</tr>";
}
echo "</table></div>";
}
else
{
include 'afterbar.php';
echo '<script>alert("No Claimed Policy for Status !!")</script>';
header( "refresh:0;url=user_home_page.php" );
}
?>