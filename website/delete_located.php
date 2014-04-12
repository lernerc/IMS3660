<?php

if(isset($_COOKIE["username"])){
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h2>Remove an Item from a Location</h2>";

   echo "<form action=\"deletelocated.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
   $sql = "select storeNum from LOCATION";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      echo "Location Number: <select name=\"sNum\">";

      while($val = mysql_fetch_row($result))
      {
	 echo "<option value=$val[0]>$val[0]</option>";

      }
      echo "</select>";

      $sql1 = "select productNum, barcode, name from ITEMS";
      $result1 = mysql_query($sql1,$conn);
      if(mysql_num_rows($result1) != 0)
      {
	 echo "Item Product Number: <select name=\"item\">";
	 
	 while($val1 = mysql_fetch_row($result1))
	 {
	    echo "<option value=$val1[0],$val1[1],$val1[2]>$val1[2]</option>";
	    
	 }
	 echo "</select>";
      }

      echo "<input type=submit name=\"submit\" value=\"Delete Located\">";
   }
   else
   {
      echo "<p>No Locations! </p>";
   }

   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
echo "</td>";
include 'footer.php';
?>
