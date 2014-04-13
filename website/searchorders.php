<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h2>Orders related to '$_POST[order]'</h2>";

$sql = "select * from PURCHASE_ORDER where orderID LIKE '%$_POST[order]%' or createdBy LIKE '%$_POST[order]%' or id LIKE '%$_POST[order]'";
$output = mysql_query($sql, $conn);
if(mysql_num_rows($output) != 0) {
   echo "<table><tr>";
   echo "<th valign='top'>Order ID</th>";
   echo "<th valign='top'>Date</th>";
   echo "<th valign='top'>Total Price</th>";
   echo "<th valign='top'>Creator</th>";
   echo "<th valign='top'>Manager ID</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($output)) {
      echo "<tr>";
      for($i = 0; $i < 2; $i += 1) {
	 echo "<td valign='top'>$val[$i]</td>";
      }
      $val[2]=number_format($val[2]/100, 2, '.', '');
      echo "<td valign='top' align='right'>$$val[2]</td>";
      for($i = 3; $i < 5; $i += 1) {
	 echo "<td valign='top'>$val[$i]</td>";
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