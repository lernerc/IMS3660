<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td>";


$sql = "update CART set totalPrice='$_POST[total]' where cartID='$_POST[id]'";
if(mysql_query($sql,$conn))
{
   echo "<h3> Cart total price updated!</h3>";   
}
else
{
   $err = mysql_errno();
   echo "error number $err";
}


echo "<a href=\"my_carts.php\">Return</a> to Carts Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";

?>