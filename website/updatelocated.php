<?php
include 'topmenu.php';

echo "<table width=\"70%\" align=\"center\"><tr><td valign='top' width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
$sql = "update LOCATED set quantity='$_POST[quant]' where productNum='$_POST[pNum]' and barcode='$_POST[bar]' and storeNum='$_POST[sNum]'";
if(mysql_query($sql,$conn))
{
	 echo "<h3> Located quantity updated!</h3>";
	 
} else {
   $err = mysql_errno();
   echo "error number $err";
   echo "$sql";
}
echo "<a href=\"located_choose.php\">Return</a> to Stock Page.";
echo "<p><a href=\"main.php\">Home</a></p>";
echo "</td></tr></table>";
include 'footer.php';
?>