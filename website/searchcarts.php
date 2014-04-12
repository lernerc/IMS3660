<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h2>Orders related to '$_POST[cart]'</h2>";

$sql = "select * from CART where cartID LIKE '%$_POST[cart]%' or createdBy LIKE '%$_POST[cart]%'";
$output = mysql_query($sql, $conn);
if(mysql_num_rows($output) != 0) {
   echo "<table><tr>";
   echo "<th valign='top'>Cart ID</th>";
   echo "<th valign='top'>Creator</th>";
   echo "<th valign='top'>Total Price</th>";
   echo "<th valign='top'>Purchase Order</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($output)) {
      echo "<tr>";
      for($i = 0; $i < 2; $i += 1) {
	 echo "<td valign='top'>$val[$i]</td>";
      }
      $val[2]=number_format($val[2]/100, 2, '.', '');
      echo "<td valign='top' align='right'>$$val[2]</td>";
      echo "<td valign='top'>$val[3]</td>";
      echo "</tr>";
   }
   echo "</table>";
} else {
   echo "<h1>There are no carts that fit those search terms.</h1>";
}
echo "<br><a href='my_carts.php'>Return</a> to Carts Page.";
echo "<br><a href='main.php'>Home</a>";
echo "</td>";
include 'footer.php';
?>