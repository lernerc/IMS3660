<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h3>View Cart</h3>";
$sql = "select * from CART where cartID='$_POST[id]'";
$result = mysql_query($sql,$conn);
while($val = mysql_fetch_row($result))
{
   echo "Cart ID: $val[0]<br>";
   echo "<input type=\"hidden\" name=\"id\" value=\"$val[0]\">";
   echo "Created by: $val[1]<br>";
   $output=number_format($val[2]/100, 2,'.', '');
   echo "Total Price: $$output<br>";
   echo "<h3>Item List</h3>";
   echo "<table><tr>";
   echo "<th valign='top'>Product Number</th>";
   echo "<th valign='top'>Barcode</th>";
   echo "<th valign='top'>Name</th>";
   echo "<th valign='top'>Description</th>";
   echo "<th valign='top'>Price</th>";
   if($employee == TRUE || $manager == TRUE)
      echo "<th valign='top'>Purchase Price</th>";
   echo "<th valign='top'>Quantity</th>";
   echo "</tr>";
   $sql2 = "select * from CONTAINS where cartID='$val[0]'";
   $result2 = mysql_query($sql2,$conn);
   while($val2 = mysql_fetch_row($result2))
   {
      echo "<tr>";
      echo "<td valign='top'>$val2[1]</td>";
      echo "<td valign='top'>$val2[2]</td>";
      $sql1 = "select * from ITEMS where productNum='$val2[1]' and barcode='$val2[2]'";
      $result1 = mysql_query($sql1,$conn);
      while($val1 = mysql_fetch_row($result1))
      {
	 echo "<td valign='top'>$val1[2]</td>";
	 echo "<td valign='top'>$val1[3]</td>";
	 $output=number_format($val1[4]/100, 2,'.', '');
	 echo "<td valign='top' align='right'>$$output</td>";
	 if($employee == TRUE || $manager == TRUE) {
	    $output=number_format($val1[5]/100, 2,'.', '');
	    echo "<td valign='top' align='right'>$$output</td>";
	 }
	 echo "<td valign='top'>$val2[3]</td>";
      }
      echo "</tr>";
   }
   echo "</table>";
}

echo "<a href=\"my_carts.php\">Return</a> to Carts Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
include "footer.php";
?>