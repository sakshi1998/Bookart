<html>
<head>
<?php
session_start();
$con = mysqli_connect("localhost","root","","bookart");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysqli_select_db($con,"bookart");

$var_value=$_SESSION['username'] ;
$sq="SELECT userid from user where username='$var_value' ";
$r="SELECT pincode from user where username='$var_value' ";
$sql = mysqli_query($con,$sq);
$sqll = mysqli_query($con,$r);
$sqq= mysqli_fetch_array($sql);
$s= mysqli_fetch_array($sqll);
$x=$sqq['userid'];
$y=$s['pincode'];
$d=mysqli_query($con,"SELECT sum(price) from  buynow group by username having username='$var_value'");
$g= mysqli_fetch_array($d);
$c=mysqli_query($con,"SELECT book_id from  buynow where username='$var_value'");
 
$k=0;
while($qq=mysqli_fetch_array($c))
{
$bd=$qq['book_id'];
$lk=mysqli_query($con,"SELECT discount from  books where book_id='$bd'");
$dis= mysqli_fetch_array($lk);
$k=$k+$dis['discount'];
}
echo"your total amount is before discount".$g['sum(price)'];
$aaa=$g['sum(price)']-$k*$g['sum(price)'];
echo "after discount".$aaa;
echo "Your order has been placed successfully !! ";
echo". You will recieve your order soon";
$h=mysqli_query($con,"SELECT name from  shops where pincode='$y'");
$t= mysqli_fetch_array($h);
echo"your suitable shop is".$t['name'];

/*$sq="SELECT * from buynow group by user_id";
$sql = mysqli_query($con,$sq);
$row = mysqli_num_rows($sql);
$sqq= mysqli_fetch_array($sql);

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


<tr>
<td></td>
<td></td>
<td>$sqq['sum(price)']</td>
</tr>
</table>
</html>
$q="SELECT name,phoneno from shops where pincode='$r'";
$sql = mysqli_query($con,$sq);
$row = mysqli_num_rows($sql);
$sqq= mysqli_fetch_array($sql);

echo  $sqq['name'];
echo" contact  : ";
echo $sqq['phoneno'];*/

mysqli_close($con);

?>
</html>
