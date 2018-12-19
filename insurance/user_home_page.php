<?php
//start session for client ,if no session exist then home page
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
//include all the headers of the page
include 'header1.html';
?>
<?php
include 'cust_home_header.php';
include 'client_sidebar.php';
include 'afterbar.php';
?>

</body>
</html>