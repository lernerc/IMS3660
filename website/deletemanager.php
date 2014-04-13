<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";

echo '<td valign="top">';
if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());

   $sql = "delete from MANAGER where username ='$_POST[username]'";
   if(mysql_query($sql,$conn))
   {
      if(mysql_affected_rows() > 0)
	 echo "<h1> Manager removed!</h1>";
      else
	 echo "<h1>Manager does not exist</h1>";
   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Manager $_POST[username] does not exist!</p>";
      } else if($err == 1451) {
	 echo "<h1>Manager $_POST[username] has existing Relationships, so you cannot delete it</h1>";
      } else {
	 echo "error number $err";
      }

   }
   echo "<a href=\"EM_info.php\">Return</a> to People Page.";
   echo "<br><a href=\"main.php\">Return</a> to Home Page.";
} else {
   echo "<h1>You are not logged in!</h1><p> <a href=\"login.php\">Login First</a></p>";

}
echo "</td>";
include 'footer.php';
?>