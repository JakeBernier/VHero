<?php
include "../include/sqlz.php";
include "../include/rand_string.php";
include "../include/cookie.php";
checkCookie();
$user = sqlz::user;
$pass = sqlz::pass;
$server = sqlz::server;
$db = sqlz::db;
$cookie1 = $_COOKIE['asdf'];
$cookie1 = mysql_escape_string($cookie1);
$changepass1 = $_POST['changepass1'];
$changepass1 = mysql_escape_string($changepass1);
$changepass1 = md5($changepass1);
$changepass2 = $_POST['changepass2'];
$changepass2 = mysql_escape_string($changepass2);
$changepass2 = md5($changepass2);
$displayname = $_POST['displayname'];
$displayname = mysql_escape_string($displayname);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!"CSS Credit - Creative Commons Attribution 3.0 Unported http://creativecommons.org/licenses/by/3.0/">
<!"Vulnerable Application - For Educational Purposes Only - Author: Jake Bernier">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../style/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../style/fonts.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div id="header-wrapper">
  <div id="header" class="container">
    <div id="logo">
      <h1><a href="#">Bat-Computer</a></h1>
</div>
    <div id="menu">
      <ul>
        <li><a href="main.php" accesskey="1" title="">Homepage</a></li>
        <li><a href="villians.php" accesskey="2" title="">Villians</a></li>
        <li><a href="cases.php" accesskey="3" title="">Cases</a></li>
        <li><a href="evidence.php" accesskey="4" title="">Evidence</a></li>
        <li><a href="status.php" accesskey="5" title="">Status</a></li>
        <li class="current_page_item"><a href="profile.php" accesskey="6" title="">Profile</a></li>
        <li><a href="../logout.php" accesskey="7" title="">Log Out</a></li>
      </ul>
    </div>
  </div>
</div>
<div id="header-featured"> </div>

<div id="wrapper">
  <div id="featured-wrapper">
    <div id="featured" class="container">
      <div class="column1"> 
        <div class="title">
          </br></br></br></br><h2>Change your password.</h2>
        </div>
        <p>I am vengeance. I am the night. I am Batman.</p>
      </div>
      <div class="column2">
                 <span class="icon icon-lock"></span>
          <p>Enter new password:</p>
          <body>    
			<form id="form" name="form" action="profile.php" method="POST">
				<div id="block">
				<input type="password" name="changepass1" placeholder="New Password" required/></br>
				<input type="password" name="changepass2" placeholder="Confirm Password" required/></br></br>
				<input type="submit" id="submit" name="update" value="UPDATE"/>
			</div>
			</form>
<?php

if (isset($_POST["update"]) && !empty($_POST["update"])) {

	$con = mysql_connect("$server","$user","$pass");

	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("$db", $con);
		
	$query = "select * from users where cookie = '$cookie1';";
	$result = mysql_query($query);
	$row = mysql_fetch_array( $result );
	$num_rows = mysql_num_rows($result);
	if (strpos($changepass1, '\'') !== false) {
		echo "<h2>An error occured, please stop trying SQL injection</h2>";
	} elseif ($num_rows == 1 && $changepass1 == $changepass2) {
		$updatepass = "UPDATE users SET password='$changepass1' WHERE cookie='$cookie1'";
		$update = mysql_query($updatepass);
		echo "<h2>Password updated!</h2>";
		echo mysql_error($con) . "\n";
	} elseif ($changepass1 != $changepass2) {
		echo "<h2>Passwords do not match!</h2>";
	} else {
		echo "<h2>An error occured, please try again...</h2>";
		echo mysql_error($con) . "\n";
	}
	mysql_close($con);
	}
?>
		  </body>
    </div>
    <div class="column2"> <span class="icon icon-lock"></span>
    <p>Enter new display name:</p>
 			<form id="form" name="form" action="profile.php" method="POST">
				<div id="block">
				<input type="text" name="displayname" placeholder="New Display Name" required/></br></br>
				<input type="submit" id="submit" name="submit" value="SUBMIT"/>
			</div>
			</form>
<?php
if (isset($_POST["submit"]) && !empty($_POST["submit"])) {

	$con = mysql_connect("$server","$user","$pass");

	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("$db", $con);
	$query = "select * from users where cookie = '$cookie1';";
	$result = mysql_query($query);
	$row = mysql_fetch_array( $result );
	$num_rows = mysql_num_rows($result);
	if (strpos($dislayname, '\'') !== false) {
		echo "<h2>An error occured, please stop trying SQL injection</h2>";
	} elseif ($num_rows == 1) {
		$updateDN = "UPDATE users SET display_name='$displayname' WHERE cookie='$cookie1'";
		$update2 = mysql_query($updateDN);
		echo "<h2>Display name updated!</h2>";
		echo mysql_error($con) . "\n";
	} else {
		echo "<h2>An error occured, please try again...</h2>";
		echo mysql_error($con) . "\n";
	}
	mysql_close($con);
	}
?>
			</div>
  </div>
  <div id="extra" class="container">
        <div class="column1"> 
      </div>

</div>

<div id="copyright" class="container">
<p>BATCOMPUTER | VULNERABLE APPLICATION FOR EDUCATIONAL PURPOSES ONLY</a> | Author: Jake Bernier</a>.</p></br>
</div>
</body>
</html>

