 <?php

include 'topmenu.php';

echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
if($employee or $manager) {
   echo "<td valign = 'top'>";
   echo "<h3>Employees</h3>";
   if($manager) {
      echo "<a href=\"insert_employee.php\">New Employee</a><br>";
   }
   $sql = "select name, phone, email from USER U where exists (select * from EMPLOYEE E where E.username = U.username)";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      if($manager)
	 echo "<a href=\"delete_employee.php\">Delete Employee</a>";
      echo "<table><tr>";
      echo "<th>name</th>";
      echo "<th>phone</th>";
      echo "<th>email</th>";
      echo "</tr>";
      while($val = mysql_fetch_row($result))
      {
	 echo "<tr>";
	 echo "<td>$val[0]</td>";
	 echo "<td>$val[1]</td>";
	 echo "<td>$val[2]</td>";
	 echo "</tr>";
      }
      echo "</table>";
   }
   else
   {
      echo "No Employees!";
   }
   echo "<h3>Managers</h3>";
   if($manager) {
      echo "<a href=\"insert_manager.php\">New Manager</a><br>";
   }
   $sql = "select name, phone, email from USER U where exists (select * from MANAGER M where M.username = U.username)";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      if($manager)
	 echo "<a href=\"delete_manager.php\">Delete Manager</a>";
      echo "<table><tr>";
      echo "<th>name</th>";
      echo "<th>phone</th>";
      echo "<th>email</th>";
      echo "</tr>";
      while($val = mysql_fetch_row($result))
      {
	 echo "<tr>";
	 echo "<td>$val[0]</td>";
	 echo "<td>$val[1]</td>";
	 echo "<td>$val[2]</td>";
	 echo "</tr>";
      }
      echo "</table>";
   }
   else
   {
      echo "No Managers!";
   }
   echo "<h3>Customers</h3>";
   $sql = "select name, address, phone, email from USER U, CUSTOMER C where C.username = U.username";
   $result1 = mysql_query($sql,$conn);
   if(mysql_num_rows($result1) != 0)
   {
      echo "<table><tr>";
      echo "<th>name</th>";
      echo "<th>address</th>";
      echo "<th>phone</th>";
      echo "<th>email</th>";
      echo "</tr>";
      while($val = mysql_fetch_row($result1))
      {
	 echo "<tr>";
	 echo "<td>$val[0]</td>";
	 echo "<td>$val[1]</td>";
	 echo "<td>$val[2]</td>";
	 echo "<td>$val[3]</td>";
	 echo "</tr>";
      }
      echo "</table>";
   }
   else
   {
      echo "No Customers!";
   }
}
echo "<br><h3>Delete User</h3>";
include 'delete_user.php';


echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
echo "</td></tr></table>";

include 'footer.php';
?>