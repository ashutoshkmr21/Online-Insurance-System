<?php
//start session for agent ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page
include 'header1.html';
include 'admin_home_header.php';
include 'admin_sidebar.php';
include 'connection.php';
$key=$_POST['agent_id0'];
$sal=$_POST['salary'];
$quer="select  *from agent_register where agent_id0='$key'";
$result=mysql_query($quer,$con);
while($row=mysql_fetch_array($result)){
$pass=$row['password1'];$mail=$row['email1'];$fnam=$row['fname1'];$lnam=$row['lname1'];$gen=$row['gender1'];$dob=$row['dob1'];$addr=$row['address1'];
$contact=$row['contact1'];$field=$row['field_type'];$yoe=$row['yoe'];
}
//insert the details of agent hired into database
$date=Date('Y-m-d');
$query="insert into agent values('$key','$pass','$fnam','$lnam','$mail','$gen','$dob','$addr',$contact,'$field',$yoe,'$date',$sal)";
$result=mysql_query($query,$con);
if($result)
{
include 'afterbar.php';
echo '<script>alert("Agent Hired Successfully!!")</script>';
$res=mysql_query("delete from agent_register where agent_id0='$key'");
header( "refresh:0;url=admin_home_page.php" );

}
?>