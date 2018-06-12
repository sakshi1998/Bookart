<?php
session_start();
$con = mysqli_connect("localhost","root","","bookart");
if (!$con)
{
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"bookart");
$uu=$_POST['username'];
$pa=$_POST['password'];
$sq="SELECT username,password FROM user WHERE username='$uu'";
$sql = mysqli_query($con,$sq);
$row = mysqli_num_rows($sql);
$sqq= mysqli_fetch_array($sql);
if ($row > 0 and $sqq['password']==$pa)
{
$_SESSION['username']=$_POST['username'];
$var_value = $_SESSION['username'];
echo '<script type="text/javascript">
           window.location = "inde1.php"
      </script>';
}
else
{
echo '<script type="text/javascript">
           window.location = "login page";
      </script>';
}

if (!mysqli_query($con,$sq))
  {
  die('Error: ' . mysqli_error($con));
  }
mysqli_close($con);
?>
