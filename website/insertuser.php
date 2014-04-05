<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());
   $dateB = date("Y-m-d",mktime(0,0,0,$_POST[month], $_POST[day],$_POST[year]));
   $sql = "insert into USER values ('$_POST[username]','$_POST[name]','$dateB','$_POST[ph]','$_POST[address]','$_POST[passwd]', '$_POST[email]')";
   if(mysql_query($sql,$conn))
   {
      echo "<h3> User added!</h3>";

   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Username $_POST[sNum] already exists!</p>";
      }
      else {
	 echo "error number $err";
      }

   }
   echo "<a href=\"main.php\">Return</a> to Home Page.";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}

?>