<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());
   $it=explode(',',$_POST[item]);
   $sql = "delete from LOCATED where productNum ='$it[0]' AND barcode = '$it[1]' AND storeNum = '$_POST[sNum]'";
   
   if(mysql_query($sql,$conn))
   {
      echo "<h3> Located removed!</h3>";

   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Item $it[2] does not exist at store $_POST[sNum]!</p>";
      } else if($err == 1451) {
	 echo "<h3>Item $it[2] at store $_POST[sNum] has existing Relationships, so you cannot delete it</h3>";
      } else {
	 echo "error number $err";
      }

   }
   echo "<a href=\"main.php\">Return</a> to Home Page.";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}

?>