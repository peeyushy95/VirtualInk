<?php
session_start();
if(!isset($_GET['id'])){
	header('Location: index.php');
	exit();
}
else{
	$id = $_GET['id'];
}

include('db_connect.php');
include("dbinfo.inc.php");
				$database="dba";
						$db = new mysqli($dbhost, $dbuser, $dbpass, $database);
if(!is_numeric($id))
{
	header('Location: index.php');
}

$sql = "SELECT title, body FROM posts WHERE post_id='$id'";
$query = $db->query($sql);
if($query->num_rows !=1){
	header('Location: index.php');
	exit();
}


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
		<div id="content1">
			<div class="post">
				<?php
	$row = $query->fetch_object();
	echo '<h2 class="title" style="font-family:title; text-decoration:underline; color:brown" >'.$row->title.'</h2><br />';
	echo "<p>".nl2br($row->body)."</p>";
	?>
	</div>
	
	<hr />
	<br/><br />
	<div id="add-comments">
		<form action="<?php echo $_SERVER['PHP_SELF']."?id=$id" ?>" method="post">
		<div class="logi">
		<div>
			<label>Name: </label><input type = "text" name = "name" size="30"/>
		</div>
		<div>
			<label>Comment: </label><textarea name="comment" rows=4 cols=70></textarea>
		</div></div>
		<?php
		if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	
	if( $name && $comment){

		$name = $db->real_escape_string($name);
		$comment =  $db->real_escape_string($comment);
		
		$id = $db->real_escape_string($id);
		//echo $id;
		if($addComment = $db->prepare("INSERT INTO comments (name,post_id,comment) VALUES (?,?,?)")){
			$addComment->bind_param('sds',$name,$id,$comment);
			$addComment->execute();
			echo '<p style="color:red"><br />Thank you for adding the comment.</p>';
			$addComment->close();
		}
		else{
			echo "Error".$db->error; 
		}
	}
	else{
		echo '<p style="color:red">Missing Information. Please fill in the required information</p>';
	}
}
		?>
		<br /><br />
		<input type ="submit" name="submit" value="Comment" />
		</form>
	</div>
	
	<hr />
	<br /><br />
	
	<div id="Comments">
		<?php
			echo '<p style="color:red">COMMENTS:</p>';
			$query = $db->query("SELECT * FROM comments WHERE post_id='$id' ORDER BY comment_id");
			while($row = $query->fetch_object()):
		?>
		<div>
			<p style="color:WHITE; font-weght:bold; font-size:110%;"><?php echo $row->name?></p>
			
			<blockquote><p style="color:green; font-weght:bold; font-size:110%;"><?php echo nl2br($row->comment);?></blockquote></p><blockquote>
		</div>
		<?php endwhile; ?>
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
