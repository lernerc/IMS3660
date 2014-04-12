<?php

include 'topmenu.php';

echo "<table width=\"70%\" align=\"center\"><tr><td valign='top' width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
   $item = explode(',', $_POST[it]);
   $sql = "insert into LOCATED values ('$item[0]','$item[1]','$_POST[sNum]','$_POST[quant]')";
   if(mysql_query($sql,$conn))
   {
      echo "<h3> Located added!</h3>";

   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Item $item[2], already exists at location $_POST[sNum]</p>";
      }
      else {
	 echo "error number $err";
      }

   }
echo "<p><a href=\"located_choose.php\">Return</a> to Stock Page</p>";
echo "<p><a href=\"main.php\">Home</a></p>";
echo "</td></tr></table>";

include 'footer.php';

?>