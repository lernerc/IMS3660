<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());
   
   $sql = "insert into PROCESS values ('$_POST[cart]','$_POST[order]')";
   if(mysql_query($sql,$conn))
   {
      echo "<h3>Cart being processed by Order!</h3>";
      $set_total = "update PURCHASE_ORDER O set totalPrice=(select sum(C.totalPrice) from CART C, PROCESS P where P.cartID=C.cartID and P.orderID='$_POST[order]') where O.orderID='$_POST[order]'";
      mysql_query($set_total, $conn);
   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Cart with ID $_POST[cart] is already processed!</p>";
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