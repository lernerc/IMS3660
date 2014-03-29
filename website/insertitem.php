<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());

   
   $sql = "insert into ITEMS values ('$_POST[pNum]','$_POST[bar]','$_POST[name]','$_POST[desc]','$_POST[sale]','$_POST[purchase]')";
   if(mysql_query($sql,$conn))
   {
      echo "<h3> Item added!</h3>";

   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Item product number $_POST[pNum], or barcode $_POST[bar] already exists!</p>";
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