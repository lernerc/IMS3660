<html>	
<head><title>Inventory Management System</title></head>
<body>

<?php
if(isset($_COOKIE["username"])){

   echo "<form action=\"insertprocess.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
   echo "<h3>Process a Cart into an Order</h3>";
    $sql = "select cartID, createdby from CART";
    $sql2 = "select orderID, createdby from PURCHASE_ORDER";
   $result = mysql_query($sql, $conn);
   $result2 = mysql_query($sql2, $conn);
   if(mysql_num_rows($result) != 0) {
      if(mysql_num_rows($result2) != 0) {
	 echo "Order ID: <select name=\"order\">";
	 while($val = mysql_fetch_row($result2))
	 {
	    echo "<option value=$val[0]>$val[0], $val[1]</option>";
	 }
	 echo "</select>";

	 echo "Cart ID: <select name=\"cart\">";
	 while($val = mysql_fetch_row($result)) {
	    echo "<option value=$val[0]>$val[1], $val[0]</option>";
	 }
	 echo "</select>";
	 echo "<input type=submit name=\"submit\" value=\"Add Cart to Order\">";
	 } else {
	 echo "<h3>No Order exists to hold Carts</h3>";
	 }
   } else {
      echo "<h3>No Cart exists to put in Orders!</h3>";
   }
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";
   }

?>

</body>
</html>
