<?php

include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";

$sql = "insert into WAREHOUSE values ('$_POST[sNum]')";
if(mysql_query($sql,$conn))
{
      echo "<h3> Warehouse added!</h3>";
      
} else {
   $err = mysql_errno();
   if($err == 1062)
   {
      echo "<p>Warehouse $_POST[sNum] already exists!</p>";
   }
   else {
      echo "error number $err";
   }
   
}
echo "<a href=\"show_stores.php\">Return</a> to Stores Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";

include 'footer.php';
?>