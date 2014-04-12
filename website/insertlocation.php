<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td>";
   
   $sql = "insert into LOCATION values ('$_POST[sNum]','$_POST[name]','$_POST[addr]','$_POST[ph]','$_POST[hour]','$_POST[dept]')";
   if(mysql_query($sql,$conn))
   {
      echo "<h3> Location added!</h3>";

   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Store Number $_POST[sNum] already exists!</p>";
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