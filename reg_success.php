

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<title>Welcome to Virtual Ink</title>
<link href="styles.css" rel="stylesheet" type="text/css"/>
</head>


<body>
<div id="menu-wrapper">
	<div id="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="blog.php">Blog</a></li>
			<li><a href="team.php">Our Team</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="suggest.php">Suggest Us</a></li>
			<li><a href="terms.php">Terms of Services</a></li>
			<?php 
						if(isset($_SESSION['uid']))
						header('Location: index.php');
						
						else
						echo "<li><a href='login.php'>Log In</a></li>";
					?>
		</ul>
	</div>
	<!-- end #menu -->
	
	
</div>
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1>Virtual<span>Ink</span></h1>
			<p>writes for real people </p>
		</div>
	</div>
</div>
<!-- end #header -->

<?php
include("dbinfo.inc.php");
$database="dba";
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
@mysql_select_db($database) or die( "Unable to select database");

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$dob = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['date'];
$email = $_POST['email'];
$uname = $_POST['uname'];
$pwd = ($_POST['pwd']);


if(empty($fname) || empty($lname) || empty($email) || empty($uname) || empty($pwd)){
	header('Location: registration.php');
	exit();
}
else if(strlen($pwd)<6)
{
 echo "<p style='text-align:center; font-size:20px;color :white'>Password must be atleast 6 characters long. Please fill in the registration form again by clicking<a href='registration.php'> Registration </a></p>";
}
else if(!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
    echo "<p style='text-align:center; font-size:20px;color : white'>This is not a valid email. Please fill in the registration form again by clicking<a href='registration.php'> Registration </a></p>";
}

else{
$pwd = md5($_POST['pwd']);
$sql1 = "INSERT INTO mem_info VALUES('','$email','$fname','$lname','$dob','$gender')";
$retval1 = mysql_query( $sql1, $conn );

if(! $retval1 )
{
  die('Could not enter data: ' . mysql_error());
}

$sql2 = "INSERT INTO log_info VALUES ('','$uname','$pwd')";
$retval2 = mysql_query( $sql2, $conn);

if(! $retval2)
{
  die('Could not enter data: ' . mysql_error());
}
echo '<h2 style="text-align:center">Welcome</h2>';
echo '<p style="text-align:center;color : white; font-size:200%">'.$fname.' '.$lname.'</p>';
echo '<p style="text-align:center;color : white; font-size:200%">Registration Successfull</p>';
echo '<p style="text-align:center;color : white; font-size:150%"><a href="login.php"> Click Here to LogIn</a></p>';
}
mysql_close($conn);

?>

<div id="footer">
	<p>&copy; 2014 VirtualInk.com | Designed by Peeyush Yadav,Ankit Bisla and Ashutosh Kumar Tekriwal.</p>
</div>
<!-- end #footer -->
</body>
</html>
