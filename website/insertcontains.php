<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());
   $item = explode(',', $_POST[item]);

   $lookUp = "select sum(quantity) from LOCATED where productNum=$item[0] and barcode=$item[1]";
   echo $lookUp;
   $table = mysql_query($lookup, $conn);
   if(mysql_num_rows($table) == 0) {
      echo "<h3>There are no $item[2] available</h3>";
   } else {
       $num = mysql_fetch_row($table);
       echo $num[0];
       if($num[0] < $_POST[num]) {
	  echo "<h3>There are only $num[0] of $item[2] available!</h3>";
       } else {   
	  $sql = "insert into CONTAINS values ('$_POST[cid]','$item[0]','$item[1]','$_POST[num]')";
	  if(mysql_query($sql,$conn)) {
	     echo "<h3> Item added into Cart!</h3>";
	  } else {
	     $err = mysql_errno();
	     if($err == 1062) {
		echo "<h3>Item $item[2] is already in Cart with ID $_POST[cid]!</h3>";
	     } else {
		echo "error number $err";
	     }
	  }
       }
   }
   echo "<a href=\"main.php\">Return</a> to Home Page.";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";
   
}

?>