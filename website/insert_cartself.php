<html>
<head><title>Inventory Management System</title></head>
<body>



<?php

include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td>";


echo "<h3>Create a new Cart</h3>";
echo "<form action=\"insertcartself.php\" method=post>";
echo "Cart ID: <input type=number name=\"id\">";
echo "<input type=submit name=\"submit\" value=\"Add Cart\">";
echo "</form>";

echo "<a href=\"my_carts.php\">Return</a> to Carts Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";

?>



</body>
</html>
