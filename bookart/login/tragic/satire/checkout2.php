<?php
session_start();
$con = mysqli_connect("localhost","root","","bookart");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysqli_select_db($con,"bookart");

$uu=$_POST['username'];
$pa=$_POST['password'];
$sq="SELECT user_id,pincode from currentuser";
$sql = mysqli_query($con,$sq);
$row = mysqli_num_rows($sql);
$sqq= mysqli_fetch_array($sql);
$curr=$sqq['user_id'];
$pin=$sqq['pincode'];
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysql_error());
  }
$sq="SELECT * from buynow group by user_id";
$sql = mysqli_query($con,$sq);
$row = mysqli_num_rows($sql);
$sqq= mysqli_fetch_array($sql);
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysql_error());
  }
<html>
<table>
<tr>
<th>BOOK ID</th>
<th>BOOK NAME</th>
<th>PRICE</th>
</tr>
while($sqq= mysqli_fetch_array($sql))
{
<tr>
<td>$sqq['book_id']</td>
<td>$sqq['book_name']</td>
<td>$sqq['price']</td>
</tr>
}
</html>
$sq="SELECT sum(price) from  buynow where user_id=$curr";
$sql = mysqli_query($con,$sq);
$row = mysqli_num_rows($sql);
$sqq= mysqli_fetch_array($sql);
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysql_error());
  }
<tr>
<td></td>
<td></td>
<td>$sqq['sum(price)']</td>
</tr>
</table>

$sq="SELECT name,phoneno from shops where pincode=$pin";
$sql = mysqli_query($con,$sq);
$row = mysqli_num_rows($sql);
$sqq= mysqli_fetch_array($sql);
echo "Your order has been placed successfully from ";
echo  $sqq['name'];
echo" contact  : ";
echo $sqq['phoneno'];
echo". You will recieve your order soon";
mysqli_close($con);
$sq="SELECT user_id,sum(price) from buynow group by user_id";

?>
