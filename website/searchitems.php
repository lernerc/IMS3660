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
   echo "<th valign='top'>Product Number</th>";
   echo "<th valign='top'>Barcode</th>";
   echo "<th valign='top'>Name</th>";
   echo "<th valign='top'>Description</th>";
   echo "<th valign='top'>Price</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($output)) {
      echo "<tr>";
      for($i = 0; $i < 4; $i += 1) {
	 echo "<td valign='top'>$val[$i]</td>";
      }
      $output = number_format($val[4]/100, 2, '.', '');
      echo "<td valign='top' align='right'>$$output</td>";
      echo "</tr>";
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