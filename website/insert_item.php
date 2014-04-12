<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td valign='top' width=\"25%\">";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h3>Insert an Item</h3>";
echo "Product Number: <input type=number name=\"pNum\">";
echo "Barcode: <input type=number name=\"bar\">";
echo "Name: <input type=text name=\"name\">";
echo "Description: <input type=text name=\"desc\">";
echo "Sales Price (cents): <input type=number name=\"sale\">";
echo "Purchase Price (cents): <input type=number name=\"purchase\">";
echo "<input type=submit name=\"submit\" value=\"Add Item\">";
echo "</form>";
echo "<a href=\"show_stores.php\">Return</a> to Stores Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
?>
