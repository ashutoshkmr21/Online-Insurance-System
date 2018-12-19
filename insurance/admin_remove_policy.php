<?php
//start session when admin logs in ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
?>
<html>
<head>
<style>
#table{
width:100%;
}

</style>

</head>
<body >
<?php
//add all the header of the page
include 'header1.html';
?>
<?php 
include 'admin_home_header.php';
include 'admin_sidebar.php';
?>

<?php
include 'connection.php';
$query="select  *from policy";
$result=mysql_query($query,$con);
echo '<div style="padding-left:10px">';
$var=mysql_num_rows($result);
//Show all policies available to remove
if($var>0)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">
<tr style="background-color:#7FAAFF;"><th height="50">Policy Key</th>
<th>Policy Name</th>
<th>Policy Type</th>
<th>Description</th>
<th>Charges per month</th>
<th>Period(in months)</th>
<th>Remove Policy</th>';
while($row=mysql_fetch_array($result))
{
echo '<form method="post" action="remove_policy_data.php">';
echo '<tr  >';
echo '<td height="40"><center><input type="text" style="border:none;background-color:#d2d2d2;"name="policy_key" value='.$row['policy_key'].' readonly></center></td>';
echo "<td><center>".$row['policy_name']."</center></td>";
echo "<td><center>".$row['policy_type']."</center></td>";
echo "<td><center>".$row['description']."</center></td>";
echo "<td><center>".$row['charges']."</center></td>";
echo "<td><center>".$row['policy_period']."</center></td>";
echo '<td><center><input type="submit" value="Remove" size="10"></center>';
echo "</tr>";
echo "</form>";
}
echo "</table></center>";
echo '</div>';
}
else
{
include 'afterbar.php';
echo '<script>alert("No Policy Available!!")</script>';
header( "refresh:0;url=admin_home_page.php" );
}
echo "</div>";
?>


</body>
</html>