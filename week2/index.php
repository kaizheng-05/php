<!DOCTYPE html>
<html>
<head>
  <style>
     body {background-color: magenta;}
     .date{color:aqua;}
     .time{color:crimson;}
  </style>
</head>
<body>

<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
echo "My first PHP script!";?>
<h1 class= date><?php echo date("d M Y");?></h1>
<h1 class= time><?php echo date("g:i A");?></h1>
</body>
</html>