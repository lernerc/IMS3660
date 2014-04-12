<?php

include 'topmenu.php';

echo "<table width=\"70%\" align=\"center\"><tr><td valign='top' width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
echo "<h3>Item Location List</h3>";
echo "Location Number: $_POST[sNum]";

if($manager == TRUE || $employee == TRUE)
{
   $sql = "select * from ITEMS";
   $result = mysql_query($sql,$conn);
   echo "<table><tr>";
   echo "<th valign='top'>Product Number</th>";
   echo "<th valign='top'>Barcode</th>";
   echo "<th valign='top'>Name</th>";
   echo "<th valign='top'>Description</th>";
   echo "<th valign='top'>Price</th>";
   echo "<th valign='top'>Purchase Price</th>";
   if($manager == FALSE)
      echo "<th valign='top'>Quantity</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($result))
   {
      echo "<tr>";
      echo "<td valign='top'>$val[0]</td>";
      $sql1 = "select * from ITEMS where productNum='$val[0]' and barcode='$val[1]'";
      $result1 = mysql_query($sql1,$conn);
      while($val1 = mysql_fetch_row($result1))
      {
	 echo "<td valign='top'>$val[1]</td>";
	 echo "<td valign='top'>$val1[2]</td>";
	 echo "<td valign='top'>$val1[3]</td>";
	 $val1[4]=number_format($val1[4]/100, 2, '.','');
	 echo "<td valign='top' align='right'>$$val1[4]</td>";
	 $val1[5]=number_format($val1[5]/100, 2, '.','');
	 echo "<td valign='top' align='right'>$$val1[5]</td>"; 
	 $sql3 = "select * from LOCATED where storeNum='$_POST[sNum]' and productNum='$val[0]' and barcode='$val[1]'";
	 $result3 = mysql_query($sql3,$conn);
	 if(mysql_num_rows($result3) != 0)
	 {
	    while($val3 = mysql_fetch_row($result3))
	    {
	       if($manager == TRUE)
	       {
		  echo "<td valign='top'><form action='updatelocated.php' method=post>";
		  echo "<input type='text' name='quant' size=4 value='$val3[3]'>";
		  echo "</td><td valign='top'><input type='hidden' name='pNum' value='$val[0]'>";
		  echo "<input type='hidden' name='bar' value='$val[1]'>";
		  echo "<input type='hidden' name='sNum' value='$_POST[sNum]'>";
		  echo "<input type=submit name='submit' value='Update'>";
		  echo "</form><td>";
	       }
	       else
	       {
		  echo "<td>$val3[3]</td>";
	       }
	    }
	 }
	 else
	 {
	    if($manager == TRUE)
	    {
	       echo "<td valign='top'><form action='insertlocated.php' method=post>";
	       echo "<input type='text' name='quant' size=4 value='$val3[3]'>";
	       echo "</td><td valign='top'><input type='hidden' name='it' value='$val[0],$val[1]'>";
	       echo "<input type='hidden' name='sNum' value='$_POST[sNum]'>";
	       echo "<input type=submit name='submit' value='Add to Location'>";
	       echo "</form><td>";
	    }
	 }
      }
      echo "</tr>";
   }
}
echo "</table>";
echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
echo "</td></tr></table>";

include 'footer.php';
?>