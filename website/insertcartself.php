<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td>";
$zero = 0;
$sql = "insert into CART values ('$_POST[id]','$subusername','$zero')";
if(mysql_query($sql,$conn))
{
   echo "<h3> Cart added!</h3>";
   
}
else
{
   $err = mysql_errno();
   if($err == 1062)
   {
      echo "<p>Cart ID $_POST[id] already exists!</p>";
   }
   else
   {
      echo "error number $err";
   }
   
}
echo "<a href=\"my_carts.php\">Return</a> to Carts Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";

?>