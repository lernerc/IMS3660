<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
$sql = "insert into PROCESS values ('$_POST[cart]','$_POST[order]')";
if(mysql_query($sql,$conn))
{
      echo "<h3>Cart being processed by Order!</h3>";
      $set_total = "update PURCHASE_ORDER O set totalPrice=(select sum(C.totalPrice) from CART C, PROCESS P where P.cartID=C.cartID and P.orderID='$_POST[order]') where O.orderID='$_POST[order]'";
      mysql_query($set_total, $conn);
} else {
   $err = mysql_errno();
   if($err == 1062)
   {
      echo "<p>Cart with ID $_POST[cart] is already processed!</p>";
   }
   else {
      echo "error number $err";
   }
}
echo "<a href=\"my_carts.php\">Return</a> to Carts Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
include 'footer.php';
?>