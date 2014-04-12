<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td>";
$sql = "delete from STORE where storeNum ='$_POST[sNum]'";
if(mysql_query($sql,$conn))
{
   if(mysql_affected_rows() > 0)
	 echo "<h3> Store removed!</h3>";
   else
      echo "<h3>Store does not exist</h3>";
} else {
   $err = mysql_errno();
   if($err == 1062)
   {
      echo "<p>Store Number $_POST[sNum] does not exist!</p>";
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