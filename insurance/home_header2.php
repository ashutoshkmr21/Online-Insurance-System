
<html>
<head>
<style>
#cssmenu li,
#cssmenu a {
  list-style: none;
  margin: 0;
  padding: 0;
  border: 0;
  line-height: 1;
  font-family: 'Lato', sans-serif;
}
#cssmenu {
margin-top:-10px;
  //border: 1px solid #133e40;
  //-webkit-border-radius: 5px;
 // -moz-border-radius: 5px;
 // -ms-border-radius: 5px;
  //-o-border-radius: 5px;
 // border-radius: 5px;
  //width: auto;
}
#cssmenu ul {
 // zoom: 1;
  background: #36b0b6;
  background: -moz-linear-gradient(top, #36b0b6 0%, #2a8a8f 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #36b0b6), color-stop(100%, #2a8a8f));
  background: -webkit-linear-gradient(top, #36b0b6 0%, #2a8a8f 100%);
  background: -o-linear-gradient(top, #36b0b6 0%, #2a8a8f 100%);
  background: -ms-linear-gradient(top, #36b0b6 0%, #2a8a8f 100%);
  background: linear-gradient(top, #36b0b6 0%, #2a8a8f 100%);
  //filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='@top-color', endColorstr='@bottom-color', GradientType=0);
  padding: 5px 10px;
  //-webkit-border-radius: 5px;
 // -moz-border-radius: 5px;
  //-ms-border-radius: 5px;
  //-o-border-radius: 5px;
  border-radius: 5px;
}
#cssmenu ul:before {
  content: '';
  //display: block;
}
#cssmenu ul:after {
  content: '';
  display: table;
  clear: both;
}
#cssmenu li {
  float: left;
  margin: 0 10px 0 0;
  //padding-left:60px;
  //padding-right:20px;
  border: 1px solid transparent;
}
#cssmenu li a {
 // -webkit-border-radius: 5px;
 // -moz-border-radius: 5px;
  //-ms-border-radius: 5px;
 // -o-border-radius: 5px;
  border-radius: 5px;
  padding: 8px 15px 9px 15px;
  display: block;
  text-decoration: none;
  color: #ffffff;
  border: 1px solid transparent;
  font-size: 16px;
}

#cssmenu li:hover {
//  -webkit-border-radius: 5px;
 // -moz-border-radius: 5px;
  //-ms-border-radius: 5px;
  //-o-border-radius: 5px;
  border-radius: 5px;
  border: 1px solid #36b0b6;
}
#cssmenu li:hover a {
 // -webkit-border-radius: 5px;
 // -moz-border-radius: 5px;
  //-ms-border-radius: 5px;
  //-o-border-radius: 5px;
  border-radius: 5px;
  display: block;
  background: #1e6468;
  border: 1px solid #133e40;
 // -moz-box-shadow: inset 0 5px 10px #133e40;
  //-webkit-box-shadow: inset 0 5px 10px #133e40;
  //box-shadow: inset 0 5px 10px #133e40;
}
</style>
</head>
<body>
<!-- Display the header navigation bar -->
<div id='cssmenu'>
<ul>
   <li ><a href='index.php'>Home |</a></li>
   <li><a href='insurance_plans.php'>Insurance Plans |</a></li>
   <li><a href='aboutus.php'>About Us   |</a></li>
   <li ><a href='contactus.php'>Contact Us</a></li>
    
</ul>
</div>

</body>
</html>