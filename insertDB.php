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

// create tables
$tableusers ="create table users(
user_id INT NOT NULL AUTO_INCREMENT,
username VARCHAR(100) NOT NULL,
display_name VARCHAR(100) NOT NULL,
password VARCHAR(150) NOT NULL,
cookie VARCHAR(150),
PRIMARY KEY ( user_id)
);";
$tablesecret = "create table secrets(
secret_id INT NOT NULL AUTO_INCREMENT,
secret_phrase VARCHAR(20) NOT NULL,
PRIMARY KEY (secret_id)
);";
$tablecases = "create table cases(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(20) NOT NULL,
comment VARCHAR(999) NOT NULL,
PRIMARY KEY (id)
);";


$table = mysql_query($tableusers);
$table2 = mysql_query($tablesecret);
$table3 = mysql_query($tablecases);

// insert data into tables
$insertusers  = "insert into users (username, display_name, password, cookie)
values ('batman', 'batman', 'bfb2f5081f967af020b88d4541ca21f4', '871e7a5a22171652b98e7ac6f05ba059');";
$insertusers2 = "insert into users (username, display_name, password, cookie)
values ('robin', 'robin', '60806e565dcaa4cedfadd7b258bf4d92', 'ffc6119edeee3637b8d6920020f5a2c8');";
$insertusers3 = "insert into users (username, display_name, password, cookie)
values ('alfred', 'alfred', '308c29ccca698906f2f1ae42e4f7c3a1', '3a853576817e83726da92a86bc132817');";
$users = mysql_query($insertusers);
$users2 = mysql_query($insertusers2);
$users3 = mysql_query($insertusers3);


$insertsecret = "insert into secrets (secret_id, secret_phrase)
values ('1', 'I am the dark knight');";
$secrets = mysql_query($insertsecret);


$insertcases = "insert into cases (id, name, comment)
values ('1', 'Save The Firefighters', 'After locking up Poison Ivy, Aaron Cash mentions a missing crew of firefighters. 15 members are scattered throughout the city and each one is tied up and protected by a group of hostiles of increasing difficulty. After rescuing the last firefighter you must free the captain and bring him back to GCPD to safety.');";
$insertcases2 = "insert into cases (id, name, comment)
values ('2', 'Murders', 'You will find these murder victims around the three islands of Gotham, with two in every island. They can be difficult to spot with signs being the loud opera music playing and the spotlight shine on the murder victims.');";
$cases = mysql_query($insertcases);
$cases2 = mysql_query($insertcases2);


mysql_close($con);

echo "Inserted data into DB ... done!";

?>