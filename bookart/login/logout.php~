<!DOCTYPE html>
 <html>
<head>
<tiltle>Successful Logout</title>
</head>
<body>
<center>
<p> <font size="40" color="brown">You have successfully logged off Bookart.<br>
Please visit again.<br>
Happy Reading!<br>
</font>

<body background="download(1).jpg">
</center>

<?php
session_start();
$con = mysqli_connect("localhost","root","","bookart");
if (!$con)
{
  die('Could not connect: ' . mysqli_connect_error());
}
$r=$_SESSION['username'];
unset($_SESSION['username']);
session_destroy();
$x=mysqli_query($con,"delete from buynow where username='$r'");
header("Location: login page");
exit;
?>
</body>
</html>
