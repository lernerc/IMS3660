<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());
   date_default_timezone_set('UTC');
   $date = date("Y-m-d H:i:s");
   $man = explode(',',$_POST[manager]);
   $zero = 0;
   $sqlM = "select id from MANAGER where username = '$_POST[username]'";
   $id = mysql_fetch_row(mysql_query($sqlM, $conn));
   $sql = "insert into PURCHASE_ORDER (orderID, totalPrice, createdBy, id, oDate) values ('$_POST[orderid]',$zero,'$man[0]','$man[1]','$date')";
   if(mysql_query($sql,$conn))
   {
      echo "<h3> Purchase Order added!</h3>";

   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Purchase Order for Cart ID $_POST[id] already exists!</p>";
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