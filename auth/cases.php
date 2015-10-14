<?php
include "../include/cookie.php";
include "../include/sqlz.php";
checkCookie();
$cookie = $_COOKIE['asdf'];
if ($cookie == '3a853576817e83726da92a86bc132817') {
header("location: error.php");
}
$user = sqlz::user;
$pass = sqlz::pass;
$server = sqlz::server;
$db = sqlz::db;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!"CSS Credit - Creative Commons Attribution 3.0 Unported http://creativecommons.org/licenses/by/3.0/">
<!"Vulnerable Application - For Educational Purposes Only - Author: Jake Bernier">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
    </title>
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
          <h1>
            <a href="#">
              Bat-Computer
            </a>
          </h1>
        </div>
        <div id="menu">
          <ul>
            <li>
              <a href="main.php" accesskey="1" title="">
                Homepage
              </a>
            </li>
            <li>
              <a href="villians.php" accesskey="2" title="">
                Villians
              </a>
            </li>
            <li class="current_page_item">
              <a href="cases.php" accesskey="3" title="">
                Cases
              </a>
            </li>
            <li>
              <a href="evidence.php" accesskey="4" title="">
                Evidence
              </a>
            </li>
            <li>
              <a href="status.php" accesskey="5" title="">
                Status
              </a>
            </li>
            <li>
              <a href="profile.php" accesskey="6" title="">
                Profile
              </a>
            </li>
            <li>
              <a href="../logout.php" accesskey="7" title="">
                Log Out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div id="header-featured">
      
    </div>
    <div id="wrapper">
      <div id="featured-wrapper">
        <div id="featured" class="container">
          
          <h2>
            Open Criminal Cases
          </h2>
          <center>
            <p>
              Add new criminal case:
            </p>
            <form name="form" action="cases.php" method="POST">
              <table>
                <tr>
                  <td>
                    Case Name: 
                    <br>
                    <input type="text" name="name"/>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    Case Notes: 
                  </td>
                </tr>
                <tr>
                  <td colspan="5">
                    <textarea name="comment" rows="10" cols="50">
                    </textarea>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <input type="submit" name="submit" value="Submit" onclick='return validate();'">
                  </td>
                </tr>
              </table>
            </form>
<SCRIPT>
regex1=/^[a-zA-Z0-9. ]*$/;
regex2=/^[a-zA-Z0-9. ]*$/;
function validate() { 
msg='Error:'; err=0; 
if (!regex1.test(document.form.name.value)) {err+=1; msg+='\n  Invalid Characters';}
if (!regex2.test(document.form.comment.value)) {err+=1; msg+='\n  Invalid Characters';}
if ( err > 0 ) {alert(msg); return false;}
else return true;
} 
</SCRIPT>
      </div>
    </div>
    <div id="extra" class="container">
      <div class="column1">
        
      </div>
     <div class="column2">
     </div>
     <img src = ../img/clue.jpg width="400" style="float:center"
    </img>
    </br>
    
    <?php
mysql_connect("$server","$user","$pass");
mysql_select_db("bats");
$name=$_POST['name'];
$comment=$_POST['comment'];
$submit=$_POST['submit'];

$dbLink = mysql_connect("$server","$user","$pass");
mysql_query("SET character_set_client=utf8", $dbLink);
mysql_query("SET character_set_connection=utf8", $dbLink);

if($submit)
{
if($name&&$comment)
{
$insert=mysql_query("INSERT INTO cases (name,comment) VALUES ('$name','$comment');");
echo "
<meta HTTP-EQUIV='REFRESH' content='0; url=cases.php'>
";
}
else
{
echo "
<h2>
Please fill out all fields
</h2>
</br>
";
}
}
echo mysql_error($dbLink) . "\n";
?>
    
    <hr size="1"/>
    <?php
$dbLink = mysql_connect("$server","$user","$pass");
mysql_query("SET character_set_results=utf8", $dbLink);
mb_language('uni');
mb_internal_encoding('UTF-8');

$getquery=mysql_query("SELECT * FROM cases ORDER BY id DESC");
while($rows=mysql_fetch_assoc($getquery))
{
$id=$rows['id'];
$name=$rows['name'];
$comment=$rows['comment'];
echo $name . '
<br/>
' . '
<br/>
' . $comment . '
<br/>
' . '
<br/>
' . '
<hr size="1"/>
'
;}

?>
    
  </div>
  </div>
  
  <div id="copyright" class="container">
    <p>
      BATCOMPUTER | VULNERABLE APPLICATION FOR EDUCATIONAL PURPOSES ONLY
    </a>
  | Author: Jake Bernier
  </a>
  .
</p>
</br>
</div>
</body>
</html>
