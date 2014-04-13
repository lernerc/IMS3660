<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());
   $sql_ID = "select max(ID) from EMPLOYEE";
   $ID_table = mysql_query($sql_ID);
   $eid = 1;
   if(mysql_num_rows($ID_table) != 0) {
      $row = mysql_fetch_row($ID_table);
      $eid = $row[0] + $eid;
   }
   $sql = "insert into EMPLOYEE values ('$_POST[username]','$eid')";
   if(mysql_query($sql,$conn))
   {
      echo "<h3> Employee $_POST[username] added!</h3>";

   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<p>Employee $_POST[username] already exists!</p>";
      }
      else {
	 echo "error number $err";
      }

   }
      echo "<a href=\"EM_info.php\">Return</a> to People Page.";
   echo "<br><a href=\"main.php\">Return</a> to Home Page.";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}

?>