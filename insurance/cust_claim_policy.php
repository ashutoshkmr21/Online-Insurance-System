<?php
//start session for client ,if no session exist then home page
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
//include all the header of the page 
include 'header1.html';
?>
<?php 
include 'cust_home_header.php';
include 'client_sidebar.php';
?>

<?php
include 'connection.php';
$user=$_SESSION['username'];
$query="select r.policy_key1,p.policy_name,p.policy_type,r.register_date,r.end_date,p.charges from registered_policy r,policy p where p.policy_key=r.policy_key1 and r.username1='$user'";
$result=mysql_query($query,$con);
echo '<div style="padding-left:10px">';
$var = mysql_num_rows($result);
//Display policy available to claim and an option to claim 
if($var>0)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">
<tr style="background-color:#7FAAFF;"><th height="50">Policy Key</th>
<th>Policy Name</th>
<th>Policy Type</th>
<th>Start Date</th>
<th>End Date</th>
<th>Charges per month</th>
<th>Claim Policy</th>';

while($row=mysql_fetch_array($result))
{
$val=$row['policy_key1'];
echo '<form method="post" action="claimpolicy_reg_data.php">';
echo '<tr  >';
echo '<td height="40"><center><input type="text" style="border:none;background-color:#d2d2d2;"name="policy_key" value='.$row['policy_key1'].' readonly></center></td>';
echo "<td><center>".$row['policy_name']."</center></td>";
echo "<td><center>".$row['policy_type']."</center></td>";
echo "<td><center>".$row['register_date']."</center></td>";
echo "<td><center>".$row['end_date']."</center></td>";
echo "<td><center>".$row['charges']."</center></td>";
echo '<td><center><input type="submit" value="Claim"></center>';
echo "</tr>";
echo "</form>";
}
echo "</table></div>";
}
else
{
include 'afterbar.php';
echo '<script>alert("Policy Not Available to Claim !")</script>';
header("refresh:0;url=user_home_page.php");
}
echo "</div>";
?>


</body>
</html>