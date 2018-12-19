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
$key=$_POST['agent_id'];
$quer="select  *from agent where agent_id1='$key'";
$result=mysql_query($quer,$con);
while($row=mysql_fetch_array($result)){
$pass=$row['password2'];$mail=$row['email2'];$fnam=$row['fname2'];$lnam=$row['lname2'];$gen=$row['gender2'];$dob=$row['dob2'];$addr=$row['address2'];
$contact=$row['contact2'];$field=$row['field_type1'];$yoe=$row['yoe1'];
}
//insert the details of fired agent into other database for future hiring 
$query="insert into agent_register values('$key','$pass','$fnam','$lnam','$mail','$gen','$dob','$addr',$contact,'$field',$yoe)";
$result=mysql_query($query,$con);
//remove data of the agent fired from the database 
if($result)
{
include 'afterbar.php';
echo '<script>alert("Agent Fired Successfully!!")</script>';
$res=mysql_query("delete from agent where agent_id1='$key'");
$res=mysql_query("delete from claim_policy where agent_id2='$key'");
$res=mysql_query("delete from registered_policy where agent_id='$key'");
$res=mysql_query("delete from payment where agent_id3='$key'");
header( "refresh:0;url=admin_home_page.php" );//www.insurefuture.webuda.com
}
?>
