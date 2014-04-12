<?php
include 'topmenu.php';

echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
$sql = "update ITEMS set description='$_POST[desc]' where productNum='$_POST[pNum]' and barcode='$_POST[bar]'";
if(mysql_query($sql,$conn))
{
	 echo "<h3> Item description updated!</h3>";
	 
} else {
   $err = mysql_errno();
   echo "error number $err";
}
echo "<a href=\"show_items.php\">Return</a> to Items Page.";
echo "<p><a href=\"main.php\">Home</a></p>";
echo "</td></tr></table>";

?>