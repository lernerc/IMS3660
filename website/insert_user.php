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
   /*echo "Date of Birth(MM/DD/YYYY): <input type=text name=\"dob\">";
    */
   echo "Birthday:<select name=\"month\"><option value=\"1\">Jan</option>
<option value=\"2\">Feb</option> <option value=\"3\">Mar</option> <option value=\"4\">Apr</option> <option value=\"5\">May</option> <option value=\"6\">Jun</option> <option value=\"7\">Jul</option> <option value=\"8\">Aug</option> <option value=\"9\">Sep</option> <option value=\"10\">Oct</option> <option value=\"11\">Nov</option> <option value=\"12\">Dec</option></select>
<select name=\"day\"><option value=\"2\">2</option> <option value=\"3\">3</option><option value=\"4\">4</option> <option value=\"5\">5</option><option value=\"6\">6</option> <option value=\"7\">7</option><option value=\"8\">8</option> <option value=\"9\">9</option><option value=\"10\">10</option> <option value=\"11\">11</option><option value=\"12\">12</option> <option value=\"13\">13</option><option value=\"14\">14</option> <option value=\"15\">15</option><option value=\"16\">16</option> <option value=\"17\">17</option><option value=\"18\">18</option> <option value=\"19\">19</option><option value=\"20\">20</option> <option value=\"21\">21</option><option value=\"22\">22</option> <option value=\"23\">23</option><option value=\"24\">24</option> <option value=\"25\">25</option><option value=\"26\">26</option> <option value=\"27\">27</option><option value=\"28\">28</option> <option value=\"29\">29</option><option value=\"30\">30</option> <option value=\"31\">31</option></select><select name=\"year\">";
   for($i=2014; $i > 1904; $i=$i-1) {
      echo "<option value=\"$i\">$i</option>";
   }
   echo "</select>";
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
