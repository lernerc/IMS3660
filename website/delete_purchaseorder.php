<html>
<head><title>Inventory Management System</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

   echo "<form action=\"deletepurchaseorder.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
   $sql = "select orderID, createdby from PURCHASE_ORDER";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      echo "Order ID: <select name=\"oid\">";

      while($val = mysql_fetch_row($result))
      {
	 echo "<option value=$val[0]>$val[0], $val[1]</option>";

      }
      echo "</select>";
      echo "<input type=submit name=\"submit\" value=\"Delete Purchase Order\">";
   }
   else
   {
      echo "<p>No Purchase Orders! </p>";
   }

   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
?>



</body>
</html>
