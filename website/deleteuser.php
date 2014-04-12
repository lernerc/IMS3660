<?
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h2>Delete a User</h2>";
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
	       echo "<h1>User removed!</h1>";
	    else
	       echo "<h1>User does not exist!</h1>";
	 } else {
	    $err = mysql_errno();
	    if($err == 1062)
	    {
	       echo "<h1>Username $_POST[username] does not exist!</h1>";
	    }
	    //Should return if other relations other than customer exists but does not
	    else if($err == 1451) {
	       echo "<h1>User $_POST[username] has existing Relationships, so you cannot delete it</h1>";
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
	 echo "<h1>Username $_POST[username] does not exist!</h1>";
      }
      else if($err == 1451) {
	 echo "<h1>User $_POST[username] has existing Relationships beside being a Customer, so you cannot delete it</h1>";
      } else {
	 echo "error number $err";
      }
   }
   echo "<a href='EM_info.php'>Return</a> to People Information Page. <br>";
   echo "<a href=\"main.php\">Return</a> to Home Page.";

} else {
   echo "<h1>You are not logged in!</h1><p> <a href=\"login.php\">Login First</a></p>";
}

echo "</td></tr><table>";
include 'footer.php';
?>