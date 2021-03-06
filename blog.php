<?php
session_start();
//include the database
include('db_connect.php');

//get record of database
$record_count = $db->query("SELECT * FROM posts");

//amout displayed
$per_page = 5;

//number of pages
$pages = ceil($record_count->num_rows/$per_page);

//get page number
if(isset($_GET['p']) && is_numeric($_GET['p'])){
	$page = $_GET['p'];
}
else{
	$page = 1;
}

if($page <= 0)
	$start = 0;
else
	$start = $page * $per_page - $per_page;
$prev = $page - 1;
$next = $page + 1;	
	
$query = $db->prepare("SELECT uid,post_id,title,LEFT(body, 550) AS body,category FROM posts INNER JOIN categories ON categories.category_id=posts.category_id ORDER BY post_id desc LIMIT $start, $per_page");
$query->execute();
$query->bind_result($uid,$post_id,$title,$body,$category);
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
			<li class="current_page_item"><a href="blog.php">Blog</a></li>
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
		<div id="content1">
			<div class="post1">
				<?php
	while($query->fetch()):
	$lastspace = strrpos($body, ' ');
	?>
	<article><br />
	<h3 style="font-family:title; text-decoration:underline; color:#F6B300" ><?php echo $title?></h3>
	<p style="font-weight:bold; text-transform:capitalize;color:grey; text-align:right">Category : <?php echo $category?></p>
	<p><?php echo nl2br(substr($body,0,$lastspace)."<p class='links'><a href='post.php?id=$post_id' class='button'>Read More</a></p>")?></p>
	<hr />
	</article>
	<?php endwhile?>
	<br /> <br />
	<?php
	if($prev > 0)
		echo "<a href = 'blog.php?p=$prev'><img src='images/left_grey.png'/> &nbsp&nbsp&nbsp&nbsp&nbsp</a>";
	if($page < $pages)
		echo "<a href = 'blog.php?p=$next'><img src='images/right_grey.png'/></a>"; 
	?>
			</div>
		</div>
		
		<div id="sidebar1">
			
			<h3 style="font-weight:normal; font-size:26px; color:black; text-align:center;letter-spacing: 0px; ">Popular Posts</h3><hr style="width:80%; " /><br />
						<?php
						if($db->query("create or replace view new as (select post_id from comments  group by post_id order by count(comment) desc limit 5) ")== true){
						$que=$db->prepare("select title,post_id from posts where post_id in (select * from new)");
						$que->execute();
						$que->bind_result($title,$post_id);?><ul style="list-style-type:square;color:brown">
						<?php
						while ($que->fetch()):?>
						
						<li><p style="color:black;font-size:18px; " ><a href="post.php?id=<?php echo $post_id?>" style="color:brown"><?php echo $title?></a><span></p></li>
						<?php
						endwhile;
						}	?></ul><hr style="width:80%; " />
						<br />
						<h3 style="font-weight:normal; font-size:26px; color:black; text-align:center;letter-spacing: 0px; ">Recent Comments</h3><br /><hr style="width:80%" /><br />
						<?php
						$que->close();
						$com = $db->prepare("SELECT name,comment,title FROM comments INNER JOIN posts ON posts.post_id = comments.post_id ORDER BY comment_id DESC limit 0,5");
						$com->execute();
						$com->bind_result($name,$comment,$title);
						echo "<ul style='list-style-type:square;color:brown'>";
						while($com->fetch()){
							echo "<li><p><span style='color:black'>$name commented on ' $title '</span> <blockquote > \" $comment \" </blockquote></li>";	
						}
						echo "</ul>";
						?>
						
			
		</div>
	</div>
</div>

<div id="footer">
	<p>&copy; 2014 VirtualInk.com | Designed by Peeyush Yadav,Ankit Bisla and Ashutosh Kumar Tekriwal.</p>
</div>
<!-- end #footer -->
</body>
</html>
