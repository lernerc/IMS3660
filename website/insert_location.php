<html>
<head><title>Inventory Management System</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

   echo "<form action=\"insertlocation.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
   echo "<h3>Insert a Location</h3>";
   echo "Store Number: <input type=number name=\"sNum\">";
   echo "Name: <input type=text name=\"name\">";
   echo "Address: <input type=text name=\"addr\">";
   echo "Phone: <input type=text name=\"ph\">";
   echo "Hours: <input type=text name=\"hour\">";
   echo "Department: <input type=text name=\"dept\">";
   echo "<input type=submit name=\"submit\" value=\"Add Location\">";
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
?>



</body>
</html>
