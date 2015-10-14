<?php
include "../include/cookie.php";
include "../include/sqlz.php";
checkCookie();
$user = sqlz::user;
$pass = sqlz::pass;
$server = sqlz::server;
$db = sqlz::db;
$cookie1 = $_COOKIE['asdf'];
$cookie1 = mysql_escape_string($cookie1);
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
        <li class="current_page_item"><a href="main.php" accesskey="1" title="">Homepage</a></li>
        <li><a href="villians.php" accesskey="2" title="">Villians</a></li>
        <li><a href="cases.php" accesskey="3" title="">Cases</a></li>
        <li><a href="evidence.php" accesskey="4" title="">Evidence</a></li>
        <li><a href="status.php" accesskey="5" title="">Status</a></li>
        <li><a href="profile.php" accesskey="6" title="">Profile</a></li>
        <li><a href="../logout.php" accesskey="7" title="">Log Out</a></li>
      </ul>
    </div>
  </div>
</div>
<div id="header-featured"> </div>

<div id="wrapper">
  <div id="featured-wrapper">
    <div id="featured" class="container">
      <div class="column1"> <span class="icon icon-lock"></span>
        <div class="title">
          <h2>Welcome to the Bat-Computer</h2>
        </div>
        <p>I am vengeance. I am the night. I am Batman.</p>
      </div>
            <div class="column2">
<?php 
// mysql connect to query display name
$con = mysql_connect("$server","$user","$pass");

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("$db", $con);
$query = "select * from users where cookie = '$cookie1';";
$result = mysql_query($query);
$row = mysql_fetch_array( $result );
echo "<h2>Welcome to the Bat-Computer " .$row['display_name']."</h2>";
?>
<p>The bat-computer is used by the caped crusader, the world's greatest detective, Batman. Batman and his team use this application to aid in catching villians, and solving criminal cases. </p>
      </div>
      <img src = ../img/bats.png height="300"></img>
    </div>
  </div>
  <div id="extra" class="container">
        <div class="column1"> <span class="icon icon-lock"></span>
        <div class="title">
          <h2>The Dark Knight</h2>
        </div>
        <p>I am vengeance. I am the night. I am Batman.</p>
      </div>
    <div class="column2"></div>
    <img src =../img/batman.png width="500" style="float:right">
    <p></p><strong></strong></p>
 </div>
</div>

<div id="copyright" class="container">
  <p>BATCOMPUTER | VULNERABLE APPLICATION FOR EDUCATIONAL PURPOSES ONLY</a> | Author: Jake Bernier</a>.</p></br>
</div>
</body>
</html>
