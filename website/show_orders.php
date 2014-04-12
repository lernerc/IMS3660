 <?php

include 'topmenu.php';

echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
if($manager == TRUE)
{
   echo "<h3>My Orders</h3>";
   echo "<a href=\"insertorderself.php\">New Order</a><br>";
   $sqlOrder = "select MAX(orderID) from PURCHASE_ORDER where createdBy='$subusername'";
   $resultOrder = mysql_query($sqlOrder, $conn);
   while($val2 = mysql_fetch_row($resultOrder))
   {
      $oid = $val2[0];
      echo "OrderID: $oid";
   }
   echo "<br>";
   $sql = "select * from PURCHASE_ORDER where createdBy='$subusername'";
   $result = mysql_query($sql,$conn);
   echo "<table><tr>";
   echo "<th>Order ID</th>";
   echo "<th>Date</th>";
   echo "<th>Total Price</th>";
   echo "<th>Creator</th>";
   echo "<th>Manager ID</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($result))
   {
      echo "<tr>";
      echo "<td>$val[0]</td>";
      echo "<td>$val[1]</td>";
      echo "<td>$val[2]</td>";
      echo "<td>$val[3]</td>";
      echo "<td>$val[4]</td>";
      echo "<form action=\"update_order.php\" method=post>";
      echo "<td><input type=\"hidden\" name=\"id\" value=\"$val[0]\"><input type=submit name=\"submit\" value=\"Edit Order\"></td>";
      echo "</form>";
      echo "</tr>";
   }
   echo "</table>";
}
if($manager == TRUE || $employee == TRUE)
{
   
   echo "<br>";
   echo "<h3>Orders</h3>";
   $sql = "select * from PURCHASE_ORDER where createdBy!='$subusername'";
   $result = mysql_query($sql,$conn);
   echo "<table><tr>";
   echo "<th>Order ID</th>";
   echo "<th>Date</th>";
   echo "<th>Total Price</th>";
   echo "<th>Creator</th>";
   echo "<th>Manager ID</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($result))
   {
      echo "<tr>";
      echo "<td>$val[0]</td>";
      echo "<td>$val[1]</td>";
      echo "<td>$val[2]</td>";
      echo "<td>$val[3]</td>";
      echo "<td>$val[4]</td>";
      echo "<form action=\"view_order.php\" method=post>";
      echo "<td><input type=\"hidden\" name=\"id\" value=\"$val[0]\"><input type=submit name=\"submit\" value=\"View Order\"></td>";
      echo "</form>";
      echo "</tr>";
   }
   echo "</table>";
}
echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
echo "</td></tr></table>";

include 'footer.php';
?>
