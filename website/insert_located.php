<html>
<head><title>Inventory Management System</title></head>
<body>



<?php
if(isset($_COOKIE["username"])){

   echo "<form action=\"insertlocated.php\" method=post>";

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
   $sql = "select storeNum from LOCATION";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      echo "Store Number: <select name=\"sNum\">";

      while($val = mysql_fetch_row($result))
      {
	 echo "<option value=$val[0]>$val[0]</option>";

      }
      echo "</select>";


      $sql1 = "select productNum from ITEMS";
      $result1 = mysql_query($sql1,$conn);
      if(mysql_num_rows($result1) != 0)
      {
	 echo "Item Product Number: <select name=\"pNum\">";
	 
	 while($val1 = mysql_fetch_row($result1))
	 {
	    echo "<option value=$val1[0]>$val1[0]</option>";
	    
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
	 }
      }
      
      
      echo "Quantity: <input type=text name=\"quant\">";
      echo "<input type=submit name=\"submit\" value=\"Add Located\">";
   }
   else
   {
      echo "<p>No Locations! </p>";
   }

   echo "</form>";
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
?>



</body>
</html>
