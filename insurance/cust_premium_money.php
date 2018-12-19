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
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;"></div>';
$amount=$_POST['amnt'];
$user=$_SESSION['username'];
$key=$_POST['policy_key'];
$agent=$_POST['agent'];
//display proper message of premium amount paid or not 
if($amount==0)
{
echo '<script>alert("You have not paid any amount,...You will be redirected to Home page!!")</script>';
header("refresh:0;url=user_home_page.php");
}
if($amount>0)
{
$date1 = date("Y-m-d");
$res=mysql_query("insert into payment values('$key','$user','$agent',$amount,'$date1')");
if($res)
{
echo '<script>alert("You have succcessfully paid amount,...You will be redirected to Home page!!")</script>';
header("refresh:0;url=user_home_page.php");
}

}

?>