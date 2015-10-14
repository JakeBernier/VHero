<?php 
// log user out... set cookies to nothing then redirect to login page

setcookie(asdf, '', strtotime( '-5 days' ), '/');
setcookie(session, '', strtotime( '-5 days' ), '/');
setcookie(date, '', strtotime( '-5 days' ), '/');
setcookie(status_secret, '', strtotime ( '-5 days' ), '/');

Header("Location: index.php");

?>