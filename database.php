<?php

$db_user="root";
$db_pass="";
$db_name="tech-life";
$conn=new PDO('mysql:host=localhost;dbname=' .$db_name. ';charset-utf8',$db_user,$db_pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION)
?> 