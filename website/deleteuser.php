<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());

   $sql = "delete from USER where username ='$_POST[username]'";
   if(mysql_query($sql,$conn))
   {
      if(mysql_affected_rows() > 0)
	 echo "<h3> User removed!</h3>";
      else
	 echo "<h3>User does not exist!</h3>";
   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<h3>Username $_POST[username] does not exist!</h3>";
      }
      else if($err == 1451) {
	 echo "<h3>User $_POST[username] has existing Relationships, so you cannot delete it</h3>";
      } else {
	 echo "error number $err";
      }

   }
   echo "<a href=\"main.php\">Return</a> to Home Page.";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}

?>