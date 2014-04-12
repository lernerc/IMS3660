<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";

   $sql = "delete from PURCHASE_ORDER where orderID ='$_POST[oid]'";
   if(mysql_query($sql,$conn))
   {
      if(mysql_affected_rows() > 0)
	 echo "<h3> Purchase Order removed!</h3>";
      else
	 echo "<h3>Purchase Order does not exist</h3>";
   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Order ID $_POST[oid] does not exist!</p>";
      } else if($err == 1451) {
	 echo "<h3>Order ID $_POST[oid] has existing Relationships, so you cannot delete it</h3>";
      } else {
	 echo "error number $err";
      }

   }
echo "<a href=\"show_orders.php\">Return</a> to Orders Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
include 'footer.php';
?>