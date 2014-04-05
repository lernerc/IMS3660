<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());

   $sql = "delete from WAREHOUSE where storeNum ='$_POST[sNum]'";
   if(mysql_query($sql,$conn))
   {
      if(mysql_affected_rows() > 0)
	 echo "<h3> Warehouse removed!</h3>";
      else
	 echo "<h3>Warehouse does not exist</h3>";
   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Warehouse Number $_POST[sNum] does not exist!</p>";
      } else if($err == 1451) {
	 echo "<h3>Warehouse Number $_POST[sNum] has existing Relationships, so you cannot delete it</h3>";
      } else {
	 echo "error number $err";
      }

   }
   echo "<a href=\"main.php\">Return</a> to Home Page.";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}

?>