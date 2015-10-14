<?php
// function to validate cookie values..

function checkCookie (){
$cookie = $_COOKIE['asdf'];

$db = 'bats';
$user = 'root';
$pass = 'root';
$server = 'localhost';

$con = mysql_connect("$server","$user","$pass");

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("$db", $con);

$query = "select cookie from users where cookie = '$cookie';";
$result = mysql_query($query);	
$row = mysql_fetch_array( $result );
$expectedCookie = $row[0];

$cookie_name = "asdf";
if(!isset($_COOKIE[$cookie_name])) {
	//cookie not set, redirect to log in
	Header("Location: index.php");
}else{
	if (empty($expectedCookie)) {
		//cookie is incorrect, redirect to log in
		Header("Location: index.php");
	}else{
		// cookie matches value in DB, proceed as authenticated user...
	}
}
}

?>
