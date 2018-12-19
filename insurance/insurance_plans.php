<html>
<head>
<style>

</style>

</head>
<body>
<?php
//include all the header of the page
include 'header1.html';
?>
<?php 
include 'home_header2.php';
include 'home_sidebar.php';

?>
<?php
include 'connection.php';
$query="select *from policy";
$result=mysql_query($query,$con);
echo '<div style="padding-left:10px">';
//display all the insurance plans available say available policies
if($result)
{
echo '<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">';
echo '<center><table id="table1" border="1" style="border-collapse:collapse;border:1px solid #878787 ;width:80%;position:relative;top:25px ;box-shadow:1px 1px black;">
<tr style="background-color:#7FAAFF;"><th height="50">Policy Key</th>
<th>Policy Name</th>
<th>Policy Type</th>
<th>Description</th>
<th>Start Date</th>
<th>End Date</th>
<th>Charges per month</th>
<th>Policy Period(in months)</th>';

while($row=mysql_fetch_array($result))
{
$period=" +".$row['policy_period']." month";
$date =$date1= date("Y-m-d");
$date = strtotime(date("Y-m-d", strtotime($date)) . $period);
$date = date("Y-m-d",$date);
echo '<form method="post" action="policy_reg_data.php">';
echo '<tr  >';
echo '<td height="40"><center><input type="text" style="border:none;background-color:#d2d2d2;"name="policy_key" value='.$row['policy_key'].' readonly></center></td>';
echo "<td><center>".$row['policy_name']."</center></td>";
echo "<td><center>".$row['policy_type']."</center></td>";
echo "<td><center>".$row['description']."</center></td>";
echo "<td><center>".$date1."</center></td>";
echo "<td><center>".$date."</center></td>";
echo "<td><center>".$row['charges']."</center></td>";
echo "<td><center>".$row['policy_period']."</center></td>";
echo "</tr>";
echo "</form>";
}
echo "</table></div>";
}
else
{
echo '<script>alert("No Policy Available yet!!")</script>';
header("refresh:0;url=user_home_page.php");
}
echo "</div>";
?>


</body>
</html>