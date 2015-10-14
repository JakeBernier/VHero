<?php
include "../include/cookie.php";
checkCookie();
$cookie = $_COOKIE['asdf'];
if ($cookie == '3a853576817e83726da92a86bc132817') {
	header("location: error.php");
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
        <li class="current_page_item"><a href="evidence.php" accesskey="4" title="">Evidence</a></li>
        <li><a href="status.php" accesskey="5" title="">Status</a></li>
        <li><a href="profile.php" accesskey="6" title="">Profile</a></li>
        <li><a href="logout.php" accesskey="7" title="">Log Out</a></li>
      </ul>
    </div>
  </div>
</div>
<div id="header-featured"> </div>

<div id="wrapper">
  <div id="featured-wrapper">
    <div id="featured" class="container">
                <h2>Upload Images for Case Evidence</h2>
                <p>Evidence is uploaded here to be used against villains and criminals. Evidence is also stored to build villain portfolios and to retain important evidence that may lead to clues in later cases.</p></br></br>
          <center>
<form action="evidence.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image was submitted.
if(isset($_POST["submit"])) {
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "<h2>File already exists.</h2></br>";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType == "php") {
				echo "<h2>Only JPG, JPEG, PNG & GIF files are allowed. PHP NOT ALLOWED!</h2><br>";
				$uploadOk = 0;
			} elseif ($imageFileType == "html") {
				echo "<h2>Only JPG, JPEG, PNG & GIF files are allowed. HTML NOT ALLOWED!</h2><br>";
				$uploadOk = 0;
			} elseif ($imageFileType == "exe") {
				echo "<h2>Only JPG, JPEG, PNG & GIF files are allowed. EXE NOT ALLOWED!</h2><br>";
				$uploadOk = 0;
			} else if ($imageFileType == "sh") {
				echo "<h2>Only JPG, JPEG, PNG & GIF files are allowed. SH NOT ALLOWED!</h2><br>";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "<h2>Sorry, your file was not uploaded.</h2></br>";
				// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "<h2>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h2>";
				} else {
					echo "<h2>Sorry, there was an error uploading your file.</h2>";
				}
			}
}

?>
    </div>
  </div>
   <div id="extra" class="container">
        <div class="column1"> 
      </div>
    <div class="column2"></div>
    <img src =../img/batman.png width="90" style="float:center"></img></br>
<?php 
$dirname = "uploads/";
$imagesPNG = glob($dirname."*.png");
foreach($imagesPNG as $image) {
	echo '<img src="'.$image.'" width="300" style="float:center"><br />';
}
$imagesJPG = glob($dirname."*.jpg");
foreach($imagesJPG as $image) {
	echo '<img src="'.$image.'" width="300" style="float:center"><br />';
}
?>
</div>
</div>

<div id="copyright" class="container">
<p>BATCOMPUTER | VULNERABLE APPLICATION FOR EDUCATIONAL PURPOSES ONLY</a> | Author: Jake Bernier</a>.</p></br>
</div>
</body>
</html>

