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
      
      echo "<h3>Update a User</h3>";
      echo "Username: $subusername";
      $sql = "select * from USER where username='$subusername'";
      $result = mysql_query($sql,$conn);
      while($val = mysql_fetch_row($result))
      {
	 echo "<form action=\"updateusername.php\" method=post>";
	 echo "Name: <input type=text name=\"name\" value=\"$val[1]\">";
	 echo "<input type=submit name=\"submit\" value=\"Update Name\">";
	 echo "</form>";
	 $sql1 = "select EXTRACT(MONTH from dob) from USER where username='$subusername'";
	 $result1 = mysql_query($sql1,$conn);
	 while($val1 = mysql_fetch_row($result1))
	 {
	    $month = $val1[0];
	 }
	 $sql2 = "select EXTRACT(DAY from dob) from USER where username='$subusername'";
	 $result2 = mysql_query($sql2,$conn);
	 while($val2 = mysql_fetch_row($result2))
	 {
	    $day = $val2[0];
	 }
	 $sql3 = "select EXTRACT(YEAR from dob) from USER where username='$subusername'";
	 $result3 = mysql_query($sql3,$conn);
	 while($val3 = mysql_fetch_row($result3))
	 {
	    $year = $val3[0];
	 }
	    echo "<form action=\"updateuserdob.php\" method=post>";
	    echo "<select name=\"month\">";
	    for($k=1; $k <= 12; $k=$k+1) {
	       if($k == 1)
		  $kname = 'Jan';
	       elseif($k == 2)
		  $kname = 'Feb';
	       elseif($k == 3)
		  $kname = 'Mar';
	       elseif($k == 4)
		  $kname = 'Apr';
	       elseif($k == 5)
		  $kname = 'May';
	       elseif($k == 6)
		  $kname = 'Jun';
	       elseif($k == 7)
		  $kname = 'Jul'; 
	       elseif($k == 8)
		  $kname = 'Aug';
	       elseif($k == 9)
		  $kname = 'Sep';
	       elseif($k == 10)
		  $kname = 'Oct';
	       elseif($k == 11)
		  $kname = 'Nov';
	       else
		  $kname = 'Dec';
	       echo "<option value=\"$k\"";if($month==$k){echo " selected";}echo ">$kname</option>";
	    }
	    echo "</select>";
	    
	    echo "<select name=\"day\">";
	    for($j=1; $j <= 31; $j=$j+1) {
	       echo "<option value=\"$j\"";if($day==$j){echo " selected";}echo ">$j</option>";
	    }
	    echo "</select>";
	    echo "<select name=\"year\">";
	    for($i=2014; $i > 1904; $i=$i-1) {
	       echo "<option value=\"$i\"";if($year==$i){echo " selected";}echo ">$i</option>";
	    }
	    echo "</select>";
	    echo "<input type=submit name=\"submit\" value=\"Update Birthday\">";
	    echo "</form>";
	    
	    echo "<form action=\"updateuserphone.php\" method=post>";
	    echo "Phone: <input type=text name=\"phone\" value=\"$val[3]\">";
	    echo "<input type=submit name=\"submit\" value=\"Update Phone\">";
	    echo "</form>";
	    echo "<form action=\"updateuseraddress.php\" method=post>";
	    echo "Address: <input type=text name=\"address\" value=\"$val[4]\">";
	    echo "<input type=submit name=\"submit\" value=\"Update Address\">";
	    echo "</form>";
	    echo "<form action=\"updateuserpassword.php\" method=post>";
	    echo "Password: <input type=password name=\"password\" value=\"$val[5]\">";
	    echo "<input type=submit name=\"submit\" value=\"Update Password\">";
	    echo "</form>";
	    echo "<form action=\"updateuseremail.php\" method=post>";
	    echo "Email: <input type=text name=\"email\" value=\"$val[6]\">";
	    echo "<input type=submit name=\"submit\" value=\"Update Email\">";
	    echo "</form>";
      }
      echo "<p><a type=button href=\"deleteuserself.php\">Delete Account</a></p>";
      echo "<p><a href=\"main.php\">Return</a> to Home Page</p>";
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
