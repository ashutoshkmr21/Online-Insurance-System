<?php
//start session for agent ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
include 'header1.html';
include 'admin_home_header.php';
include 'admin_sidebar.php';
include 'connection.php';
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;"></div>';
$amount=$_POST['amnt'];
$user=$_SESSION['username'];
$key=$_POST['agent_id'];
$agent=$_POST['agent'];
//Display message when no amount paid 
if($amount==0)
{
echo '<script>alert("You have not paid any amount,...You will be redirected to Home page!!")</script>';
header("refresh:0;url=admin_home_page.php");
}
//Add the asalary paid to database corresponding to respective agent
if($amount>0)
{
$date1 = date("Y-m-d");
$res=mysql_query("insert into agent_salary values('$key',$amount,'$date1')");
if($res)
{
echo '<script>alert("You have succcessfully paid amount,...You will be redirected to Home page!!")</script>';
header("refresh:0;url=admin_home_page.php");
}

}

?>