<?php
//code for establishing connection with database
$con=mysql_connect("localhost","root","");
 if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("insurance");
?>