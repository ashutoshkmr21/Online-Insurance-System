<?php
  //start session for agent ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page
include 'header1.html';
include 'agent_home_header.php';
include 'agent_sidebar.php';
//echo '<div style="width:80%;height:85%;float:left;background-color:#d2d2d2;"> </div>';
include 'connection.php';
$user=$_SESSION['username'];
$result=mysql_query("select *from payment where agent_id3='$user'");
$count=mysql_num_rows($result);
//display the premium details of the client for the respective agent 
if($count>0)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">
<tr style="background-color:#7FAAFF;"><th height="50">Policy Key</th>
<th>Policy Name</th>
<th>Username </th>
<th>Register Date</th>
<th>Amount Paid</th>
<th>Amount Remaining</th>';
$res=mysql_query("select policy_key3,username3,sum(amount_paid) from payment where agent_id3='$user' group by policy_key3,username3");
while($row=mysql_fetch_array($res))
{
$key1=$row['policy_key3'];
$user1=$row['username3'];
$res1=mysql_query("select policy_name,charges from policy where policy_key='$key1'");
$row1=mysql_fetch_array($res1);
$res2=mysql_query("select register_date from registered_policy where username1='$user1' and policy_key1='$key1'");
$row2=mysql_fetch_array($res2);
$date2=$row2['register_date'];
$p_name=$row1['policy_name'];
$date1 = date("Y-m-d");
$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);


$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year1 - $year2) * 12) + ($month1 - $month2);


$charge=$row1['charges'];
$total= $diff*$charge;
$paid=$row['sum(amount_paid)'];
$pay=$total-$paid;

echo "<tr>";
echo '<td height="40"><center>'.$key1.'</center></td>';
echo "<td><center>".$p_name."</center></td>";
echo "<td><center>".$user1."</center></td>";
echo "<td><center>".$date2."</center></td>";
echo "<td><center>".$paid."</center></td>";
echo "<td><center>".$pay."</center></td>";
echo "</tr>";

}
}
else
{
//display message if no policy exist for premium details
include 'afterbar.php';
echo '<script>alert("No Policy Available for Premium Details!!")</script>';
header("refresh:0;url=agent_home_page.php");
}
?>