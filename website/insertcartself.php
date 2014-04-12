<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
$zero = 0;
$sql2 = "select MAX(cartID) from CART";
$result = mysql_query($sql2,$conn);
while($val = mysql_fetch_row($result))
{
   $cid = $val[0] + 1;
}
$sql = "insert into CART values ('$cid','$subusername','$zero')";
if(mysql_query($sql,$conn))
{
   echo "<h3> Cart '$cid' added!</h3>";
   
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

include 'footer.php';
?>