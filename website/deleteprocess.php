<?php

include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";

   $sql = "delete from PROCESS where cartID='$_POST[carts]' and orderID='$_POST[order]'";
   if(mysql_query($sql,$conn))
   {
      if(mysql_affected_rows() > 0) {
	 echo "<h3>Cart removed from Order!</h3>";
	 $sum = "select sum(C.totalPrice) from CART C, PROCESS P where P.cartID=C.cartID and P.orderID='$_POST[order]'";
	 $sum_value = mysql_query($sum, $conn);
	 $value = mysql_fetch_row($sum_value);
	 if(is_null($value[0]))
	    $value[0] = 0;
	 $set_total = "update PURCHASE_ORDER O set totalPrice=$value[0] where O.orderID='$_POST[order]'";
	 mysql_query($set_total, $conn);
      } else {
	 echo "<h3>Cart does not exist in Order!</h3>";
      }
   } else {
      $err = mysql_errno();
      if($err == 1451) {
	 echo "<h3>Cart $_POST[carts] and order $_POST[order] has existing Relationships, so you cannot delete it</h3>";
      } else {          
	 echo "error number $err";
      }
   }
   
echo "<a href=\"show_orders.php\">Return</a> to Orders Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
?>