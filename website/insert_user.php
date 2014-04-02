<html>
<head><title>Inventory Management System</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

   echo "<form action=\"insertuser.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
   echo "<h3>Insert a User</h3>";
   echo "Username: <input type=text name=\"username\">";
   echo "Name: <input type=text name=\"name\">";
   echo "Date of Birth: <input type=text name=\"dob\">";
   echo "Phone: <input type=text name=\"ph\">";
   echo "Password: <input type=text name=\"passwd\">";
   echo "Email: <input type=text name=\"email\">";
   echo "<input type=submit name=\"submit\" value=\"Add User\">";
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
?>



</body>
</html>
