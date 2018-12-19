<?php
//start session for client ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page
include 'header1.html';
include 'cust_home_header.php';
include 'client_sidebar.php';
include 'afterbar.php';
include 'connection.php';
$key=$_POST['policy_key'];
$user=$_SESSION['username'];
$quer="select * from registered_policy where policy_key1='$key' and username1='$user'";
$result=mysql_query($quer,$con);
$var= mysql_num_rows($result);
if($var>0){
echo '<script>alert("Policy Already Registered!!")</script>';
header("refresh:0;url=user_home_page.php");
}
else{
$quer=mysql_query("select *from policy where policy_key='$key'");
$row=mysql_fetch_array($quer);
$period=" +".$row['policy_period']." month";
$date =$date1= date("Y-m-d");
$date = strtotime(date("Y-m-d", strtotime($date)) . $period);
$date = date("Y-m-d",$date);
//$res=mysql_query("select policy_type from policy where policy_key='$key'");
//$row=mysql_fetch_array($res);
$policy_type=$row['policy_type'];
$res1=mysql_query("select *from agent where field_type1='$policy_type' order by rand() limit 0,1");
$row=mysql_num_rows($res1);
//insert the details of registered policy 
if($row==1)
{
$row=mysql_fetch_array($res1);
$agent_name=$row['agent_id1'];
$query="insert into registered_policy values('$key','$user','$date1','$date','$agent_name')";
$result=mysql_query($query,$con);
if($result)
{
echo '<script>alert("Policy Registered Successfully!!")</script>';
header("refresh:0;url=user_home_page.php");

}
}
else
{
echo '<script>alert("Sorry No agent available. Please try after some time!!")</script>';
header("refresh:0;url=user_home_page.php");
}
}

?>