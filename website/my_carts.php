<html>
<head><title>Inventory Management System</title></head>
<body>

 <?php

include 'topmenu.php';

echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
echo "<h3>My Carts</h3>";
echo "<a href=\"insertcartself.php\">New Cart</a><br><br>";
$sql = "select * from CART where createdBy='$subusername'";
$result = mysql_query($sql,$conn);
echo "<table><tr>";
echo "<th>Cart ID</th>";
echo "<th>Creator</th>";
echo "<th>Total Price</th>";
echo "</tr>";
while($val = mysql_fetch_row($result))
{
   echo "<form action=\"update_cart.php\" method=post>";
   echo "<tr>";
   echo "<td>$val[0]</td>";
   echo "<td>$val[1]</td>";
   echo "<td>$val[2]</td>";
   echo "<td><input type=\"hidden\" name=\"id\" value=\"$val[0]\"><input type=submit name=\"submit\" value=\"Edit Cart\"></td>";
   echo "</tr>";
   echo "</form>";
}
echo "</table>";

echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
echo "</td></tr></table>";

include 'footer.php';
?>

</body>
</html>