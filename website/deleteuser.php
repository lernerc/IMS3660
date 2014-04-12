<?

if (isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or
      die(mysql_error());
   mysql_select_db($username,$conn) or die(mysql_error());

   $sql = "delete from CUSTOMER where username ='$_POST[username]'";
   if(mysql_query($sql,$conn))
   {
      if(mysql_affected_rows() > 0) {
	 //if the customer relation was deleted, then delete the USER relation
	 $sql1 = "delete from USER where username ='$_POST[username]'";
	 if(mysql_query($sql1,$conn))
	 {
	    if(mysql_affected_rows() > 0)
	       echo "<h3>User removed!</h3>";
	    else
	       echo "<h3>User does not exist!</h3>";
	 } else {
	    $err = mysql_errno();
	    if($err == 1062)
	    {
	       echo "<h3>Username $_POST[username] does not exist!</h3>";
	    }
	    //Should return if other relations other than customer exists but does not
	    else if($err == 1451) {
	       echo "<h3>User $_POST[username] has existing Relationships, so you cannot delete it</h3>";
	    } else {
	       echo "error number $err";
	    }
	 }
      }
      // error check if cannot delete customer relation
   } else {
      $err = mysql_errno();
      if($err == 1062)
      {
	 echo "<h3>Username $_POST[username] does not exist!</h3>";
      }
      else if($err == 1451) {
	 echo "<h3>User $_POST[username] has existing Relationships beside being a Customer, so you cannot delete it</h3>";
      } else {
	 echo "error number $err";
      }
   }
     
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";
}

echo "<a href='EM_info.php'>Return</a> to People Information Page. <br>";
echo "<a href=\"main.php\">Return</a> to Home Page.";

include 'footer.php';
?>