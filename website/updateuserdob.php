<?php
include 'topmenu.php';

echo "<table width='70%' align='center'><tr><td width='25%' valign='top'>";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
      $dateB = date("Y-m-d",mktime(0,0,0,$_POST[month], $_POST[day],$_POST[year]));
      $sql = "update USER set dob='$dateB' where username='$subusername'";
      if(mysql_query($sql,$conn))
      {
	 echo "<h3> User birthday updated!</h3>";
	 
      } else {
	 $err = mysql_errno();
	 echo "error number $err";
      }
echo "<a href=\"update_user.php\">Return</a> to Profile Page.";
echo "<p><a href=\"main.php\">Home</a></p>";
echo "</td></tr></table>";

include 'footer.php';
?>