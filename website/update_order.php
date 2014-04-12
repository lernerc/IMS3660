<?php
include 'topmenu.php';

echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
echo "<h3>Modify Order</h3>";
$sql = "select * from PURCHASE_ORDER where orderID='$_POST[id]'";
$result = mysql_query($sql,$conn);
while($val = mysql_fetch_row($result))
{
   echo "Order ID: $val[0]<br>";
   echo "Date: $val[1]<br>";
   echo "Total Price: $val[2]<br>";
   echo "Creator: $val[3]<br>";
   echo "Manager ID: $val[4]<br>";
   echo "<form action=\"deletepurchaseorder.php\" method=post>";
   echo "<input type=\"hidden\" name=\"oid\" value=\"$val[0]\">";
   echo "<input type=submit name=\"submit\" value=\"Delete Order\">";
   echo "</form>";
   echo "<h3>Cart List</h3>";
   echo "<table><tr>";
   echo "<th>Cart ID</th>";
   echo "<th>Creator</th>";
   echo "<th>Total Price</th>";
   echo "</tr>";
   $sql2 = "select * from PROCESS where orderID='$val[0]'";
   $result2 = mysql_query($sql2,$conn);
   while($val2 = mysql_fetch_row($result2))
   {
      echo "<tr>";
      $sql1 = "select * from CART where cartID='$val2[0]'";
      $result1 = mysql_query($sql1,$conn);
      while($val1 = mysql_fetch_row($result1))
      {
	 echo "<td valign='top'>$val2[0]</td>";
	 echo "<td valign='top'>$val1[1]</td>";
	 echo "<td valign='top'>$val1[2]</td>";
	 echo "<td valign='top'><form action=\"deleteprocess.php\" method=post>";
	 echo "<input type=hidden value='$val2[0]' name='carts'>";
	 echo "<input type=hidden value='$val2[1]' name='order'>";
	 echo "<input type=submit name='submit' value='Remove from Order'>";
	 echo "</form></td>";
      }
      echo "</tr>";
   }
   echo "</table>";
}

echo "<a href=\"show_orders.php\">Return</a> to Orders Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";

include 'footer.php';
?>