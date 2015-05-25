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
						if(isset($_SESSION['uid']))
						header('Location: dashboard.php');
						
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
<h3 style="text-align:center">Having trouble signing in?</h3>
<br /><br><br>

<form action="forget.php" method="post">
	
			<br />
			<div class="logi">
			<label for="uname">Username:</label>
			<input type="text" size="30" id="uname" name="uname" class="input"/><br /><br />
   			<label for="pwd">Email:</label>
   			<input type="Email" size="24.5" id="pwd" name="pwd" class="input"/><br />
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
				
				$query = $db->query("SELECT log_info.uid,uname FROM log_info,mem_info WHERE uname = '$uname' AND email = '$pwd' " );
				if($query->num_rows === 1) {
					echo '<p style="color:red" > Password has been sent to your email address!</p>';
					while ($row = $query->fetch_object()){
						//echo '<p style="color:red" > Password has been sent to your email address!</p>';
						//$_SESSION['uid'] = $row->uid;
					}
					//header('Location: index.php');
					exit();
				}
				else{
				echo '<p style="color:red" > Incorrect Username or Email  !</p>';
				}
				}

			}

			?>
  		
  		<br /> 
		<input type="submit" value="Submit" name="submit" class="button3"/>	
</form>
<br><br><br><br><br><br><br><br>

<div id="footer">
	<p>&copy; 2014 VirtualInk.com | Designed by Peeyush Yadav,Ankit Bisla and Ashutosh Kumar Tekriwal.</p>
</div>
<!-- end #footer -->
</body>
</html>
</body>
</html>
