<?php

include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td valign='top' width=\"25%\">";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
   $sql = "insert into ITEMS values ($_POST[pNum],$_POST[bar],'$_POST[name]','$_POST[desc]','$_POST[sale]','$_POST[purchase]')";
   if(mysql_query($sql,$conn))
   {
      echo "<h3> Item added!</h3>";

   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Item product number $_POST[pNum], or barcode $_POST[bar] already exists!</p>";
      }
      else {
	 echo "error number $err";
      }

   }
  echo "<br><a href=\"show_items.php\">Return</a> to Items Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
include 'footer.php'
?>