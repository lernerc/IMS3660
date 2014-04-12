<?php

include 'topmenu.php';

echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td>";
   $item = explode(',', $_POST[item]);

   $lookUp = "select SUM(quantity) from LOCATED where productNum=$item[0] and barcode=$item[1]";
   $taken = "select sum(quantity) from CONTAINS where productNum=$item[0] and barcode=$item[1]";
   
   $table = mysql_query($lookUp, $conn);
   $takenTable = mysql_query($taken, $conn);
   if(mysql_num_rows($table) == 0) {
      echo "<h3>No $item[2] available</h3>";
   } else {
      $num = mysql_fetch_row($table);
      if(mysql_num_rows($takenTable) != 0) {
	 $t = mysql_fetch_row($takenTable);
	 $num[0] -= $t[0];
      }
      if($num[0] < $_POST[num]) {
	 echo "<h3>There are only $num[0] of $item[2] available!</h3>";
      } else {   
	 $sql = "insert into CONTAINS values ('$_POST[cid]','$item[0]','$item[1]','$_POST[num]')";
	 if(mysql_query($sql,$conn)) {
	    echo "<h3> Item added into Cart!</h3>";
	    $update_total = "update CART set totalPrice = (select sum(quantity*salesPrice) from ITEMS I, CONTAINS C where I.productNum = C.productNUM and I.barcode = C.barcode and C.cartID = '$_POST[cid]') where CART.cartID='$_POST[cid]'";
	    mysql_query($update_total, $conn);
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
echo "<form action='update_cart.php' method='post'>";
echo "<input type=hidden name='id' value='$_POST[cid]'>";
echo "<input type=submit name='submit' value='Update Cart'>";
echo "</form>";
echo "<a href=\"show_items.php\">Return</a> to Items Page.";
echo "<p><a href=\"main.php\">Home</a></p>";
echo "</td></tr></table>";
?>