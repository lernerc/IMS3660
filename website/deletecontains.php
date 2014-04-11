<?php

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());

   $it=explode(',', $_POST[item]);
   $sql = "delete from CONTAINS where cartID='$_POST[carts]' and productNum='$it[0]' and barcode='$it[1]'";
   if(mysql_query($sql,$conn))
   {
      if(mysql_affected_rows() > 0) {
	 echo "<h3>Item removed from Cart!</h3>";
	 $update_total = "update CART set totalPrice = (select sum(quantity*salesPrice) from ITEMS I, CONTAINS C where I.productNum = C.productNUM and I.barcode = C.barcode and C.cartID = '$_POST[carts]') where CART.cartid='$_POST[carts]'";
	 mysql_query($update_total);
      } else {
	 echo "<h3>Item does not exist in Cart!</h3>";
      }
   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<h3>Item does not exist in Cart!</h3>";
      } else if($err == 1451) {
	 echo "<h3>Item $it[2] in cart $_POST[carts] has existing Relationships, so you cannot delete it</h3>";
      } else {
	 echo "error number $err";
      }

   }
   echo "<a href=\"main.php\">Return</a> to Home Page.";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}

?>