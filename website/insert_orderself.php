<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";

echo "<h3>Insert a Purchase Order</h3>";
echo "<form action=\"insertpurchaseorder.php\" method=post>";
echo "Order ID: <input type=hidden name=\"orderid\">";
echo "Username: <select name=\"manager\">";
while($val = mysql_fetch_row($result))
{
   echo "<option value=$val[0],$val[1]>$val[0]</option>";
}
echo "</select>";
echo "<input type=submit name=\"submit\" value=\"Add Purchase Order\">";

echo "<a href=\"show_stores.php\">Return</a> to Stores Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
?>