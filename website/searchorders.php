<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h2>Items related to '$_POST[order]'</h2>";

$sql = "select * from PURCHASE_ORDER where orderID LIKE '%$_POST[order]%' or createdBy LIKE '%$_POST[order]%' or id LIKE '%$_POST[order]'";
$output = mysql_query($sql, $conn);
if(mysql_num_rows($output) != 0) {
   echo "<table><tr>";
   echo "<th>Order ID</th>";
   echo "<th>Date</th>";
   echo "<th>Total Price</th>";
   echo "<th>Creator</th>";
   echo "<th>Manager ID</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($output)) {
      echo "<tr>";
      for($i = 0; $i < 5; $i += 1) {
	 echo "<td>$val[$i]</td>";
      }
      echo "</tr>";
   }
   echo "</table>";
} else {
   echo "<h1>There are no orders that fit those search terms.</h1>";
}
echo "<br><a href='show_orders.php'>Return</a> to Orders Page.";
echo "<br><a href='main.php'>Home</a>";
echo "</td>";
include 'footer.php';
?>