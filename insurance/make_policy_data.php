<?php
//start session for admin ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page
include 'header1.html';
include 'admin_home_header.php';
include 'connection.php';
$key=$_POST['policy_key']; $name=$_POST['policy_name']; $type=$_POST['policy_type'];$charge=$_POST['charge'];
$desc=$_POST['description']; $period=$_POST['policy_period'];
//insert the policy details added by admin to the database
$result=mysql_query("insert into policy values ('$key','$name','$type','$charge','$desc','$period')");
if($result)
{
include 'afterbar.php';
echo '<script>alert("Policy Added Successfully!!")</script>';
header( "refresh:0;url=admin_home_page.php" );
}
?>