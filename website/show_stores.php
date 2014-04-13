<?php

include 'topmenu.php';

echo "<table width=\"70%\" align=\"center\"><tr><td valign='top' width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td valign='top'>";
if($manager == FALSE)
{
   echo "<h3>Store List</h3>";

   echo "<form action='searchlocations.php' method=post>";
   echo "Search for: <input type=text name='loc'>";
   echo "<input type=submit name='submit' value='Search Locations'></form>";

   $sql = "select * from STORE";
   $result = mysql_query($sql,$conn);
   echo "<table><tr>";
   echo "<th valign='top'>Number</th>";
   echo "<th valign='top'>Name</th>";
   echo "<th valign='top'>Address</th>";
   echo "<th valign='top'>Phone Number</th>";
   echo "<th valign='top'>Hours</th>";
   echo "<th valign='top'>Department</th>";
   echo "</tr>";
   
   while($val = mysql_fetch_row($result))
   {
      echo "<tr>";
      echo "<td valign='top'>$val[0]</td>";
      $sql1 = "select * from LOCATION where storeNum='$val[0]'";
      $result1 = mysql_query($sql1,$conn);
      while($val1 = mysql_fetch_row($result1))
      {
	 echo "<td valign='top'>$val1[1]</td>";
	 echo "<td valign='top'>$val1[2]</td>";
	 echo "<td valign='top'>$val1[3]</td>";
	 echo "<td valign='top'>$val1[4]</td>";
	 echo "<td valign='top'>$val1[5]</td>";
	 if($manager == TRUE)
	 {
	    echo "<td valign='top'><form action='deletestore.php' method=post>";
	    echo "<input type=hidden value='$val[0]' name='sNum'>";
	    echo "<input type=submit name='submit' value='Delete'></td>";
	    echo "</form><td>";
	 }
	 
      }
      echo "</tr>";
   }
   echo "</table>";
}
if($employee == TRUE)
{
   echo "<h3>Warehouse List</h3>";
   echo "<table><tr>";
   echo "<th valign='top'>Number</th>";
   echo "<th valign='top'>Name</th>";
   echo "<th valign='top'>Address</th>";
   echo "<th valign='top'>Phone Number</th>";
   echo "<th valign='top'>Hours</th>";
   echo "<th valign='top'>Department</th>";
   echo "</tr>";
   $sql = "select * from WAREHOUSE";
   $result = mysql_query($sql,$conn);
   while($val = mysql_fetch_row($result))
   {
      echo "<tr>";
      echo "<td valign='top'>$val[0]</td>";
      $sql1 = "select * from LOCATION where storeNum='$val[0]'";
      $result1 = mysql_query($sql1,$conn);
      while($val1 = mysql_fetch_row($result1))
      {
	 echo "<td valign='top'>$val1[1]</td>";
	 echo "<td valign='top'>$val1[2]</td>";
	 echo "<td valign='top'>$val1[3]</td>";
	 echo "<td valign='top'>$val1[4]</td>";
	 echo "<td valign='top'>$val1[5]</td>";
      }
      echo "</tr>";
   }
   echo "</table>";
}
if($manager == TRUE)
{
   echo "<h3>Location List</h3>";
   echo "<a href='insert_location.php'>New Location</a>";

   echo "<form action='searchlocations.php' method=post>";
   echo "Search for: <input type=text name='loc'>";
   echo "<input type=submit name='submit' value='Search Locations'></form>";
   
   echo "<table><tr>";
   echo "<th valign='top'>Number</th>";
   echo "<th valign='top'>Name</th>";
   echo "<th valign='top'>Address</th>";
   echo "<th valign='top'>Phone Number</th>";
   echo "<th valign='top'>Hours</th>";
   echo "<th valign='top'>Department</th>";
   echo "</tr>";
   $sql = "select * from LOCATION";
   $result = mysql_query($sql,$conn);
   while($val = mysql_fetch_row($result))
   {
      echo "<tr>";
      echo "<td valign='top'>$val[0]</td>";
      echo "<td valign='top'>$val[1]</td>";
      echo "<td valign='top'>$val[2]</td>";
      echo "<td valign='top'>$val[3]</td>";
      echo "<td valign='top'>$val[4]</td>";
      echo "<td valign='top'>$val[5]</td><td>";
      $sql1 = "select * from STORE where storeNum='$val[0]'";
      $result1 = mysql_query($sql1,$conn);
      while($val1 = mysql_fetch_row($result1))
      {
	 echo "<form action='deletestore.php' method=post>";
	 echo "<input type=hidden value='$val[0]' name='sNum'>";
	 echo "<input type=submit name='submit' value='Delete Store' >";
	 echo "</form>";
      }
      $sql3 = "select * from LOCATION where not exists (select * from STORE where storeNum='$val[0]')";
      $result3 = mysql_query($sql3,$conn);
      if(mysql_num_rows($result3) != 0)
      {
	 echo "<form action='insertstore.php' method=post>";
	 echo "<input type=hidden value='$val[0]' name='sNum'>";
	 echo "<input type=submit name='submit' value='Assign Store'>";
	 echo "</form>";
      }
      $sql2 = "select * from WAREHOUSE where storeNum='$val[0]'";
      $result2 = mysql_query($sql2,$conn);
      while($val2 = mysql_fetch_row($result2))
      {
	 echo "<form action='deletewarehouse.php' method=post>";
	 echo "<input type=hidden value='$val[0]' name='sNum'>";
	 echo "<input type=submit name='submit' value='Delete Warehouse'>";
	 echo "</form>";
      }
      $sql4 = "select * from LOCATION where not exists (select * from WAREHOUSE where storeNum='$val[0]')";
      $result4 = mysql_query($sql4,$conn);
      if(mysql_num_rows($result4) != 0)
      {
	 echo "<form action='insertwarehouse.php' method=post>";
	 echo "<input type=hidden value='$val[0]' name='sNum'>";
	 echo "<input type=submit name='submit' value='Assign Warehouse'>";
	 echo "</form>";
      }
      echo "<form action='deletelocation.php' method=post>";
      echo "<input type=hidden value='$val[0]' name='sNum'>";
      echo "<input type=submit name='submit' value='Delete Location'>";
      echo "</form>";
      echo "</td></tr>";
   }
   echo "</table>";
   
}
echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
      echo "</td></tr></table>";

include 'footer.php';
?>