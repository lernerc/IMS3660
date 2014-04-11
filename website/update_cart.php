<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td>";
echo "<h3>Modify Cart</h3>";
$sql = "select * from CART where cartID='$_POST[id]'";
$result = mysql_query($sql,$conn);
while($val = mysql_fetch_row($result))
{
   echo "Cart ID: $val[0]<br>";
   echo "<input type=\"hidden\" name=\"id\" value=\"$val[0]\">";
   echo "Created by: $val[1]<br>";
   echo "Total Price: $val[2]<br>";
   echo "<form action=\"deletecartself.php\" method=post>";
   echo "<input type=\"hidden\" name=\"id\" value=\"$val[0]\">";
   echo "<input type=submit name=\"submit\" value=\"Delete Cart\">";
   echo "</form>";
}
echo "<a href=\"my_carts.php\">Return</a> to Carts Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";

?>