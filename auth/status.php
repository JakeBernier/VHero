<?php
include "../include/cookie.php";
checkCookie();
$cookie = $_COOKIE['asdf'];
if ($cookie == 'ffc6119edeee3637b8d6920020f5a2c8') {
	header("location: error.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
        <li class="current_page_item"><a href="status.php" accesskey="5" title="">Status</a></li>
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
        </div>
      </div>
      <div class="column2">
                <h2>Secret Phrase Required:</h2>
          <p>Enter the secret</p>
          <body>    
			<form id="form" name="form" action="status.php" method="get">
				<div id="block">
				<label id="user" for="username"></label>
				<input type="text" name="secret" id="secret" placeholder="Secret Phrase" required/>
				<label id="pass" for="password"></label>
				<input type="submit" id="submit" name="submit" value="SUBMIT"/>
				</div>
			</form>
		  </body>
      <div class="column3">
<?php
include "../include/sqlz.php";
$user = sqlz::user;
$pass = sqlz::pass;
$server = sqlz::server;
$db = sqlz::db;
$GETsecret = $_GET['secret'];

$con = mysql_connect("$server","$user","$pass");

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("$db", $con);

if(isset($_GET['secret'])) {
	// sql injection should allow in regardless of 'secret', also can it send back othe queries to webpage...?
	// try to pass through sqlmap?
	$query = "select * from secrets where secret_phrase = '$GETsecret';";
	$result = mysql_query($query);
	$row = mysql_fetch_array( $result );
	if($row["secret_phrase"] != NULL) {
		echo "passed";
		setcookie(status_secret, lUdXet5W2sa9kQmly7pE7U84KpyARAkc, time() + (86400 * 30), "/");
		Header("Location: issuestatus.php");
		// redirect to other hidden status page? issuestatus.php
		// have php issue OS commands (check date/time, check performance, check disk usage) tamper with param... send any OS command
	} else {
		echo "</br><h2>Incorrect, try again</h2>";
	}
}

?>
</div>
      </div>
    </div>
  </div>
  
  <div id="extra" class="container">
        <div class="column1"> 
      </div>
    <div class="column2"></div>
    <img src =../img/batman.png width="300" style="float:center"> </div>
</div>

<div id="copyright" class="container">
<p>BATCOMPUTER | VULNERABLE APPLICATION FOR EDUCATIONAL PURPOSES ONLY</a> | Author: Jake Bernier</a>.</p></br>
</div>
</body>
</html>
