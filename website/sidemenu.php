<?php
if(isset($_COOKIE["username"])){
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];
   if(isset($_COOKIE["subusername"])){
   $subusername = $_COOKIE["subusername"];
   
   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);

   echo "<table>
<tr>
<td>
 <ul>
          <li><a href=\"my_carts.php\">My Carts</a></li>
          <li><a href=\"delete_user.php\">Delete User</a></li>
          <li><a href=\"insert_customer.php\">Insert Customer</a></li>
          <li><a href=\"delete_customer.php\">Delete Customer</a></li>
          <li><a href=\"insert_employee.php\">Insert Employee</a></li>
          <li><a href=\"delete_employee.php\">Delete Employee</a></li>
          <li><a href=\"insert_manager.php\">Insert Manager</a></li>
          <li><a href=\"delete_manager.php\">Delete Manager</a></li>
          <li><a href=\"insert_item.php\">Insert Item</a></li>
          <li><a href=\"delete_item.php\">Delete Item</a></li>
          <li><a href=\"insert_location.php\">Insert Location</a></li>
          <li><a href=\"delete_location.php\">Delete Location</a></li>
          <li><a href=\"insert_store.php\">Insert Store</a></li>
          <li><a href=\"delete_store.php\">Delete Store</a></li>
          <li><a href=\"insert_warehouse.php\">Insert Warehouse</a></li>
          <li><a href=\"delete_warehouse.php\">Delete Warehouse</a></li>
          <li><a href=\"insert_cart.php\">Insert Cart</a></li>
          <li><a href=\"delete_cart.php\">Delete Cart</a></li>
          <li><a href=\"insert_purchaseorder.php\">Insert Purchase Order</a></li>
          <li><a href=\"delete_purchaseorder.php\">Delete Purchase Order</a></li>
          <li><a href=\"insert_contains.php\">Insert an Item into a Cart</a></li>
          <li><a href=\"delete_contains.php\">Delete an Item from a Cart</a></li>
          <li><a href=\"insert_process.php\">Insert a Cart into an Order</a></li>
          <li><a href=\"delete_process.php\">Delete a Cart from an Order</a></li>
          <li><a href=\"insert_located.php\">Insert Located</a></li>
          <li><a href=\"delete_located.php\">Delete Located</a></li>

       </ul>
</td>
</tr>
</table>";
   
   }
   else
   {
      echo "<h3>You are not logged in to a user!</h3><p> <a href=\"sublogin.php\">Login First</a></p>";
   }
} else {
   echo "<h3>You are not logged in to a database!</h3><p> <a href=\"login.php\">Login First</a></p>";

}
?>