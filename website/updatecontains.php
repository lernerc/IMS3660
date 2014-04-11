<?php
include 'topmenu.php';

echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td>";
$sql = "update CONTAINS set quantity='$_POST[amt]' where cartID='$_POST[carts]' and productNum='$_POST[pNum]' and barcode='$_POST[bar]'";
if(mysql_query($sql,$conn))
{
	 echo "<h3> Quantity updated!</h3>";
	 $update_total = "update CART set totalPrice = (select sum(quantity*salesPrice) from ITEMS I, CONTAINS C where I.productNum = C.productNum and I.barcode = C.barcode and C.cartID = '$_POST[carts]') where CART.cartid='$_POST[carts]'";
mysql_query($update_total, $conn);
	 
} else {
   $err = mysql_errno();
   echo "error number $err";
}
echo "<a href=\"my_carts.php\">Return</a> to Carts Page.";
echo "<p><a href=\"main.php\">Home</a></p>";
echo "</td></tr></table>";

?>