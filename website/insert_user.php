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
   echo "<h3>Sign-Up!</h3>";
   echo "Username: <input type=text name=\"username\"><br>";
   echo "Password: <input type=password name=\"passwd\"><br>";
   echo "Name: <input type=text name=\"name\"><br>";
   /*echo "Date of Birth(MM/DD/YYYY): <input type=text name=\"dob\">";
    */
   echo "Birthday:";
   echo "</select><select name=\"year\">";
   for($i=2014; $i > 1904; $i=$i-1) {
      echo "<option value=\"$i\">$i</option>";
   }
   echo "</select>";
   echo "<select name=\"month\"><option value=\"1\">Jan</option>
<option value=\"2\">Feb</option> <option value=\"3\">Mar</option> <option value=\"4\">Apr</option> <option value=\"5\">May</option> <option value=\"6\">Jun</option> <option value=\"7\">Jul</option> <option value=\"8\">Aug</option> <option value=\"9\">Sep</option> <option value=\"10\">Oct</option> <option value=\"11\">Nov</option> <option value=\"12\">Dec</option></select>";
   echo "<select name='day'>";
   for($i= 1; $i < 32; $i=$i+1) {
      echo "<option value=$i>$i</option>";
   }
   echo "</select><br>";
   echo "Phone: <input type=text name=\"ph\"><br>";
   echo "Address: <input type=text name=\"address\"><br>";
   echo "Email: <input type=text name=\"email\"><br>";
   echo "<input type=submit name=\"submit\" value=\"Sign-Up\">";
   echo "</form>";
} else {
   echo "<h3>You are not logged in to a Database!</h3><p> <a href=\"login.php\">Login First</a></p>";
   
}
?>



</body>
</html>
