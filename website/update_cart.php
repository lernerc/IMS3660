<?php
include 'topmenu.php';
echo "<table width='70%' align='center'><tr><td valign='top' width='25%'>";
include 'sidemenu.php';
echo "</td>";
echo "<td valign='top'>";
echo "<h3>Modify Cart</h3>";
$sql = "select * from CART where cartID='$_POST[id]'";
$result = mysql_query($sql,$conn);
while($val = mysql_fetch_row($result))
{
   echo "Cart ID: $val[0]<br>";
   echo "<input type=\"hidden\" name=\"id\" value=\"$val[0]\">";
   echo "Created by: $val[1]<br>";
   $val[2]=number_format($val[2]/100, 2,'.', '');
   echo "Total Price: $$val[2]<br>";
   echo "<form action=\"deletecartself.php\" method=post>";
   echo "<input type=\"hidden\" name=\"id\" value=\"$val[0]\">";
   echo "<input type=submit name=\"submit\" value=\"Delete Cart\">";
   echo "</form>";
   if(mysql_num_rows($result) != 0)
   {
      echo "<h3>Item List</h3>";
      echo "<table><tr>";
      echo "<th>Product Number</th>";
      echo "<th>Barcode</th>";
      echo "<th>Name</th>";
      echo "<th>Description</th>";
      echo "<th>Price</th>";
      if($employee == TRUE || $manager == TRUE)
	 echo "<th>Purchase Price</th>";
      echo "<th>Quantity</th>";
      echo "</tr>";
      $sql2 = "select * from CONTAINS where cartID='$val[0]'";
      $result2 = mysql_query($sql2,$conn);
      while($val2 = mysql_fetch_row($result2))
      {
	 echo "<tr>";
	 echo "<td valign='top'>$val2[1]</td>";
	 echo "<td valign='top'>$val2[2]</td>";
	 $sql1 = "select * from ITEMS where productNum='$val2[1]' and barcode='$val2[2]'";
	 $result1 = mysql_query($sql1,$conn);
	 while($val1 = mysql_fetch_row($result1))
	 {
	    echo "<td valign='top'>$val1[2]</td>";
	    echo "<td valign='top'>$val1[3]</td>";
	    $val1[4]=number_format($val1[4]/100, 2,'.', '');
	    echo "<td valign='top'align='right'>$$val1[4]</td>";
	    if($employee == TRUE || $manager == TRUE)
	    {
	       $val1[5]=number_format($val1[5]/100, 2,'.', '');
	       echo "<td valign='top' align='right'>$$val1[5]</td>";
	    }
	    echo "<td valign='top'><form action=\"updatecontains.php\" method=post>";
	    echo "<input type=text size=4 name='amt' value=$val2[3]>";
	    echo "<input type=hidden value='$_POST[id]' name=\"carts\"><input type=\"hidden\" name=\"pNum\" value=\"$val2[1]\"><input type='hidden' name='bar' value='$val2[2]'>";
	    echo "<input type=submit name=\"submit\" value=\"Update\">";
	    echo "</form></td>";
	    echo "<td valign='top'><form action=\"deletecontains.php\" method=post>";
	    echo "<input type=hidden value='$_POST[id]' name=\"carts\">";
	    echo "<input type=\"hidden\" name=\"item\" value=\"$val2[1],$val2[2]\"><input type=submit name=\"submit\" value=\"Remove from Cart\">";
	    echo "</form><td>";
	 }
	 echo "</tr>";
      }
      echo "</table>";
   }
   else
   {
      echo "No Items in Cart!";
   }
}

echo "<a href=\"my_carts.php\">Return</a> to Carts Page.";
echo "<br><a href=\"main.php\">Home</a>";
echo "</td></tr></table>";
include 'footer.php';
?>