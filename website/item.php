<html>
<head><title>Inventory Management System</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);

   echo "<form action=\"insertitem.php\" method=post>";
   echo "<h3>Insert an Item</h3>";
   echo "Product Number: <input type=text name=\"pNum\">";
   echo "Barcode: <input type=text name=\"bar\">";
   echo "Name: <input type=text name=\"name\">";
   echo "Description: <input type=text name=\"desc\">";
   echo "Sales Price: <input type=text name=\"sale\">";
   echo "Purchase Price: <input type=text name=\"purchase\">";
   echo "<input type=submit name=\"submit\" value=\"Add Item\">";
   echo "</form><br><br>";




   echo "<form action=\"deleteitem.php\" method=post>";
   echo "<h3>Delete an Item</h3>";
   $sql = "select productNum from ITEMS";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      echo "Item Product Number: <select name=\"pNum\">";

      while($val = mysql_fetch_row($result))
      {
	 echo "<option value=$val[0]>$val[0]</option>";

      }
      echo "</select>";
      $sql2 = "select barcode from ITEMS";
      $result2 = mysql_query($sql2,$conn);
      if(mysql_num_rows($result2) != 0)
      {
	 echo "Item Barcode: <select name=\"bar\">";

	 while($val2 = mysql_fetch_row($result2))
	 {
	    echo "<option value=$val2[0]>$val2[0]</option>";

	 }
      echo "</select>";
      echo "<input type=submit name=\"submit\" value=\"Delete Item\">";
      }
   }
   else
   {
      echo "<p>No Products! </p>";
   }
      echo "</form>";


       echo "<form action=\"itemname.php\" method=post>";
   echo "<h3>Delete an Item</h3>";
   $sql = "select productNum from ITEMS";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      echo "Item Product Number: <select name=\"pNum\">";

      while($val = mysql_fetch_row($result))
      {
	 echo "<option value=$val[0]>$val[0]</option>";

      }
      echo "</select>";
      $sql2 = "select barcode from ITEMS";
      $result2 = mysql_query($sql2,$conn);
      if(mysql_num_rows($result2) != 0)
      {
	 echo "Item Barcode: <select name=\"bar\">";

	 while($val2 = mysql_fetch_row($result2))
	 {
	    echo "<option value=$val2[0]>$val2[0]</option>";

	 }
      echo "</select>";
      echo "<input type=submit name=\"submit\" value=\"Delete Item\">";
      }
   }
   else
   {
      echo "<p>No Products! </p>";
   }
      echo "</form>";


      
   
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
?>



</body>
</html>