<?php
if(isset($_COOKIE["username"])){
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   if(isset($_COOKIE["subusername"])){
      $subusername = $_COOKIE["subusername"];
      
      $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
      mysql_select_db($username,$conn);
      
      echo "<table><tr><td><ul>";
      echo "<li><a href=\"my_carts.php\">Carts</a></li>
          <li><a href=\"show_stores.php\">Stores</a></li>
          <li><a href=\"show_items.php\">Items</a></li>";
      $managerCheck = "select * from MANAGER where username='$subusername'";
      $employeeCheck = "select * from EMPLOYEE where username='$subusername'";
      $result2 = mysql_query($managerCheck, $conn);
      $result3 = mysql_query($employeeCheck, $conn);
      $manager = FALSE;
      $employee = FALSE;
      if(mysql_num_rows($result2) != 0)
      {
	 $manager = TRUE;
	 echo "<li><a href='show_orders.php'>Orders</a></li>";
	 echo "<li><a href='EM_info.php'>People</a></li>";
	 echo "<li><a href=\"located_choose.php\">Stock</a></li>";
      }
      else if(mysql_num_rows($result3) != 0)
      {
	 $employee = TRUE;
	 echo "<li><a href='show_orders.php'>Orders</a></li>";
	 echo "<li><a href='EM_info.php'>People</a></li>";
	 echo "<li><a href=\"located_choose.php\">Stock</a></li>";
      }
      else
      {
	 
      }
      
      echo "</ul></td></tr></table>";
      
   }
   else
   {
      echo "<h3>You are not logged in to a user!</h3><p> <a href=\"sublogin.php\">Login First</a></p>";
   }
} else {
   echo "<h3>You are not logged in to a database!</h3><p> <a href=\"login.php\">Login First</a></p>";
   
}
?>