
<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body style="background-color:transparent">
<?php
//include all the header of the page
include "header1.html";
?>
<?php
include "home_header2.php";
?>
<div id="side_bar" style="float:left">
<!-- Display the sidebar navigation of the HOME PAGE -->
<button id="login" disabled=true;>LOGIN SECTION</button>
<a href="agent_logintry.php" ><button class="button ">Agent</button></a>
<a href="client_logintry.php"><button class="button">Client</button></a>
<a href="login_demo.php"><button class="button">Admin</button></a>
</div>
<div width="80%" style="float:left;height:70%">
<?php
include("slider.html");
?>
 </div>
 </body>
 </html>