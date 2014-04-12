<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td valign='top' width=\"25%\">";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
if($manager == TRUE)
{
   echo "<h3>Insert an Item</h3>";
   $sql2 = "select MAX(productNum) from ITEMS";
   $result = mysql_query($sql2,$conn);
   while($val = mysql_fetch_row($result))
   {
      $pNum = $val[0] + 1;
   }
   echo "Product Number: $pNum<input type=hidden value='$pNum' name=\"pNum\"><br>";
   $sql3 = "select MAX(productNum) from ITEMS";
   $result3 = mysql_query($sql3,$conn);
   while($val3 = mysql_fetch_row($result3))
   {
      $bar = $val3[0] + 1;
   }
   echo "Barcode: $bar<input type=hidden value='$bar' name=\"bar\"><br><br>";
   echo "Name: <input type=text name=\"name\"><br>";
   echo "Description: <input type=text name=\"desc\"><br>";
   echo "Sales Price (cents): <input type=number name=\"sale\"><br>";
   echo "Purchase Price (cents): <input type=number name=\"purchase\"><br>";
   echo "<input type=submit name=\"submit\" value=\"Add Item\">";
   echo "</form>";
}
echo "<br><a href=\"show_items.php\">Return</a> to Items Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
include 'footer.php'
?>
