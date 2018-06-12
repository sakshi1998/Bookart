<?php 
session_start();
$con = mysqli_connect("localhost","root","","bookart");

if (!$con)
{
  die('Could not connect: ' . mysqli_connect_error());
}
mysqli_select_db($con,"bookart");
$var_value=$_SESSION['username'] ;
$e=$_POST['varname'];
$d=mysqli_query($con,"SELECT  book_id from books WHERE book_name='$e'");
$result = mysqli_fetch_array($d);
$x= $result['book_id'];
$r="SELECT pincode from user where username='$var_value' ";
$sqll = mysqli_query($con,$r);
$s= mysqli_fetch_array($sqll);
$y=$s['pincode'];
$h=mysqli_query($con,"SELECT name from  shops where pincode='$y'");
$j= mysqli_fetch_array($h);
$q=$j['name'];
$f=mysqli_query($con,"select  price from books where book_name='$e'");
$result1 = mysqli_fetch_array($f);
$x1= $result1['price'];

$t=mysqli_query($con,"insert into buynow values('$e','$x','$x1','$var_value')");

$w=mysqli_query($con,"update $q set pieces=pieces-1 where b_id='$x' ");
echo '<script type="text/javascript">
           window.location = "checkout.html";
      </script>';

?>
