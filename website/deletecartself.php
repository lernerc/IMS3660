<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td>";

$sql = "delete from CART where cartID ='$_POST[id]'";
if(mysql_query($sql,$conn))
{
   if(mysql_affected_rows() > 0)
      echo "<h3>Cart removed!</h3>";
   else
      echo "<h3>Cart does not exist</h3>";
} else {
   $err = mysql_errno();
   if($err == 1062)
   {
      echo "<p>Cart Number $_POST[id] does not exist!</p>";
   }
   else {
      echo "Cannot delete! Cart contains items.<br>";
   }   
}

echo "<a href=\"my_carts.php\">Return</a> to Carts Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";

?>