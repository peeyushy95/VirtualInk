<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<title>Welcome to Virtual Ink</title>
<link href="styles.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<body>
<div id="menu-wrapper">
	<div id="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="blog.php">Blog</a></li>
			<li><a href="team.php">Our Team</a></li>
			<li><a href="about.php">About</a></li>
			<li class="current_page_item"><a href="suggest.php">Suggest Us</a></li>
			<li><a href="terms.php">Terms of Services</a></li>
			<?php 
						if(isset($_SESSION['uid']))
						{
						echo "<li><a href='dashboard.php' >Dashboard</a></li>"; 
						echo "<li><a href='logout.php' >Log Out</a></li>";
						}
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

<div id="wrapper">
	<div id="page">
		<div id="content">
			<div class="post">
				<h2 style="color:#F6B300;"><a href="#">&nbsp&nbsp&nbsp&nbsp&nbspThink, Quote & Help</a></h2><hr style=" background-color: black; height: 1px; width:80%" />
			</div>
			<div id="add-thought">
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		<div class="logi">
		<div>
			<br /><label>Email Address: </label><input type="text" name="email" size="30"/>
		</div>
		<div>
			<br /><label>Name: </label><input type = "text" name = "name" size="30"/>
		</div>
		<div>
			<br />
			<label>Profession: </label><input type="text" name="profession" size="30"/>
		</div>
		<div>
			<br /><label>Thoughts: </label><textarea name="thoughts" cols=24></textarea>
		</div><br /></div>
		
		<?php
			if(isset($_POST['submit'])){
				$email = $_POST['email'];
				$name = $_POST['name'];
				$profession = $_POST['profession'];
				$thoughts = $_POST['thoughts'];
				
				include('db_connect.php');
				
				if(empty($email) || empty($name) || empty($profession) || empty($thoughts)){
					echo '<p style="color:red" > Missing Information. Please fill in the required information.</p>';
				}
			
				else{
				include("dbinfo.inc.php");
				$database="dba";
						$db = new mysqli($dbhost, $dbuser, $dbpass, $database);
				$email = strip_tags($email);
				$email = $db->real_escape_string($email);
				$name = strip_tags($name);
				$name = $db->real_escape_string($name);
				$profession = strip_tags($profession);
				$profession = $db->real_escape_string($profession);
				$thoughts = strip_tags($thoughts);
				$thoughts = $db->real_escape_string($thoughts);
				
				$sql = "INSERT INTO thinkers VALUES('','$name','$email','$profession','$thoughts')";
				$query = $db->query($sql);
				
				if($query){
					echo '<p style="color:red" > Thank you for your precious thought.</p>';
				}
				else{
					echo "Error.";
				}
				}
			}
		?>
		<div style="padding:0px 0px 60px">
		<input type ="submit" name="submit" value="Submit" /><br />
		</div>
		</form>
	</div>
		</div>
		
		
	</div>
</div>

<div id="footer">
	<p>&copy; 2014 VirtualInk.com | Designed by Peeyush Yadav,Ankit Bisla and Ashutosh Kumar Tekriwal.</p>
</div>
<!-- end #footer -->
</body>
</html>
