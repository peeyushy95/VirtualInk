<?php
session_start();

include('db_connect.php');

//thoughts count
$thought_count = $db->query("SELECT * FROM thoughts");

//amount displayed
$per_page_thought = 2;

$per_page = 5;

$start = 0;

$query = $db->prepare("SELECT name,profession,thoughts FROM thinkers ORDER BY thought_id desc LIMIT $start, $per_page_thought");
$query->execute();
$query->bind_result($name,$profession,$thoughts);




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Welcome to Virtual Ink</title>
		<link href="styles1.css" rel="stylesheet" type="text/css"/>
		
	</head>

	<body>
		<div id="menu-wrapper">
			<div id="menu">
				<ul class="menubar">
					<li class="current_page_item"><a href="index.php">Home</a></li>
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
		</div>
		
		<!-- end #menu -->
			
		<div id="header-wrapper">
			<div id="header">
				<div id="logo">
					<h1>Virtual<span>Ink</span></h1>
					<p>writes for real people </p>
				</div>
				<div id="descp" style="background-color:rgba(13, 78, 81, 0.44); border-radius: 15px;border:2px solid;">
					
					<?php
					while($query->fetch()):
					?>
					<p style="font-family:'Times New Roman', Times, serif; font-size: 20px; color: rgb(219, 244, 245); padding: 10px 30px 10px 30px;"><?php echo nl2br($thoughts) ?><span style="float:right;  color:#F6B300; ">-<?php echo $name?></span></p>
					<?php endwhile; ?>
				</div>
				<?php $query->close(); ?>
			</div>
		</div>
	
		<!-- end #header -->

		<div id="wrapper">
			<div id="page">
				<div id="content">
					<div class="post">
						<h3 style="font-weight:normal; font-size:26px; color:#F6B300; text-align:center ">VirtualInk.com</h3>					
						<hr style="width:80%"/>
						<ul>
							<li><p>A platform for creative writers.</p></li>
							<li><p>The depth of writing categories from fiction to non-fiction.</p></li>
							<li><p>Thoughts and memories from every part of the globe being shared and enriched.</li>
							<li><p>Visit the site, read the blogs in blog section and suggest us how did you felt visiting us by clicking on Suggest Us.</li>
						</ul>
					</div>
				</div>
				
		
				<div id="sidebar">
					<h3 style="font-weight:normal; font-size:26px; color:#F6B300; text-align:center ">Already a Virtual Inker ?</h3><br /><hr style="width:80%" /><br /> 
					<div class='logi'>
					<form action="index.php" method="post">
						<input type="text" size="600" id="uname" name="uname" class="input" placeholder="Username"/><br /><br />
   						<input type="password" size="30" id="pwd" name="pwd" class="input"placeholder="Password"/><br /><br/></div>
    	
    						<?php
	
						if(isset($_POST['submit'])){
							$uname = $_POST['uname'];
							$pwd = $_POST['pwd'];

							include('db_connect.php');
	
							if(empty($uname) || empty($pwd)) {
								echo '<p style="color:red; " > Missing Information. <br />Please fill in the required information.</p>';
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
									echo '<p style="color:black;" > Incorrect Username or Password !</p>';
								}
							}
	
						}

						?>
  		
  						
						<input type="submit" value="Login" name="submit" class="button2"/>
		
					</form>
					</br />
					</br />
					<a href="forget.php">Forgot Password ?</a><br />
					<p style="color:turquoise; padding: 0px 0px 15px 0px;">Not a Virtual Inker ? <a href="registration.php">Register Now</a></p>
				</div>
				<div id="content2">
					<div class="post">
					<?php
					$quer = $db->prepare("SELECT title,post_id,mem_info.fname FROM posts INNER JOIN mem_info ON posts.uid=mem_info.uid ORDER BY post_id desc LIMIT $start, $per_page");
					$quer->execute();
					$quer->bind_result($title,$post_id,$fname);
					?>
					
						<h3 style="font-weight:normal; font-size:26px; color:#F6B300; text-align:center;letter-spacing: 2px; ">Recent Posts</h3><hr style="width:80%" />
						<marquee  behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
						<?php
						while($quer->fetch()):
					?>
					
						<p style="color:black;font-size:18px" ><a class="button3" href="post.php?id=<?php echo $post_id?>" style=""><?php echo $title?></a><span style="color:turquoise"> by</span><span style="color: turquoise;text-transform:capitalize"> <?php echo $fname?></span></p>
						<?php endwhile; ?></marquee>
						<?php $quer->close(); ?><hr style="width:80%" /> 
						<h3 style="font-weight:normal; font-size:26px; color:#F6B300; text-align:center;letter-spacing: 2px; ">Popular Posts</h3><hr style="width:80%" />
						<?php
						if($db->query("create or replace view new as (select post_id from comments group by post_id order by count(*) desc limit 4) ")== true){
						$que=$db->prepare("select title,post_id from posts where post_id in (select * from new)");
						$que->execute();
						$que->bind_result($title,$post_id);?>
						<marquee  behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();"><?php
						while ($que->fetch()):?>
						
						<p style="color:black;font-size:18px; " ><a class="button3" href="post.php?id=<?php echo $post_id?>" style=""><?php echo $title?></a><span></p>
						<?php
						endwhile;
						}
						
						
?></marquee>
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
