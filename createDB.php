<?php
// run this to create DB for vuln hero application
include "./include/sqlz.php";
$user = sqlz::user;
$pass = sqlz::pass;
$server = sqlz::server;
$db = sqlz::db;



$con = mysql_connect("$server","$user","$pass");

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("$db", $con);

// create database
$createDB = "create database bats;";
$do = mysql_query($createDB);

mysql_close($con);

echo "Created DB... done!";

?>