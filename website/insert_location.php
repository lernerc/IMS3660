<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
$sql2 = "select MAX(storeNum) from LOCATION";
$result = mysql_query($sql2,$conn);
while($val = mysql_fetch_row($result))
{
   $snum = $val[0] + 1;
}
echo "<h3>Insert a Location</h3>";
echo "<form action=\"insertlocation.php\" method=post>";
echo "Store Number: $snum<br><input type=hidden value='$snum' name=\"sNum\">";
echo "Name: <input type=text name=\"name\"><br>";
echo "Address: <input type=text name=\"addr\"><br>";
echo "Phone: <input type=text name=\"ph\"><br>";
echo "Hours: <input type=text name=\"hour\"><br>";
echo "Department: <input type=text name=\"dept\"><br>";
echo "<input type=submit name=\"submit\" value=\"Add Location\"><br>";
echo "</form>";
echo "<a href=\"show_stores.php\">Return</a> to Stores Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";

include 'footer.php';
?>
