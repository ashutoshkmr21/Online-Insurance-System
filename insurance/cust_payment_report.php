<?php
//start session for client ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page
include 'header1.html';
include 'cust_home_header.php';
include 'client_sidebar.php';
include 'connection.php';
$user=$_SESSION['username'];
$result=mysql_query("select *from payment where username3='$user'");
$count=mysql_num_rows($result);
//display all the payment details of the policy 
if($count>0)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">
<tr style="background-color:#7FAAFF;"><th height="50">Policy Key</th>
<th>Policy Name</th>
<th>Agent </th>
<th>Register Date</th>
<th>Amount Paid</th>
<th>Total Amount Paid</th>
<th>Amount To Pay</th>
<th>Date of Payment</th>'; 
while($row=mysql_fetch_array($result))
{
$res=mysql_query("select policy_key3,sum(amount_paid) from payment where username3='$user' group by policy_key3");
$row3=mysql_fetch_array($res);
$key1=$row['policy_key3'];
$res1=mysql_query("select policy_name,charges from policy where policy_key='$key1'");
$row1=mysql_fetch_array($res1);
$res2=mysql_query("select register_date,agent_id from registered_policy where username1='$user' and policy_key1='$key1'");
$row2=mysql_fetch_array($res2);
$date2=$row2['register_date'];
$p_name=$row1['policy_name'];
$agent=$row2['agent_id'];
$date1 = date("Y-m-d");
$amt_paid=$row['amount_paid'];
$dop=$row['pay_date'];
$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);


$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year1 - $year2) * 12) + ($month1 - $month2);


$charge=$row1['charges'];
$total= $diff*$charge;
$paid=$row3['sum(amount_paid)'];
$pay=$total-$paid;

echo "<tr>";
echo '<td height="40"><center>'.$key1.'</center></td>';
echo "<td><center>".$p_name."</center></td>";
echo "<td><center>".$agent."</center></td>";
echo "<td><center>".$date2."</center></td>";
echo "<td><center>".$amt_paid."</center></td>";
echo "<td><center>".$paid."</center></td>";
echo "<td><center>".$pay."</center></td>";
echo "<td><center>".$dop."</center></td>";
echo "</tr>";

}

}
else{
include 'afterbar.php';
echo '<script>alert("No Payment Data Available yet!!")</script>';
header("refresh:0;url=user_home_page.php");

}

?>
