<html>
<head><title>Inventory Management System</title></head>
<body>



<?php

if(isset($_COOKIE["username"])){

   echo "<form action=\"deleteprocess.php\" method=post>";/*itemContains.php\" method=post>";*/
   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];

   $conn = mysql_connect("cronus.cs.uleth.ca",$username,$password) or die(mysql_error());
   mysql_select_db($username,$conn);
/*?>
<script language="javascript">
function setOptions(chosen) {
      var selbox = document.myform.selectmodel;
      selbox.options.length = 0;
      if(chosen == "0") {
	 selbox.options[selbox.options.length] = new Option('First select a car', '0');
      }
      <?
      $cart_result =  mysql_query("select cartID, createdby from CART");
      while(@($c=mysql_fetch_row($cart_result))) {
	 ?>
	 if(chosen == "<?=$c[0];?>") {
	    <?
	    $c_id = $c[0];
	    $item_result = mysql_query("select productNum, barcode, name from ITEMS I, CONTAINS C where cartID = '$c_id' and I.productNum = C.productNum and I.barcode = C.barcode");
	    while(@($item = mysql_fetch_row($mod_result))) {
	       ?>
	       selbox.options[selbox.options.length] = new
		  Option('<?=$tem[0];?>','<?=$item[1]?>');
	       <? } ?>
	       }
	 <? } ?>
   }

   <form name="myform"><div align="center"> 
<select name="selectcar" size="1" 
onchange="setOptions(document.myform.selectcar.options 
[document.myform.selectcar.selectedIndex].value);"> 
<option value="0" selected>Select a car</option> 
<? 
$result = mysql_query("SELECT cartID, createdby FROM CARTS") or die(mysql_error()); 
while(@($r=mysql_fetch_row($result))) 
{ 
?> 
  <option value="<?=$r['0'];?>"><?=$r[1]', '$r[0];?></option> 
<? 
} 
?> 
</select><br><br> 
<select name="selectmodel" size="1"> 
<option value=" " selected>First select a car</option> 
</select><br><br> 
<input type="button" name="go" value="Value Selected" 
onclick="alert(document.myform.selectmodel.options 
[document.myform.selectmodel.selectedIndex].value);"> 
</div></form> 
*/
   echo "<h3>Delete an Cart from an Order<h3>";
   $sql = "select cartID, createdby from CART";
   $result = mysql_query($sql,$conn);
   if(mysql_num_rows($result) != 0)
   {
      echo "Cart: <select name=\"carts\">";
      while($val = mysql_fetch_row($result)) {
	 echo "<option value=$val[0]>$val[1], $val[0]</option>";
      }
      echo "</select>";
      $sql2 = "select orderID, createdby from PURCHASE_ORDER";
      $result2 = mysql_query($sql2,$conn);
      if(mysql_num_rows($result2) != 0) {
	 echo "Order: <select name=\"order\">";
	 while($val = mysql_fetch_row($result2)) {
	    echo "<option value=$val[0]>$val[0], $val[1]</option>";
	 }
	 echo "</select>";
	 echo "<input type=submit name=\"submit\" value=\"Delete Item in Cart\">";
      } else {
	 echo "<h3>No Orders to put Carts into!</h3>";
      }
   } else {
      echo "<h3>No Carts to put into Orders! </h3>";
   }
   echo "</form>";
  
} else {
   echo "<h3>You are not logged in!</h3><p> <a href=\"login.php\">Login First</a></p>";
   
}
?>

</body>
</html>
