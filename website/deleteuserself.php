<?php

include 'topmenu.php';

echo "<table width='70%' align='center'><tr><td width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo "<td>";
      
      $sql = "delete from USER where username ='$subusername'";
      if(mysql_query($sql,$conn))
      {
	 if(mysql_affected_rows() > 0)
	    echo "<h3> User removed!</h3>";
	 else
	    echo "<h3>User does not exist!</h3>";
	 header('Location:sublogout.php');
      } else {
	 $err = mysql_errno();
	 if($err == 1062)
	 {
	    echo "<h3>Username $subusername does not exist!</h3>";
	 }
	 else if($err == 1451) {
	    echo "<h3>User $subusername has existing Relationships, so you cannot delete it</h3>";
	 } else {
	    echo "error number $err";
	 }
	 
      }
echo "<a href=\"update_user.php\">Return</a> to Profile Page.";
echo "<p><a href=\"main.php\">Home</a></p>";
echo "</td></tr></table>";

include 'footer.php';
?>