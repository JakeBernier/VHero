<?php
// takes user and pass
// checks db
// auth pass or fail
// sets user cookie
include "./include/sqlz.php";
include "./include/rand_string.php";
$user = sqlz::user;
$pass = sqlz::pass;
$server = sqlz::server;
$db = sqlz::db;
$POSTuser = $_POST['username'];
$POSTuser = mysql_escape_string($POSTuser);
$POSTpass = $_POST['password'];
$POSTpass = mysql_escape_string($POSTpass);
$POSTpass = md5($POSTpass);


if (isset($_POST["password"]) && !empty($_POST["password"])) {

$con = mysql_connect("$server","$user","$pass");

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("$db", $con);

$query = "select * from users where username = '$POSTuser';";
$result = mysql_query($query);
// store the record of the "example" table into $row
$row = mysql_fetch_array( $result );
// Print out the contents of the entry
// echo "Name: ".$row['username'];
// echo "DName: ".$row['display_name'];

	if($row["username"] == $POSTuser && $row["password"] == $POSTpass) {
		echo "correct username and password!";
		// echo $row["cookie"];
		$cookie_name = "asdf";
		$cookie_value = $row["cookie"];
		$session = generateRandomString();
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		setcookie(session, $session, time() + (86400 * 30), "/");
		setcookie(date, time(), time() + (86400 * 30), "/");
		Header("Location: auth/main.php");
			} elseif ($row["username"] !== $POSTuser) {
				echo '<html><head><link rel="stylesheet" type="text/css" href="style/loginstyle.css" /><title>Wrong username or password</title></head><body><div align =center><font color="white">Incorrect Username Entered . . .    ';
				echo $POSTuser;
				echo '</font></div></br></br><div align=center><form action="index.php"><input type="submit" value="Please try again"></form></div>';
			} elseif ($row["password"] !== $POSTpass) {
				echo '<html><head><link rel="stylesheet" type="text/css" href="style/loginstyle.css" /><title>Wrong username or password</title></head><body><div align =center><font color="white">Incorrect Password Entered . . .</font></br></br><form action="index.php"><input type="submit" value="Please try again"></form></div></body>';
			} else {
				echo '<html><head><title>Wrong username or password</title></head><body><p>Incorrect Username or Password Entered . . .</p><form action="index.php"><input type="submit" value="Please try again"></form>';
			}
mysql_close($con);
}
?>