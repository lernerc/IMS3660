<?php
if(isset($_COOKIE["username"])){
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   if(isset($_COOKIE["subusername"])){
   $subusername = $_COOKIE["subusername"];
   
   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);

   include 'topmenu.php';

   echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
   include 'sidemenu.php';
   echo "</td>";
   
   echo "<td valign='top'>
       <h1> Inventory Management Database</h1>
       <p>Welcome! Please select a function on the left.</p>
    </td>
</tr>
    </table>";
   }
   else
   {
      echo "<h3>You are not logged in to a user!</h3><p> <a href=\"sublogin.php\">Login First</a></p>";
   }
} else {
   echo "<h3>You are not logged in to a database!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
include 'footer.php';
?>
   
