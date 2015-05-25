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
			<li class="current_page_item"><a href="about.php">About</a></li>
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
				<div style="background-color:#F0F0F0; border-radius: 15px;border:2px solid;">
				<p style="font-family:Gapstown; font-size:24px;color:brown;padding: 10px 10px 30px 10px;"><img src="images/start.gif" width=50 /><br />Virtual Ink, the name contradicts with its actual meaning. When pen meets paper,there starts the true virtual reality of Life. It writes for the real people.<br /><img src="images/end.gif" width=50 style="float:right"/></p>
				</div>
				<br /><br />
				<h3 style="color :brown;text-decoration:underline;">VirtualInk.com</h3><br />
				<p style="font-size:18px;font-family: 'Courier New'">Virtual Ink is started by Peeyush Yadav,Ankit Bisla and Ashutosh Kumar Tekriwal to provide people to enjoy the skill of writing and reading along with learning. It is solely created by and for the community who are having a keen interest to fight with words rather swords. Its totally open to all, means any one can register and contribute to VirtualInk.com from any where on the globe. Very soon it is going to be customizable. People can also visit the site and go through the beautiful writings of great authors.</p>
				<p style="font-size:18px;font-family: 'Courier New'">Virtual Ink is not only a blogging site but its also a project based on Specific Content Management System and far more elaborative. Virtual Ink is limited only by your imagination.</p><br />
				
				<h3 style="color :brown;text-decoration:underline;">Time Journey: The History</h3><br />
				<p style="font-size:18px;font-family: 'Courier New'">Virtual Ink was born out of a desire for an elegant, well-architectured personal publishing system built on PHP and MYSQL. It came into existence when we faced various problems with other blogging sites. We hope by focusing on user experience and web standard we can create a tool different from anything else out there.</p>
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
