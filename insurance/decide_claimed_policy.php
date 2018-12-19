<?php
//start session for agent ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headres of the page
include 'header1.html';
include 'agent_home_header.php';
include 'agent_sidebar.php';
echo '<div style="width:80%;height:85%;float:left;background-color:#d2d2d2;"> </div>';
include 'connection.php';
$userid=$_POST['username'];
$key=$_POST['policy_key'];
$user=$_SESSION['username'];
//update claimed policy status in database
if($_POST['button']=='Approve')
{
$res=mysql_query("update claim_policy set result='Approve' where policy_key2='$key' and username2='$userid' and agent_id2='$user' ");
echo '<script>alert("Claimed Policy Approved Successfully!!")</script>';
header( "refresh:0;url=agent_home_page.php" );

}
else
{

$res=mysql_query("update claim_policy set result='Reject' where policy_key2='$key' and username2='$userid' and agent_id2='$user' ");
echo '<script>alert("Claimed Policy Rejected Successfully!!")</script>';
header( "refresh:0;url=agent_home_page.php" );
}
?>