<?php
include "../include/cookie.php";
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
            <li class="current_page_item">
              <a href="villians.php" accesskey="2" title="">
                Villians
              </a>
            </li>
            <li>
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
          <div class="column1">
            
            <div class="title">
              <a href="villians.php">
                <h2>
                  Villian Profiles
                </h2>
              </a>
            </div>
            <h2>
              Click on a villian to view more information about them...
            </h2>
          </div>
          <div class="column2">
            <a href ="villians.php?bar=villian/joker">
              <h2>
                Joker
              </h2>
            </a>
          </br>
          <a href ="villians.php?bar=villian/penguin">
            <h2>
              Penguin
            </h2>
          </a>
        </div>
        <div class="column3">
          <a href ="villians.php?bar=villian/riddler">
            <h2>
              Riddler
            </h2>
          </a>
        </br>
        <a href ="villians.php?bar=villian/twoface">
          <h2>
            Two Face
          </h2>
        </a>
      </div>
  </div>
  </div>
  <div id="extra" class="container">
    <div class="column1">
      
    </div>
    <div class="column2">
    </div>
    
    <?php
$foo = $_GET['bar'];

if(isset($_GET['bar'])) {
echo file_get_contents($foo);

}
?>
    <img src =../img/batman.png width="200" style="float:center">
    
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