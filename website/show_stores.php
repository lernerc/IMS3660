<?php

include 'topmenu.php';

echo "<table width=\"70%\" align=\"center\"><tr><td valign='top' width=\"25%\">";
include 'sidemenu.php';
echo "</td>";

echo "<td>";
echo "<h3>Store List</h3>";
$sql = "select * from STORE";
$result = mysql_query($sql,$conn);
echo "<table><tr>";
echo "<th>Number</th>";
echo "<th>Name</th>";
echo "<th>Address</th>";
echo "<th>Phone Number</th>";
echo "<th>Hours</th>";
echo "<th>Department</th>";
echo "</tr>";

while($val = mysql_fetch_row($result))
{
   echo "<tr>";
   echo "<td>$val[0]</td>";
   $sql1 = "select * from LOCATION where storeNum='$val[0]'";
   $result1 = mysql_query($sql1,$conn);
   while($val1 = mysql_fetch_row($result1))
   {
      echo "<td>$val1[1]</td>";
      echo "<td>$val1[2]</td>";
      echo "<td>$val1[3]</td>";
      echo "<td>$val1[4]</td>";
      echo "<td>$val1[5]</td>";
      if($manager == TRUE)
      {
	 echo "<td><form action=\"deletestore.php\" method=post>";
	 echo "<input type=hidden value='$val[0]' name=\"sNum\">";
	 echo "<input type=submit name=\"submit\" value=\"Delete\"></td>";
	 echo "</form><td>";
      }
      
   }
   echo "</tr>";
}
echo "</table>";

if($employee == TRUE || $manager == TRUE)
{
   echo "<h3>Warehouse List</h3>";
   echo "<table><tr>";
   echo "<th>Number</th>";
   echo "<th>Name</th>";
   echo "<th>Address</th>";
   echo "<th>Phone Number</th>";
   echo "<th>Hours</th>";
   echo "<th>Department</th>";
   echo "</tr>";
   $sql = "select * from WAREHOUSE";
   $result = mysql_query($sql,$conn);
   while($val = mysql_fetch_row($result))
   {
      echo "<tr>";
      echo "<td>$val[0]</td>";
      $sql1 = "select * from LOCATION where storeNum='$val[0]'";
      $result1 = mysql_query($sql1,$conn);
      while($val1 = mysql_fetch_row($result1))
      {
	 echo "<td>$val1[1]</td>";
	 echo "<td>$val1[2]</td>";
	 echo "<td>$val1[3]</td>";
	 echo "<td>$val1[4]</td>";
	 echo "<td>$val1[5]</td>";
	 if($manager == TRUE)
	 {
	    echo "<td><form action=\"deletewarehouse.php\" method=post>";
	    echo "<input type=hidden value='$val[0]' name=\"sNum\">";
	    echo "<input type=submit name=\"submit\" value=\"Delete\"></td>";
	    echo "</form><td>";
	 }
      }
      echo "</tr>";
   }
}
echo "</table>";
echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
      echo "</td></tr></table>";

?>