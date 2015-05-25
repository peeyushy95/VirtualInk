<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<title>VirtuaInk: Registration</title>
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
						if(isset($_SESSION['uid'])){
						header('Location: dashboard.php');
							echo "ALREADY LOGGED IN";
							
						}
						else
						echo "<li class='current_page_item'><a href='login.php'>Log In</a></li>";
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
<br><br>
<h2 style="text-align:center">LogIn to Ink The World !</h2>
<br />

<form action="login.php" method="post">
	
			<br />
			<div class="logi">
			<label for="uname">Username:</label>
			<input type="text" size="30" id="uname" name="uname" class="input"/><br /><br />
   			<label for="pwd">Password:</label>
   			<input type="password" size="30" id="pwd" name="pwd" class="input"/><br />
   			</div>
    
    			<?php

			if(isset($_POST['submit'])){
				$uname = $_POST['uname'];
				$pwd = $_POST['pwd'];

				include('db_connect.php');

				if(empty($uname) || empty($pwd)) {
					echo '<p style="color:red" > Missing Information. Please fill in the required information.</p>';
				}
				
				else{
				$uname = strip_tags($uname);
				$uname = $db->real_escape_string($uname);
				$pwd = md5($pwd);
				
				$query = $db->query("SELECT uid,uname FROM log_info WHERE uname = '$uname' AND pwd = '$pwd' " );
				if($query->num_rows === 1) {
					while ($row = $query->fetch_object()){
						$_SESSION['uid'] = $row->uid;
					}
					header('Location: dashboard.php');
					exit();
				}
				else{
				echo '<p style="color:red" > Incorrect Username or Password !</p>';
				}
				}

			}

			?>
  		
  		<br /> 
		<input type="submit" value="LogIn" name="submit" class="button3"/>	
		
</form>

<br><br><br><br><br><br>
<div id="footer">
	<p>&copy; 2014 VirtualInk.com | Designed by Peeyush Yadav,Ankit Bisla and Ashutosh Kumar Tekriwal.</p>
</div>
<!-- end #footer -->
</body>
</html>
</body>
</html>
