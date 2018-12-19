<?php
//start session when agent logs in ,if no session exist then home page
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
//include header of the page
include 'header1.html';
?>
<?php
include 'agent_home_header.php';
include 'agent_sidebar.php';
include 'afterbar.php';
?>


</body>
</html>