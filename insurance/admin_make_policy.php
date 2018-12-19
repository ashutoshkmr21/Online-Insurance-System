<?php
//start session when admin logs in ,if no session exist then home page
session_start();
if(!isset($_SESSION['username']))
echo "<script> window.location='index.php'</script>";
//include all the headers of the page
include 'header1.html';
include 'admin_home_header.php';
include 'admin_sidebar.php';
?>
<html>
<head>
<style>
label{
font-size:30px;
margin-left:5px;
}
#form{
width:60%;
margin-left:20%;
padding-top:15px;
}
input {
height:40px;
width:240px;
float:right;
margin-right:50px;
}
select{
height:40px;
width:240px;
float:right;
margin-right:50px;
}
option{
height:40px;
width:240px;
}
textarea{
margin-left:20px;
}
</style>
</head>
<body>
<!-- Display form to add policy and its details -->
<div style="width:80%;background-color:#d2d2d2;height:100%;float:left;">
<form  id="form" action="policy_store.php" method="post" >
<fieldset >
<legend><b>Policy Details</b></legend>
<label>Policy Key :</label>
<input type="text" name="p_key" required ><br><br>
<label>Policy Name :</label>
<input type="text" name="p_name" required ><br><br>
<label>Policy Type :</label>
<select name="field" required>
<option value="" disabled="disabled" selected="selected">Please select a field</option>
<option value="Health" >Health</option>
<option value="Vehicle" >Vehicle</option>
<option value="Home" >Home</option>
</select><br><br>
<label> Policy Cost per month :<label>
<input type="number" name="p_cost" required validate><br><br>
<label> Policy Period :</label>
<input type="number" name="p_period" required validate><br><br>
<label> Policy Description :</label> <br>
<textarea cols="50" rows="4" name="p_desc"></textarea>
<br><br>
<input type="submit">
</fieldset>
</form>
</div>
</body>

</html>

