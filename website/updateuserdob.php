<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   if(isset($_COOKIE["subusername"])){
      $subusername = $_COOKIE["subusername"];
      
      $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
	 die(mysql_error());
      mysql_select_db($username,$conn) or die(mysql_error());
      $dateB = date("Y-m-d",mktime(0,0,0,$_POST[month], $_POST[day],$_POST[year]));
      $sql = "update USER set dob='$dateB' where username='$subusername'";
      if(mysql_query($sql,$conn))
      {
	 echo "<h3> User birthday updated!</h3>";
	 
      } else {
	 $err = mysql_errno();
	 echo "error number $err";
      }
      echo "<a href=\"main.php\">Return</a> to Home Page.";
   }
   else
   {
      echo "<h3>You are not logged in to a user!</h3><p> <a href=\"sublogin.php\">Login First</a></p>";
   }
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}

?>