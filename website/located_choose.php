<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td valign='top' width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
if($manager == TRUE || $employee == TRUE)
{
   $sql = "select storeNum from LOCATION";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      echo "<h3>Select Location</h3>";
      echo "<form action='show_located.php' method='post'>";
      echo "Location Number: <select name=\"sNum\">";
      while($val = mysql_fetch_row($result))
      {
	 echo "<option value=$val[0]>$val[0]</option>";   
      }
      echo "</select><br>";
      echo "<input type=submit name=\"submit\" value=\"Select Location\"><br>";
      echo "</form>";
   }
   else
   {
      echo "<p>No Stores! </p>";
   }
}
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
?>