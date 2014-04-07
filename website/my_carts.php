<html>
<head><title>Inventory Management System</title></head>
<body>

 <?php
if(isset($_COOKIE["username"])){
   if(isset($_COOKIE["subusername"])){
      $subusername = $_COOKIE["subusername"];
      $username = $_COOKIE["username"];
      $password = $_COOKIE["password"];
      
      $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
      mysql_select_db($username,$conn);

      include 'topmenu.php';

      echo "<table width=\"70%\" align=\"center\"><tr><td width=\"25%\">";
      include 'sidemenu.php';
      echo "</td>";

      echo "<td>";
      echo "<h3>My Carts</h3>";
      echo "<a href=\"insert_cartself.php\">New Cart</a><br><br>";
      echo "<form action=\"update_cart.php\" method=post>";
      $sql = "select * from CART where createdBy='$subusername'";
      $result = mysql_query($sql,$conn);
      if(mysql_num_rows($result) != 0)
      {
	 echo "Cart: <select name=\"cart\">";
	 while($val = mysql_fetch_row($result))
	 {
	    echo "<option value=$val[0]>$val[0]</option>";  
	 }
      	 echo "</select>";
	 echo "<input type=submit name=\"submit\" value=\"Edit Cart\">";
      }
      else
      {
	 echo "<p>No Carts! </p>";
      }
      echo "</form>";

      echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
      echo "</td></tr></table>";
   }
   else
   {
      echo "<h3>You are not logged in to a user!</h3><p> <a href=\"sublogin.php\">Login First</a></p>";
   }
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";
   
}
?>

</body>
</html>