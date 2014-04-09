<html>
<head><title>Inventory Management System</title></head>
<body>

<?php
if(isset($_COOKIE["username"])){

   echo "<form action=\"insertcontains.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
   $sqlCart = "select cartID from CART";
   $sqlItems = "select name, productNum, barcode from ITEMS";
   $resultCart = mysql_query($sqlCart, $conn);
   $resultItems = mysql_query($sqlItems, $conn);
   if(mysql_num_rows($resultCart) != 0) {
      if(mysql_num_rows($resultItems) != 0) {
	 echo "<h3>Insert Items into a Cart</h3>";
	 echo "Cart ID: <select name=\"cid\">";
	 while($val = mysql_fetch_row($resultCart)) {
	    echo "<option value = $val[0]>$val[0]</option>";
	 }
	 echo "</select>";
	 echo "Item: <select name =\"item\">";
	 while($val = mysql_fetch_row($resultItems)) {
	    echo "<option value = $val[1],$val[2],$val[0]>$val[0]</option>";
	 }
	 echo "</select>";
	 echo "quantity: <input type=number name=\"num\">";
	 echo "<input type=submit name=\"submit\" value=\"Add Item\">";
      } else {
	 echo "<h3>There are no Items to put in Carts</h3>";
      }
   } else {
      echo"<h3>There are no Carts to put Items into</h3>";
   }
   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
?>



</body>
</html>
