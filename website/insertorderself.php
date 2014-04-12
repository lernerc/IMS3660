<?php
include 'topmenu.php';
echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";

date_default_timezone_set('UTC');
$date = date("Y-m-d H:i:s");
$zero = 0;
$sql2 = "select MAX(orderID) from PURCHASE_ORDER";
$result = mysql_query($sql2,$conn);
while($val = mysql_fetch_row($result))
{
   $oid = $val[0] + 1;
}
$sqlM = "select id from MANAGER where username = '$subusername'";
$resultM = mysql_query($sqlM, $conn);
while($val1 = mysql_fetch_row($resultM))
{
   $id = $val1[0];
}
$sql = "insert into PURCHASE_ORDER (orderID, totalPrice, createdBy, id, oDate) values ('$oid',$zero,'$subusername','$id','$date')";
if(mysql_query($sql,$conn))
{
      echo "<h3> Purchase Order added!</h3>";
} else {
   $err = mysql_errno();
   if($err == 1062)
   {
      echo "<p>Purchase Order for Cart ID $_POST[id] already exists!</p>";
   }
   else {
      echo "error number $err";
   }
   
}

echo "<a href=\"show_orders.php\">Return</a> to Orders Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
?>