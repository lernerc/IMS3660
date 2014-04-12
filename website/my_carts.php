 <?php

include 'topmenu.php';

echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
echo "<h3>My Carts</h3>";
echo "<a href=\"insertcartself.php\">New Cart</a><br>";
if($manager == TRUE)
{
   $sqlOrder = "select MAX(orderID) from PURCHASE_ORDER where createdBy='$subusername'";
   $resultOrder = mysql_query($sqlOrder, $conn);
   while($val2 = mysql_fetch_row($resultOrder))
   {
      $oid = $val2[0];
      echo "OrderID: $oid<br>";
   }
}
$sqlCart = "select MAX(cartID) from CART where createdBy='$subusername'";
$resultCart = mysql_query($sqlCart, $conn);
while($val2 = mysql_fetch_row($resultCart))
{
   $cid = $val2[0];
   echo "CartID: $cid";
}
echo "<br>";
$sql = "select * from CART where createdBy='$subusername'";
$result = mysql_query($sql,$conn);
echo "<table><tr>";
echo "<th>Cart ID</th>";
echo "<th>Creator</th>";
echo "<th>Total Price</th>";
if($employee == TRUE || $manager == TRUE)
   echo "<th>Purchase Order</th>";
echo "</tr>";
while($val = mysql_fetch_row($result))
{
   echo "<tr>";
   echo "<td>$val[0]</td>";
   echo "<td>$val[1]</td>";
   echo "<td>$val[2]</td>";
   $sql4 = "select * from PROCESS where cartID='$val[0]'";
   $result4 = mysql_query($sql4,$conn);
   if($manager == TRUE || $employee == TRUE)
   {
      $sql5 = "select * from PROCESS where cartID='$val[0]'";
      $result5 = mysql_query($sql5,$conn);
      while($val5 = mysql_fetch_row($result5))
      {
	 echo "<td>$val5[1]</td>";
      }
      $sql3 = "select * from PURCHASE_ORDER where createdBy='$subusername'";
      $result3 = mysql_query($sql3,$conn);
      if(mysql_num_rows($result3) != 0)
      {
	 $sql5 = "select * from PROCESS where cartID='$val[0]'";
	 $result5 = mysql_query($sql5,$conn);
	 if(mysql_num_rows($result5) == 0)
	 {
	    if($manager == TRUE)
	    {
	       echo "<form action=\"insertprocess.php\" method=post>";
	       echo "<td><input type=\"hidden\" name=\"cart\" value=\"$val[0]\"><input type=hidden name='order' value='$oid'><input type=submit name=\"submit\" value=\"Process\"></td>";
	       echo "</form>";
	    }
	 }
      }
   }
   if(mysql_num_rows($result4) == 0)
   {
      echo "<form action=\"update_cart.php\" method=post>";
      echo "<td><input type=\"hidden\" name=\"id\" value=\"$val[0]\"><input type=submit name=\"submit\" value=\"Edit Cart\"></td>";
      echo "</form>";
   }
   else
   {
      echo "<form action=\"view_cart.php\" method=post>";
      echo "<td><input type=\"hidden\" name=\"id\" value=\"$val[0]\"><input type=submit name=\"submit\" value=\"View Cart\"></td>";
      echo "</form>";
   }
   echo "</tr>";
}
echo "</table>";

if($manager == TRUE || $employee == TRUE)
{
   $sql = "select * from CART where createdBy!='$subusername'";
   $result = mysql_query($sql,$conn);
   echo "<table><tr>";
   echo "<th>Cart ID</th>";
   echo "<th>Creator</th>";
   echo "<th>Total Price</th>";
   if($employee == TRUE || $manager == TRUE)
      echo "<th>Purchase Order</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($result))
   {
      echo "<tr>";
      echo "<td>$val[0]</td>";
      echo "<td>$val[1]</td>";
      echo "<td>$val[2]</td>";
      $sql5 = "select * from PROCESS where cartID='$val[0]'";
      $result5 = mysql_query($sql5,$conn);
      while($val5 = mysql_fetch_row($result5))
      {
	 echo "<td>$val5[1]</td>";
      }
      $sql3 = "select * from PURCHASE_ORDER where createdBy='$subusername'";
      $result3 = mysql_query($sql3,$conn);
      if(mysql_num_rows($result3) != 0)
      {
	 $sql5 = "select * from PROCESS where cartID='$val[0]'";
	 $result5 = mysql_query($sql5,$conn);
	 if(mysql_num_rows($result5) == 0)
	 {
	    echo "<form action=\"insertprocess.php\" method=post>";
	    echo "<td><input type=\"hidden\" name=\"cart\" value=\"$val[0]\"><input type=hidden name='order' value='$oid'><input type=submit name=\"submit\" value=\"Process\"></td>";
	    echo "</form>";
	 }
      }
      echo "<form action=\"view_cart.php\" method=post>";
      echo "<td><input type=\"hidden\" name=\"id\" value=\"$val[0]\"><input type=submit name=\"submit\" value=\"View Cart\"></td>";
      echo "</form>";
      echo "</tr>";
   }
   echo "</table>";
}
   
echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
echo "</td></tr></table>";

include 'footer.php';
?>
