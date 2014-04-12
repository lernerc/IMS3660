<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h2>Items related to '$_POST[item]'</h2>";

$sql = "select productNum, barcode, name, description, salesPrice from ITEMS where description LIKE '%$_POST[item]%' or name LIKE '%$_POST[item]%'";
$output = mysql_query($sql, $conn);
if(mysql_num_rows($output) != 0) {
   echo "<table><tr>";
   echo "<th>Product Number</th>";
   echo "<th>Barcode</th>";
   echo "<th>Name</th>";
   echo "<th>Description</th>";
   echo "<th>Price</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($output)) {
      for($i = 0; $i < 5; $i += 1) {
	 echo "<td>$val[$i]</td>";
      }
   }
   echo "</table>";
} else {
   echo "<h1>There are no items that fit those search terms</h1>";
}
echo "<br><a href='show_items.php'>Return</a> to Items Page.";
echo "<br><a href='main.php'>Home</a>";
echo "</td>";
include 'footer.php';
?>