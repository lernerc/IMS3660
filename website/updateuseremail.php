<?php
include 'topmenu.php';

echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td>";
      $sql = "update USER set email='$_POST[email]' where username='$subusername'";
      if(mysql_query($sql,$conn))
      {
	 echo "<h3> User email updated!</h3>";
	 
      } else {
	 $err = mysql_errno();
	 echo "error number $err";
      }
      echo "<a href=\"update_user.php\">Return</a> to Profile Page.";
echo "<p><a href=\"main.php\">Home</a></p>";
echo "</td></tr></table>";

?>