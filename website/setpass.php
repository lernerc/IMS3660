<?php

  /*we should make sure it's a valid account*/
$con = mysql_connect("cronus.cs.uleth.ca",$_POST["username"],$_POST["password"]) or die("<h3>Invalid username or password!</h3><p><a href=\"login.php\">Try Again</a></p>");


$username = $_POST["username"];
$password = $_POST["password"];

echo "<p>the username is $username and the password is $password</p>";

setcookie("username",$username,time()+3600);
setcookie("password",$password,time()+3600);

header('Location:sublogin.php');

?>
