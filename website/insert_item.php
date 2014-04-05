<html>
<head><title>Inventory Management System</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

   echo "<form action=\"insertitem.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
   echo "<h3>Insert an Item</h3>";
   echo "Product Number: <input type=number name=\"pNum\">";
   echo "Barcode: <input type=number name=\"bar\">";
   echo "Name: <input type=text name=\"name\">";
   echo "Description: <input type=text name=\"desc\">";
   echo "Sales Price (cents): <input type=number name=\"sale\">";
   echo "Purchase Price (cents): <input type=number name=\"purchase\">";
   echo "<input type=submit name=\"submit\" value=\"Add Item\">";
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
?>



</body>
</html>
