<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h2>Locations related to '$_POST[loc]'</h2>";
$sql ="";
if($employee || $manager) {
   $sql = "select * from LOCATION where name LIKE '%$_POST[loc]%' or address LIKE '%$_POST[loc]%' or storeNum LIKE '%$_POST[loc]%'";
} else {
   $sql = "select * from LOCATION Q where exists (select * from STORE S where exists (select * from LOCATION L where L.storeNum=S.storeNum and name LIKE '%$_POST[loc]%' or address LIKE '%$_POST[loc]%' or L.storeNum LIKE '%$_POST[loc]%') and Q.storeNum=S.storeNum)";
}
//echo $sql;
$result = mysql_query($sql, $conn);
if(mysql_num_rows($result) != 0) {
   echo "<table><tr>";
   echo "<th valign='top'>Store Number</th>";
   echo "<th valign='top'>Name</th>";
   echo "<th valign='top'>Address</th>";
   echo "<th valign='top'>Phone</th>";
   echo "<th valign='top'>Hours</th>";
   echo "</tr>";
   while($val = mysql_fetch_row($result)) {
      echo "<tr>";
      for($i = 0; $i < 5; $i += 1) {
	 echo "<td valign='top'>$val[$i]</td>";
      }
      echo "</tr>";
   }
   echo "</table>";
} else {
   echo "<h1>There are no Locations that fit those search terms.</h1>";
}
echo "<br><a href='show_orders.php'>Return</a> to Orders Page.";
echo "<br><a href='main.php'>Home</a>";
echo "</td>";
include 'footer.php';
?>