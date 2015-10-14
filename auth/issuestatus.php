<?php
include "../include/cookie.php";
checkCookie();

$isAuthd = false;
if($_COOKIE['status_secret'] == 'lUdXet5W2sa9kQmly7pE7U84KpyARAkc') {
	$isAuthd = true;
}

if($isAuthd != true) {
	Header("Location: main.php");	
}
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
      <div class="column1"> 
        <div class="title">
          <h2>Select To View Status</h2>
          <h2>Of Bat-Computer</h2>
          </br>
        </div>
      </div>
      <div class="column2">
      <a href ="issuestatus.php?status=date"><h2>Date/Time</h2></a></br>
      <a href ="issuestatus.php?status=perf"><h2>Performance</h2></a>
      </div>
      <div class="column3">
      <a href ="issuestatus.php?status=disk"><h2>Disk Space</h2></a></br>
      <a href ="issuestatus.php?status=uptime"><h2>Uptime</h2></a>
      </div>
      <div class="column4">
      <span class="icon icon-lock"></span>
      </div>	

    </div>
  </div>
 
   <div id="extra" class="container">
        <div class="column1"> <img src =../img/batman.png width="150" style="float:left">
      </div>
    <div class="column2"></div>
          		
<?php
$cmd = $_GET['status'];

if($_GET['status'] == "") {
	echo "<h1>No command issued...</h1>";
//} elseif ($_GET['status'] == date) {
  } elseif (preg_match('/date/',$cmd)) {
	echo "<h1>";
	system("$cmd");
	echo "</h1>";
  } elseif ($_GET['status'] == uptime) {
  	echo "<h1>";
  	system("$cmd");
  	echo "</h1>";
  } elseif ($_GET['status'] == disk) {
  	echo "<h1>";
  	system("df -halk");
  	echo "</h1>";
  } elseif ($_GET['status'] == perf) {
  	echo "<h1>";
  	system("vmstat");
  	echo "</h1>";
  } else {
	$cmd = str_replace("<script>", "", $cmd);
	$cmd = str_replace("</script>", "", $cmd);
	system("echo '$cmd'");
	echo " command not found...";
}

?>

     </div>
</div>


<div id="copyright" class="container">
  <p>BATCOMPUTER | VULNERABLE APPLICATION FOR EDUCATIONAL PURPOSES ONLY</a> | Author: Jake Bernier</a>.</p></br>
</div>
</body>
</html>
 