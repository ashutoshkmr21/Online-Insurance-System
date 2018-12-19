<?php
//start session when admin logs in ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
?>
<html>
<head>
<style>
#afterside
{
width:80%;
margin-top:2%;
float:right;
//background-color:#d2d2d2;
height:100%;
}
</style>
</head>

<body>

<?php
//include all the headers of the page
include 'header1.html';
?>
<?php
include 'admin_home_header.php';
include 'admin_sidebar.php'
?>
<div id="afterside">
<?php include 'slider.html' ?>
</div>


</body>
</html>