<?php

$host = "localhost";
//$user = "webinnov_sumit";
//$pwd = "8447809762@s";
$user = "root";
$pwd = "";
$db = "webinnov_dearbeard";
$con = mysqli_connect($host,$user,$pwd,$db); 
if(!$con)
{
 die("Connection failed: " . mysqli_connect_error());
}

?>