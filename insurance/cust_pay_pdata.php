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
$key=$_POST['policy_key'];
include 'connection.php';
$date1 = date("Y-m-d");
$res=mysql_query("select *from registered_policy where policy_key1='$key' and username1='$user'");
$row=mysql_fetch_array($res);
$date2 = $row['register_date'];
$agent=$row['agent_id'];
$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);


$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year1 - $year2) * 12) + ($month1 - $month2);
//Show premium details only when policy reistration is done before one month
if($diff<1)
{
echo '<script>alert("Premium Amount Not available !!")</script>';
header("refresh:0;url=cust_pay_premium.php");
}
else
{
$res=mysql_query("select charges from policy where policy_key='$key'");
$row=mysql_fetch_array($res);
$charge=$row['charges'];
$total= $diff*$charge;
$result=mysql_query("select sum(amount_paid) from payment where username3='$user' and policy_key3='$key' ");
$row=mysql_fetch_array($result);
$paid=$row['sum(amount_paid)'];
$pay=$total-$paid;
//display the amount to pay if the premium amount is available
if($pay>0)
{
$str="Payment Details";
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<form action="cust_premium_money.php" method="post">';
echo "<fieldset style='width:80%;margin-left:10%;margin-top:5%'>";
echo "<legend>".$str."</legend>";
echo "<label>Policy Key= </label>";
echo '<input type="text" style="border:none;background-color:#d2d2d2;"name="policy_key" value='.$key.' readonly><br><br>';
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