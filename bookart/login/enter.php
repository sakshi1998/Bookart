<?php 
session_start();
$con = mysqli_connect("localhost","root","","bookart");
if (!$con)
{
  die('Could not connect: ' . mysqli_connect_error());
}
mysqli_select_db($con,"bookart");
$q="select username from user";
$q1=mysqli_query($con,$q);
$w=test_input($_POST['username']);
$e=$_POST['password'];
$r=$_POST['email'];
$y=$_POST['pincode'];
$f=$_POST['phone'];
$x=$_POST['userid'];
$g=0;
//$date=mysql_query("select curdate() from dual",$con);
//$da=mysql_fetch_assoc($date,)
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
while($roo=mysqli_fetch_array($q1))
{
if($roo['username']==$w)
	$g=1;
}
if($g==1)
{
	session_unset();
	session_destroy();
	echo '<script type="text/javascript">
	alert("Username already exist");
           window.location = "login.html";
      </script>';
}
else
{
	$_SESSION['username']=$w;
	$t=mysqli_query($con,"insert into user values('$w','$x','$e','$y','$f','$r')");
	/*if($y=="EXPERT")
	{
		$tr=mysqli_query("insert into expert values('$w','$f')",$con);
	}
	else
	{
		$fd=mysqli_query("insert into fav values('$w','$f')",$con);
	}*/
	echo '<script type="text/javascript">
           window.location = "login page";
      </script>';
}
?>
