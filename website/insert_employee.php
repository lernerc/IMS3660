<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";

include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
if(isset($_COOKIE["username"])){

   echo "<h2>Insert an Employee</h2>";
   echo "<form action=\"insertemployee.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
   $sql = "select username from USER";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      echo "Username: <select name=\"username\">";

      while($val = mysql_fetch_row($result))
      {
	 echo "<option value=$val[0]>$val[0]</option>";

      }
      echo "</select>";
      echo " ID: <input type=number name=\"eid\">";
      echo "<input type=submit name=\"submit\" value=\"Add Employee\">";
   }
   else
   {
      echo "<p>No Users! </p>";
   }

   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
echo '</td>';
include 'footer.php';

?>


