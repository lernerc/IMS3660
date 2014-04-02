<html>
<head><title>Inventory Management System</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

   echo "<form action=\"insertcart.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
   echo "<h3>Insert a Cart</h3>";
   $sql = "select username from USER";
   $result = mysql_query($sql, $conn);
   if(mysql_num_rows($result) != 0)
   {
      echo "Cart ID: <input type=number name=\"id\">";
      echo "Username: <select name=\"username\">";
      while($val = mysql_fetch_row($result))
      {
	 echo "<option value=$val[0]>$val[0]</option>";
      }
      echo "</select>";
      echo "<input type=submit name=\"submit\" value=\"Add Cart\">";
      
   } else {
      echo "<p>No Users to make Carts for!</p>";
   }
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
?>



</body>
</html>
