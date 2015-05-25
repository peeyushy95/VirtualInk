<?php 
session_start(); 
include('db_connect.php');
$pid = $_GET['id'];
?>
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
			<li><a href="suggest.php">Suggest Us</a></li>
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
				<?php
					$query = $db->query("DELETE FROM posts WHERE post_id = '$pid'");
					if($query){
						echo "<h3> The post has been deleted. </h3>";
						echo "<a href='dashboard.php'> <p style='color:brown;'>Click here to get POWER</p></a>";
					}
					else
						echo "Error!";
				?>
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
