<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
   $it = explode(',', $_POST[item]);
   $sql = "delete from CONTAINS where cartID='$_POST[carts]' and productNum='$it[0]' and barcode='$it[1]'";
   if(mysql_query($sql,$conn))
   {
      if(mysql_affected_rows() > 0) {
	 echo "<h3>Item removed from Cart!</h3>";
	 $total = "select sum(quantity*salesPrice) from ITEMS I, CONTAINS C where I.productNum = C.productNUM and I.barcode = C.barcode and C.cartID = '$_POST[carts]'";
	 $total_table = mysql_query($total);
	 $value = mysql_fetch_row($total_table);
	 if(is_null($value[0]))
	    $value[0] = 0;
	 $update_total = "update CART set totalPrice = $value[0] where cartID=$_POST[carts]";
	 mysql_query($update_total, $conn);
      } else {
	 echo "<h3>Item does not exist in Cart!</h3>";
      }
   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<h3>Item does not exist in Cart!</h3>";
      } else if($err == 1451) {
	 echo "<h3>Item $it[2] in cart $_POST[carts] has existing Relationships, so you cannot delete it</h3>";
      } else {
	 echo "error number $err";
      }

   }
echo "<a href=\"my_carts.php\">Return</a> to Carts Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";

include 'footer.php';

?>