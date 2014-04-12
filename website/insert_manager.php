<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h2>Insert a Manager</h2>";
if(isset($_COOKIE["username"])){
   
   echo "<form action=\"insertmanager.php\" method=post>";

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
      echo "<input type=submit name=\"submit\" value=\"Add Manager\">";
   }
   else
   {
      echo "<p>No Users! </p>";
   }

   echo "</form>";
   echo "<br><a href='EM_info.php'>Return</a> to People Information Page.";
   echo "<br><a href='main.php'>Home</a>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}

echo "</td>";
include 'footer.php';
?>

