<?php
//start session for agent ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page
include 'header1.html';
include 'admin_home_header.php';
include 'admin_sidebar.php';
$user=$_SESSION['username'];
$key=$_POST['user'];
include 'connection.php';
$date1 = date("Y-m-d");
$res=mysql_query("select *from agent where agent_id1='$key'");
$row=mysql_fetch_array($res);
$date2 = $row['start_date'];
$agentf=$row['fname2'];
$agentl=$row['lname2'];
$agent=$agentf." $agentl";
$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);


$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year1 - $year2) * 12) + ($month1 - $month2);
//display mesage if the policy registration is done within a month ,no premium available for policy less than a month
if($diff<1)
{
echo '<script>alert("Premium Amount Not available !!")</script>';
header("refresh:0;url=cust_pay_premium.php");
}
else
{
$res=mysql_query("select income from agent where agent_id1='$key'");
$row=mysql_fetch_array($res);
$charge=$row['income'];
$total= $diff*$charge;
$result=mysql_query("select sum(amount_paid1) from agent_salary where username4='$key'");
$row=mysql_fetch_array($result);
$paid=$row['sum(amount_paid1)'];
$pay=$total-$paid;
//display the payment log if there is any premium amount to pay still 
if($pay>0)
{
$str="Payment Details";
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<form action="agent_salary_money.php" method="post">';
echo "<fieldset style='width:80%;margin-left:10%;margin-top:5%'>";
echo "<legend>".$str."</legend>";
echo "<label>Agent Username= </label>";
echo '<input type="text" style="border:none;background-color:#d2d2d2;"name="agent_id" value='.$key.' readonly><br><br>';
echo "<label>Agent = </label>";
echo '<input type="text" style="border:none;background-color:#d2d2d2;"name="agent" value='.$agent.' readonly><br><br>';
echo "<label> Amount Paid Till Now = " .$paid."</label>";
echo  "<br><br>";
echo "<label> Amount to Pay = ".$pay."</label>";
echo  "<br><br>";
echo "<label> Enter Amount to Pay : </label>";
echo "<input type='number' name='amnt'><br><br>";
echo '<input type="submit" value="Pay">';
echo "</fieldset>";
echo '</form></div>';

}
}
?>