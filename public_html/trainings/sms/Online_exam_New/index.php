<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Welcome to Online Exam</title>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
include("database.php");
extract($_POST);

if(isset($submit))
{
	$rs=mysqli_query($con,"select * from mst_user where login='$loginid' and pass='$pass'");
	if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION[login]=$loginid;
	}
}
if (isset($_SESSION[login])){
  echo "<h1 class='text-center bg-danger'>Welcome to Online Exam</h1>";
  echo '<table width="28%"  border="0" align="center">
    <tr>
      <td width="7%" height="65" valign="bottom"><img src="image/HLPBUTT2.JPG" width="50" height="50" align="middle"></td>
      <td width="93%" valign="bottom" bordercolor="#0000FF"> <a href="sublist.php" class="style4">Subject for Quiz </a></td>
    </tr>
    <tr>
      <td height="58" valign="bottom"><img src="image/DEGREE.JPG" width="43" height="43" align="absmiddle"></td>
      <td valign="bottom"> <a href="result.php" class="style4">Result </a></td>
    </tr>
  </table>';
   
  exit;
}

?>

<div class="container" style="background-color: whitesmoke; width: 40%; height: 300px; align: middle">
  <form method="post" action="">
  	<label for="uname"><b>Username</b></label>
	<input type="TEXT" title="enter your Username" placeholder="Username" maxlength="10" 
	  size="25"  id="loginid2" name="loginid" required/>

	<label for="psw"><b>Password</b></label>
	<input type="password" name="pass" id="pass2"/>

	<?php
	  if(isset($found))
	  {
	  	echo "Invalid Username or Password";
	  }
	?>
	<br/>
	<input class="btn btn-danger "type="submit" name="submit" id="submit" Value="Login"/>
	<a class="btn btn-success " href="signup.php">New user ? click here</a>
  </form>
</div>

</body>
</html>