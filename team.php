<?php 
session_start(); 

include('db_connect.php');

$team = $db->prepare("SELECT uid,fname,lname,email FROM mem_info");
$team->execute();
$team->bind_result($myid,$fname,$lname,$email);

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
			<li class="current_page_item"><a href="team.php">Our Team</a></li>
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
				<h2 class="title" ><a href="#">The <span style = "color:#F6B300;">Virtual</span> Inkers</a></h2><br />
				<div style="background:#E1DBDB; border-radius:10px; border:2px solid black; padding: 30px 60px 10px 40px">
					<?php
					$i=1;
						while($team->fetch())
						{
							echo "<p><span style=''>$i. <a href='author_blog.php?id=$myid' style='color:black'>$fname $lname</a></span><span style='float:right;color:grey'>$email</span></p>";
							$i++;
						}
					?>
				</div>
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
