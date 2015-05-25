<?php
session_start();
$uid = $_SESSION['uid'];
//echo "<p style = 'color:white;font-size:20px;'> $uid </p>";
//include the database
include('db_connect.php');
include("dbinfo.inc.php");
$database="dba";
$db = new mysqli($dbhost, $dbuser, $dbpass, $database);
$id = $_GET['id'];
//echo "<p style = 'color:white;font-size:20px;'> $id </p>";

$query = $db->prepare("SELECT post_id,title,LEFT(body, 550) AS body FROM posts where category_id = '$id' AND uid='$uid'");
//$sql = "SELECT post_id,title,LEFT(body, 550) AS body FROM posts where category_id = '$id' AND uid='$uid'";
$query->execute();
//$query = $db->query($sql);
$query->bind_result($post_id,$title,$body);
//$query->fetch();
//echo "<p style = 'color:white;font-size:20px;'> $post_id </p>";

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
					$p=0;
			
	while($query->fetch()):
	$p=1;
	$lastspace = strrpos($body, ' ');
	?>
	<article>
	<div class="my" style="background:#F0F0F0;border-radius:10px;border:2px solid green;padding: 10px 60px 10px 40px">
	<h2 class="title" style="font-family:title; text-decoration:underline; color:brown" ><?php echo $title?></h2>
	
	<p><?php echo nl2br(substr($body,0,$lastspace)."<p class='links'><a href='post.php?id=$post_id' class='button'>Read More</a></p>")?></p></div>
	<hr />
	</article>
	<?php endwhile?>
	<?php
	if($p==0){
		echo "<p style = 'color:brown;font-size:20px;'>Sorry! No posts of this category added. <br /><br />Add now @ <a href='dashboard.php?mid=1'>Dashboard</a></p>";
	}
	?>			
	<br /> <br />
	
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
