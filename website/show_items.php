<?php

include 'topmenu.php';

echo "<table width=\"70%\" align=\"center\"><tr><td valign='top' width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";

$sqlCart = "select * from CART where createdBy='$subusername'";
$resultCart = mysql_query($sqlCart, $conn);
if(mysql_num_rows($resultCart) == 0)
{
   echo "No Cart to add items to!";
}
else
{
   $sqlCart = "select MAX(cartID) from CART where createdBy='$subusername'";
   $resultCart = mysql_query($sqlCart, $conn);
   while($val2 = mysql_fetch_row($resultCart))
   {
      $sqlP = "select * from PROCESS where cartID='$val2[0]'";
      $resultP = mysql_query($sqlP, $conn);
      if(mysql_num_rows($resultP) != 0)
      {
	 echo "No Cart to add items to!";
      }
      else
      {
	 $cartid = $val2[0];
	 echo "CartID: $cartid";
      }
   }
}
echo "<h3>Item List</h3>";
$sql = "select * from ITEMS";
$result = mysql_query($sql,$conn);
echo "<table><tr>";
echo "<th>Product Number</th>";
echo "<th>Barcode</th>";
echo "<th>Name</th>";
echo "<th>Description</th>";
echo "<th>Price</th>";
if($employee == TRUE || $manager == TRUE)
   echo "<th>Purchase Price</th>";
echo "</tr>";
while($val = mysql_fetch_row($result))
{
   echo "<tr>";
   echo "<td>$val[0]</td>";
   $sql1 = "select * from ITEMS where productNum='$val[0]' and barcode='$val[1]'";
   $result1 = mysql_query($sql1,$conn);
   while($val1 = mysql_fetch_row($result1))
   {
      echo "<td>$val[1]</td>";
      echo "<td>$val1[2]</td>";
      echo "<td>$val1[3]</td>";
      echo "<td>$val1[4]</td>";
      if($employee == TRUE || $manager == TRUE)
	 echo "<td>$val1[5]</td>";
      $sql3 = "select * from CART where createdBy='$subusername'";
      $result3 = mysql_query($sql3,$conn);
      if(mysql_num_rows($result3) != 0)
      {
	 $sql4 = "select * from PROCESS where cartID='$cartid'";
	 $result4 = mysql_query($sql4,$conn);
	 if(mysql_num_rows($result4) == 0)
	 {
	    echo "<td><form action=\"insertcontains.php\" method=post>";
	    echo "<input type=hidden value='1' name=\"num\">";
	    echo "<input type=hidden value=$cartid name=\"cid\">";
	    echo "<input type=\"hidden\" name=\"item\" value=\"$val[0],$val[1]\"><input type=submit name=\"submit\" value=\"Add to Cart\">";
	    echo "</form><td>";
	 }
      }
      if($manager == TRUE)
      {
	 echo "<td><form action=\"updateitem.php\" method=post>";
	 echo "<input type=\"hidden\" name=\"pNum\" value=\"$val[0]\">";
	 echo "<input type=\"hidden\" name=\"bar\" value=\"$val[1]\">";
	 echo "<input type=submit name=\"submit\" value=\"Update\">";
	 echo "</form><td>";
      }
   }
   echo "</tr>";
}
echo "</table>";
echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
echo "</td></tr></table>";

include 'footer.php';
?>