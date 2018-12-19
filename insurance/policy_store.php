<?php
//start session for admin ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page
include 'header1.html';
include 'admin_home_header.php';
include 'admin_sidebar.php';
include 'afterbar.php';
include 'connection.php';
//insert the policy details into database
$p_id=$_POST['p_key'];$p_name=$_POST['p_name'];$p_type=$_POST['field'];$p_charge=$_POST['p_cost'];$p_period=$_POST['p_period'];$p_desc=$_POST['p_desc'];
$result=mysql_query("insert into policy values('$p_id','$p_name','$p_type',$p_charge,'$p_desc',$p_period)");
if($result)
{
include 'afterbar.php';
echo '<script>alert("Policy Added Successfully!!")</script>';
header("refresh:0;url=admin_home_page.php");
}
?>