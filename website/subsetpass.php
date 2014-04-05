<?php

if(isset($_COOKIE["username"])){
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   
   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);

   $subusername = $_POST["subusername"];
   $subpassword = $_POST["subpassword"];
   
   $sql = "select * from USER where username='$subusername'";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      while($val = mysql_fetch_row($result))
      {
	 $pass = $val[5];
	 if($subpassword == $pass)
	 {
	    setcookie("subusername",$subusername,time()+3600);
	    setcookie("subpassword",$subpassword,time()+3600);
	    header('Location:main.php');
	 }
	 else{
	    echo "<h3>Incorrect Password!</h3><br><a href=\"sublogin.php\">Try Again</a>";
	 }
      }
   }
   else
   {
      echo "<p>Invalid username!</p>";
   }
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";
   
}

?>
