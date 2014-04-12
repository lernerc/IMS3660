<?php

include 'topmenu.php';

echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h3>Item</h3>";
echo "Product Number: $_POST[pNum]<br>";
echo "Barcode: $_POST[bar]<br><br>";
      $sql = "select * from ITEMS where productNum='$_POST[pNum]' and barcode='$_POST[bar]'";
      $result = mysql_query($sql,$conn);
      while($val = mysql_fetch_row($result))
      {
	 echo "<form action=\"updateitemname.php\" method=post>";
	 echo "Name: <input type=text name=\"name\" value=\"$val[2]\">";
	 echo "<input type=hidden name=\"pNum\" value=\"$val[0]\">";
	 echo "<input type=hidden name=\"bar\" value=\"$val[1]\">";
	 echo "<input type=submit name=\"submit\" value=\"Update Name\">";
	 echo "</form>";
	    
	 echo "<form action=\"updateitemdesc.php\" method=post>";
	 echo "Description: <input type=text name=\"desc\" value=\"$val[3]\">";
	 echo "<input type=hidden name=\"pNum\" value=\"$val[0]\">";
	 echo "<input type=hidden name=\"bar\" value=\"$val[1]\">";
	 echo "<input type=submit name=\"submit\" value=\"Update Description\">";
	 echo "</form>";
	 
	 echo "<form action=\"updateitemprice.php\" method=post>";
	 echo "Price: <input type=text name=\"price\" value=\"$val[4]\">";
	 echo "<input type=hidden name=\"pNum\" value=\"$val[0]\">";
	 echo "<input type=hidden name=\"bar\" value=\"$val[1]\">";
	 echo "<input type=submit name=\"submit\" value=\"Update Price\">";
	 echo "</form>";
	 
	 echo "<form action=\"updateitempprice.php\" method=post>";
	 echo "Purchase Price: <input type=text name=\"pprice\" value=\"$val[5]\">";
	 echo "<input type=hidden name=\"pNum\" value=\"$val[0]\">";
	 echo "<input type=hidden name=\"bar\" value=\"$val[1]\">";
	 echo "<input type=submit name=\"submit\" value=\"Update Purchase Price\">";
	 echo "</form>";
      }
echo "<p><a href=\"show_items.php\">Return</a> to Items Page</p>";
echo "<p><a href=\"main.php\">Home</a></p>";
echo "</td></tr></table>";

include 'footer.php'
?>
