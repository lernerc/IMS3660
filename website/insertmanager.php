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
   $sql_ID = "select max(ID) from MANAGER";
   $ID_table = mysql_query($sql_ID);
   $mid = 1;
   if(mysql_num_rows($ID_table) != 0) {
      $row = mysql_fetch_row($ID_table);
      $mid = $row[0] + $mid;
   }
   
   $sql = "insert into MANAGER values ('$_POST[username]','$mid')";
   if(mysql_query($sql,$conn))
   {
      echo "<h1> Manager added!</h1>";

   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Manager $_POST[username] already exists!</p>";
      }
      else {
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