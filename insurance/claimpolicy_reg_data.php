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
//include all the headers of the page
include 'header1.html';
?>
<?php 
include 'cust_home_header.php';
include 'client_sidebar.php';
echo '';
?>
<div style="width:80%;height:100%;float:left;background-color:#d2d2d2;"></div>
<?php
include 'connection.php';
$key=$_POST['policy_key'];
$user=$_SESSION['username'];
$query="select *from registered_policy where policy_key1='$key'";
$result=mysql_query($query,$con);
$row=mysql_fetch_array($result);
$agent=$row['agent_id'];
$date=Date('Y/m/d');
//show message when policy is claimed

$res=mysql_query("select *from claim_policy where policy_key2='$key' and username2='$user'");
$row=mysql_num_rows($res);
if($row>0)
{
echo '<script>alert("Policy Claimed Already!!")</script>';
header("refresh:0;url=user_home_page.php");
}
else
{
$query="insert into claim_policy values('$key','$user','$agent','$date','')";
if(mysql_query($query,$con))
{
echo '<script>alert("Policy Claimed Successfully!!")</script>';
header("refresh:0;url=user_home_page.php");
}
}
?>


</body>
</html>