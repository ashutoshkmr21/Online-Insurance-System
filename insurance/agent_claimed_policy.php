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
include 'connection.php';
$user=$_SESSION['username'];
// Display all the policy claimed by registered users and show the option to reject or approve 
$res=mysql_query("select *from claim_policy where result='' and agent_id2='$user'");
$var=mysql_num_rows($res);
if($var>0)
{
$query="select r.policy_key2,r.username2,r.claim_date,c.fname,c.lname from claim_policy r,customer c where c.username in (select username2 from claim_policy where agent_id2='$user')";
$result=mysql_query($query,$con);
if($result)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">
<tr style="background-color:#7FAAFF;"><th height="50">Policy Key</th>
<th>Policy Name</th>
<th>Username </th>
<th>First Name</th>
<th>Last Name</th>
<th>Claim Date</th>
<th>Start Date</th>
<th>End Date</th>
<th>Reject Claim</th>
<th>Approve Claim</th>';
while($row=mysql_fetch_array($result))
{
echo '<form method="post" action="decide_claimed_policy.php">';
$val=$row['policy_key2'];
$res=mysql_query("select policy_name from policy where policy_key='$val'");
$res1=mysql_query("select register_date,end_date from registered_policy where policy_key1='$val' and agent_id='$user'");
$row1=mysql_fetch_array($res);
$row2=mysql_fetch_array($res1);
echo "<tr>";
echo '<td height="40"><center><input type="text" style="border:none;background-color:#d2d2d2;"name="policy_key" value='.$row['policy_key2'].' readonly></center></td>';
echo '<td height="40"><center><input type="text" style="border:none;background-color:#d2d2d2;"name="username" value='.$row['username2'].' readonly></center></td>';
echo "<td><center>".$row1['policy_name']."</center></td>";
echo "<td><center>".$row['fname']."</center></td>";
echo "<td><center>".$row['lname']."</center></td>";
echo "<td><center>".$row['claim_date']."</center></td>";
echo "<td><center>".$row2['register_date']."</center></td>";
echo "<td><center>".$row2['end_date']."</center></td>";
echo '<td><center><input type="submit" name="button" value="Reject"></center>';
echo '<td><center><input type="submit" name="button" value="Approve"></center>';
echo "</tr>";
echo "</form></div>";
}
echo "</table>";
}
else
{
include 'afterbar.php';

echo '<script>alert("No Claimed Policy Available!!")</script>';
header( "refresh:0;url=agent_home_page.php" );
}
}
else
{
include 'afterbar.php';
echo '<script>alert("No Claimed Policy Available!!")</script>';
header( "refresh:0;url=agent_home_page.php" );
}
?>
</body>
</html>