<?php
//start session for admin ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page
include 'header1.html';
include 'admin_home_header.php';
include 'admin_sidebar.php';
include 'connection.php';
$key=$_POST['policy_key'];

//delete all the details and infromation related to policy from the database
$res1=mysql_query("delete from policy where policy_key='$key'");
$res2=mysql_query("delete from claim_policy where policy_key2='$key'");
$res3=mysql_query("delete from registered_policy where policy_key1='$key'");
$res3=mysql_query("delete from payment where policy_key3='$key'");
if($res1 && $res2 && $res3)
{
include 'afterbar.php';
echo '<script>alert("Policy Removed Successfully!!")</script>';
header( "refresh:0;url=admin_home_page.php" );//www.insurefuture.webuda.com
}
?>
