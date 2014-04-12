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

   echo "<form action='searchorders.php' method=post>";
   echo "Search for : <input type=text name='order'>";
   echo "<input type=submit name='submit' value='Search Orders'> </form>";
   
   $sql = "select * from PURCHASE_ORDER where createdBy='$subusername'";
   $result = mysql_query($sql,$conn);
   echo "<table><tr>";
   echo "<th valign='top'>Order ID</th>";
   echo "<th valign='top'>Date</th>";
   echo "<th valign='top'>Total Price</th>";
   echo "<th valign='top'>Creator</th>";
   echo "<th valign='top'>Manager ID</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($result))
   {
      echo "<tr>";
      echo "<td valign='top'>$val[0]</td>";
      echo "<td valign='top'>$val[1]</td>";
      $output=number_format($val[2]/100, 2,'.','');
      echo "<td valign='top' align='right'>$$output</td>";
      echo "<td valign='top'>$val[3]</td>";
      echo "<td valign='top'>$val[4]</td>";
      echo "<form action=\"update_order.php\" method=post>";
      echo "<td valign='top'><input type=\"hidden\" name=\"id\" value=\"$val[0]\"><input type=submit name=\"submit\" value=\"Edit Order\"></td>";
      echo "</form>";
      echo "</tr>";
   }
   echo "</table>";
}
else if($employee == TRUE)
{
   echo "<h3>Orders</h3>";
   
   echo "<form action='searchorders.php' method=post>";
   echo "Search for : <input type=text name='order'>";
   echo "<input type=submit name='submit' value='Search Orders'> </form>";
   
   $sql = "select * from PURCHASE_ORDER where createdBy!='$subusername'";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      
      echo "<table><tr>";
      echo "<th valign='top'>Order ID</th>";
      echo "<th valign='top'>Date</th>";
      echo "<th valign='top'>Total Price</th>";
      echo "<th valign='top'>Creator</th>";
      echo "<th valign='top'>Manager ID</th>";
      echo "</tr>";
      while($val = mysql_fetch_row($result))
      {
	 echo "<tr>";
	 echo "<td valign='top'>$val[0]</td>";
	 echo "<td valign='top'>$val[1]</td>";
	 $output=number_format($val[2]/100, 2, '.', '');
	 echo "<td valign='top' align='right'>$$output</td>";
	 echo "<td valign='top'>$val[3]</td>";
	 echo "<td valign='top'>$val[4]</td>";
	 echo "<form action=\"view_order.php\" method=post>";
	 echo "<td valign='top'><input type=\"hidden\" name=\"id\" value=\"$val[0]\"><input type=submit name=\"submit\" value=\"View Order\"></td>";
	 echo "</form>";
	 echo "</tr>";
      }
      echo "</table>";
   }
}
echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
echo "</td></tr></table>";

include 'footer.php';
?>
