<?php 
session_start();
include('db_connect.php');
include("dbinfo.inc.php");
if(!isset($_SESSION['uid'])){
	header('Location: login.php');
	exit();
}
$uid=$_SESSION['uid'];
include('db_connect.php');
//post count
//$dsd=$db->query("SELECT * FROM log_info");
//echo $dsd;
$post_count = $db->query("SELECT * FROM posts where uid='$uid'");

$mid=0;
if(isset($_GET['mid']))
{
	$mid=$_GET['mid'];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<title>Welcome to Virtual Ink</title>
<link href="menu_assets/styles.css" rel="stylesheet" type="text/css">
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
			<li class="current_page_item"><a href="dashboard.php">Dashboard</a></li>
			<li><a href="logout.php">Log Out</a></li>
			
			
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
			$query=$db->prepare("SELECT fname,lname,email FROM mem_info where uid='$uid'");
			$query->execute();
			$query->bind_result($fname,$lname,$email);
			
			$query->fetch();
		     //echo $fname. ' ' .$lname;
			?>
			
			<h3 style="text-align:center;letter-spacing:0px;text-decoration:underline">Welcome </h3><br />
			<h3><span style="color:brown;text-transform:capitalize;letter-spacing:0px;font-weight:bold"><?php echo $fname.' '.$lname?></span><span style="color:grey; text-transform:lowercase;float:right;font-size:20px;letter-spacing:0px;"><?php echo $email?></span></h3><br />
			
			
			<table>
	<tr>
		<td>(Total Blog Posts :</td>
		<td><?php if($mid == 1 && isset($_POST['submit']))
			echo ($post_count->num_rows+1);
			else
		echo $post_count->num_rows ?>)</td>
	</tr>
	</table>
			<hr /><br />
			
			
			<img src="images/power.jpg" width=200>
			
				<div id='cssmenu'>
<ul>
   <li class='active has-sub'><a href='#'><span>Posts</span></a>
      <ul>
         <li><a href='dashboard.php?mid=1'><span>Create New Post</span></a>
         </li>
         <li><a href='dashboard.php?mid=2'><span>Delete Post</span></a>
         </li>
         <li class='active has-sub'><a href='#'><span>View All Posts By</span></a>
         	<ul>
         		
         		<li><a href='dashboard.php?mid=3'><span>Categories</span></a></li>
         		<li><a href='dashboard.php?mid=4'><span>Post Time</span></a></li>
         	</ul>
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Profile</span></a>
   	<ul>
         <li><a href='dashboard.php?mid=5'><span>Edit Profile</span></a>
         </li>
         <li><a href='dashboard.php?mid=6'><span>Delete Profile</span></a>
         </li>
        </ul>
     </li>    
   <li><a href='dashboard.php?mid=7'><span>Add New Category</span></a></li>
   <li class='last'><a href='suggest.php'><span>Suggest Us</span></a></li>
</ul>
</div>
<br />
<hr/>
<?php 
	
	if($mid == 7)
	{
		$database="dba";
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(! $conn )
		{
		die('Could not connect: ' . mysql_error());
		}
		@mysql_select_db($database) or die( "Unable to select database");
		echo "<div id='categoryform'>";
		echo "<br /><br /><br /><div class='logi'>";
		echo "<form action='dashboard.php?mid=7' method='post'>";
		echo "<label for='category'>Add New Category</label>";
		echo "<input type = 'text' name='newCategory' />";
		echo "<input type = 'submit' name = 'Submit' value ='submit' />";
		echo "<br /><br />";
	
		if(isset($_POST['Submit'])){
			$newCategory = $_POST['newCategory'];
			if(!empty($newCategory)){
				$sqll = "INSERT INTO categories VALUES('','$newCategory')";
				$retval1 = mysql_query( $sqll, $conn );

				if(! $retval1 )
				{
					die('Could not enter data: ' . mysql_error());
				}
				else {
					echo '<p style="color:red">Category Added</p>';
				}
			}
			else{
				echo '<p style="color:red">Missing Information.</p>';
			}
		}
		//$conn->close();
		echo "</div></div>";
	}
	else if($mid == 1)
	{
	
	
		include("dbinfo.inc.php");
		$database="dba";
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $database);
		//$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		echo "<h3 style='text-align:center;'> Ink the world</h3><hr /><br />";
		echo "<div class='my' style='background:#E1DBDB;border-radius:10px;border:2px solid green;padding: 10px 60px 10px 10px'>";
		echo "<form action='dashboard.php?mid=1' method='post'>";
		echo "<label>Title :</label><br />";
		echo "<input type = 'text' name = 'title' size='78' />";
		echo "<br /><br />";
		echo "<label for='body'>Body :</label><br />";
		echo "<textarea name='body' cols=60 rows=20></textarea>";
		echo "<br /><br />";
		echo "<label>Category :</label><br />";
		echo "<select name='category'>";
		
		$sql ="SELECT * FROM categories ORDER BY category_id ASC";
		//$result = mysql_query( $sqr, $conn );
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row[category_id]."'>$row[category]</option>";
					//echo "id: " . $row["category_id"]. " - Name: ";
				}
		} else {
				echo "0 results";
		}
	
			
		echo "</select>";
		echo "<br /><br /><hr />";
		$conn2 = mysql_connect($dbhost, $dbuser, $dbpass);
		if(! $conn2 )
		{
			die('Could not connect: ' . mysql_error());
		}
		@mysql_select_db($database) or die( "Unable to select database");
		if(isset($_POST['submit'])){
			$title = $_POST['title'];
			$body = $_POST['body'];
			$category = $_POST['category'];
			$title = $db->real_escape_string($title);
			$body = $db->real_escape_string($body);
			$uid = $_SESSION['uid'];
			date_default_timezone_set('Asia/Calcutta');
			$date = date('Y-m-d H:i:s');
			$body = htmlentities($body);
			
			if($title && $body && $category){
				$sql2 = "INSERT INTO posts (uid,title,body,category_id,posted) VALUES('$uid','$title','$body','$category','$date')";
				$retval1 = mysql_query( $sql2, $conn2 );

				if(! $retval1 ){
					die('Could not enter data: ' . mysql_error());
				}
				else{
					echo '<p style="color:red">Post Added</p>';
				}

				/*$query = $db->query("INSERT INTO posts (uid,title,body,category_id,posted) VALUES('$uid','$title','$body','$category','$date')");
				if($query){
					echo '<p style="color:red">Post Added</p>';
					
				}
				else{
					echo '<p style="color:red">Error</p>';
				}*/
			}
			else{
				echo '<p style="color:red">Missing Information. Please enter all the required information.</p>';
			}
		}
		//$conn2->close();
		echo "<input type = 'submit' name = 'submit' value = 'Submit' />";
		echo "</form>";
		echo "</div>";
	}
	else if($mid == 2){
	include("dbinfo.inc.php");
				$database="dba";
						$db = new mysqli($dbhost, $dbuser, $dbpass, $database);
		$quer = $db->prepare("SELECT title,post_id FROM posts WHERE uid = '$uid'");
		$quer->execute();
		$quer->bind_result($title,$post_id);
		$j=1;
		echo "<p style='color:black;text-align:center;font-size:24px'> Delete Posts </p><hr/><br>";
		echo "<div class='my' style='background:#E1DBDB;border-radius:10px;border:2px solid green;padding: 10px 60px 10px 40px'>";
		while($quer->fetch()){
			
			echo "<p><span style='word-wrap:break-word;'>$j. $title</span><span style='float:right'><a href='del_post.php?id=$post_id' style='color:brown'> Delete </a></span></p>";
			$j++;
			
		}
		echo "</div>";
	}
	else if($mid == 3){
		include("dbinfo.inc.php");
				$database="dba";
						$db = new mysqli($dbhost, $dbuser, $dbpass, $database);
		$catquery = $db->prepare("SELECT category_id,category FROM categories");
		$catquery->execute();
		$catquery->bind_result($category_id,$category);
		$i=1;
		
		echo "<p style='color:white;text-align:center;font-size:24px'> Category Browser </p><hr/><br>";
		echo "<div class='catbrowse'>";
		while($catquery->fetch())
		{
			echo "<a href='category_blog.php?id=$category_id'><p style='color:brown;text-transform:capitalize;'>$i. $category</p></a>";
			$i++;
		}
		echo "</div>";
		
	}
	else if($mid == 4)
	{
		include("dbinfo.inc.php");
				$database="dba";
						$db = new mysqli($dbhost, $dbuser, $dbpass, $database);
		$posttime = $db->prepare("SELECT post_id,title FROM posts WHERE uid='$uid'");
		$posttime->execute();
		$posttime->bind_result($post_id,$title);
		$k=1;
		echo "<p style='color:black;text-align:center;font-size:24px'> Recent Posts </p><hr/><br>";
		echo "<div class='catbrowse'>";
		while($posttime->fetch())
		{
			echo "<a href='post.php?id=$post_id'><p style='color:brown;text-transform:capitalize;'>$k. $title</p></a>";
			$k++;
		}
		echo "</div>";
	}
	else if($mid == 5)
	{	include("dbinfo.inc.php");
				$database="dba";
						$db = new mysqli($dbhost, $dbuser, $dbpass, $database);
		echo "<p style='color:black;text-align:center;font-size:24px'> Login Information </p><hr/><br>";
		echo "<div class='my' style='background:#E1DBDB;border-radius:10px;border:2px solid green;padding: 30px 60px 10px 40px'>";
		if((!isset($_POST['ch_un']) && !isset($_POST['ch_pwd']) && !isset($_POST['ch_u']) && !isset($_POST['ch_p']))){
		
		
		echo "<form action='dashboard.php?mid=5' method='post'>";
		echo "<input type='submit' value='Change Username?' name='ch_un' class='button2'/>";
		echo "<input type='submit' value='Change Password?' name='ch_pwd' class='button2'/>";
		echo "</form>";
		
		}
		else if(isset($_POST['ch_un'])){
			echo "<form action='dashboard.php?mid=5' method='post'>";
			echo "<input type='text' id='uname' name='uname' class='input' placeholder='Old Username'/><br /><input type='text' id='cuname' name='cuname' class='input' placeholder='New Username'/><br /><br /><input type='submit' value='Change' name='ch_u' />";
			echo "</form>";
		}
		else if(isset($_POST['ch_pwd'])){
			echo "<form action='dashboard.php?mid=5' method='post'>";
			echo "<input type='password' id='pwd' name='pwd' class='input' placeholder='Old Password' /><br /><input type='password' id='cpwd' name='cpwd' class='input' placeholder='New Password'/><br /><br /><input type='submit' value='Change' name='ch_p' />";
			echo "</form>";
		}
		
		else if(isset($_POST['ch_u']))
		{	
			if(!empty($_POST['uname']) && !empty($_POST['cuname'])){
			$older_uname;
			$old_uname = $_POST['uname'];
			$new_uname = $_POST['cuname'];
			$cu = $db->prepare("SELECT uname FROM log_info WHERE uid='$uid'");
			$cu->execute();
			$cu->bind_result($uname);
			while($cu->fetch()){
				$older_uname=$uname;
				
			}
			$cu->close();
			if($old_uname == $older_uname)
			{
				$ins = $db->query("UPDATE log_info SET uname='$new_uname' WHERE uid = '$uid'");
				if($ins)
				 echo "<p style='color:red'>Username Changed!</p>";
			}
			}
			else{
				echo "<p style='color:red'>Missing Information!</p>";
			}
		}
		
		else if(isset($_POST['ch_p']))
		{
			$new_pwd = md5($_POST['cpwd']);
			if(!empty($_POST['pwd']) && !empty($_POST['cpwd']) && !strlen($new_pwd < 6)){
			$older_pwd;
			$old_pwd = md5($_POST['pwd']);
			$new_pwd = md5($_POST['cpwd']);
			$cp = $db->prepare("SELECT pwd FROM log_info WHERE uid='$uid'");
			$cp->execute();
			$cp->bind_result($pwd);
			while($cp->fetch()){
				$older_pwd=$pwd;
				
			}
			$cp->close();
			if($old_pwd == $older_pwd)
			{
				$ins = $db->query("UPDATE log_info SET pwd='$new_pwd' WHERE uid = '$uid'");
				if($ins)
				 echo "<p style='color:red'>Password Changed!</p>";
			}
			}
			else if(strlen($new_pwd < 6))
			{
				echo "<p style='color:red'>Password must be 6 or more characters long.</p>";
			}
			else{
				echo "<p style='color:red'>Missing Information!</p>";
			}
			
		}
		echo "</div>";
	}
	else if($mid == 6){
		include("dbinfo.inc.php");
		$database="dba";
		$db = new mysqli($dbhost, $dbuser, $dbpass, $database);
		echo "<p style='color:red;'>We respect your decision. But to make sure that you are sure of your decision confirm once again. We hope you will provide your valuable feedback. Thank you.</p>";
		echo "<form action='dashboard.php?mid=6' method='post'>";
		
		echo "<input type='submit' name='delete' value='Delete My Account' />";
		echo "</form>";
		if(isset($_POST['delete'])){
			$cp = $db->prepare("SELECT post_id FROM posts WHERE uid='$uid'");
			$cp->execute();
			$cp->bind_result($post_id);
			while($cp->fetch()){
				$older_id=$post_id;
				$db1 = new mysqli($dbhost, $dbuser, $dbpass, $database);
			
				//$cp1 = $db1->prepare("SELECT name FROM comments where post_id='$older_id'");
			
				$del = $db1->query("DELETE FROM comments where post_id='$older_id'");
				
				
			}
			$cp->close();
			$del = $db->query("DELETE FROM posts where uid='$uid'");
			$del = $db->query("DELETE FROM log_info where uid='$uid'");
			$del = $db->query("DELETE FROM mem_info where uid='$uid'");
			if($del){
				header('Location: logout.php');
			}
			else{
				echo "Error";
			}
		}
		
	}
?>
			</div>
		</div>
		
		<div id="sidebar1">
		<h3 style="font-weight:normal; font-size:26px; color:black; text-align:center;letter-spacing: 0px; ">Recent Comments</h3><br /><hr style="width:80%" /><br />
		
						<?php
						$database="dba";
						$conn3 = new mysqli($dbhost, $dbuser, $dbpass, $database);
		
						if ($conn3->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 
						$sq4 ="SELECT name,comment,title FROM comments INNER JOIN posts ON posts.post_id = comments.post_id WHERE uid='$uid' ORDER BY comment_id  DESC limit 0,5";
						//$result = mysql_query( $sqr, $conn );
						$result = $conn3->query($sq4);
						if ($result->num_rows > 0) {
								echo "<ul style='list-style-type:square;color:brown'>";
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<li><p><span style='color:black'>$row[name] commented on ' $row[title] '</span> <blockquote > \" $row[comment] \" </blockquote></p></li>";
									//echo "<option value='".$row[category_id]."'>$row[category]</option>";
					
						}
						} else {
						echo "0 results";
						}
					/*	$com = $db->prepare("SELECT name,comment,title FROM comments INNER JOIN posts ON posts.post_id = comments.post_id WHERE uid='$uid' ORDER BY comment_id  DESC limit 0,5");
						$com->execute();
						$com->bind_result($name,$comment,$title);
						echo "<ul style='list-style-type:square;color:brown'>";
						while($com->fetch()){
							echo "<li><p><span style='color:black'>$name commented on ' $title '</span> <blockquote > \" $comment \" </blockquote></p></li>";	
						}*/
						?>
						</ul>
		
		</div>
	</div>
</div>

<div id="footer">
	<p>&copy; 2014 VirtualInk.com | Designed by Peeyush Yadav,Ankit Bisla and Ashutosh Kumar Tekriwal</p>
</div>
<!-- end #footer -->
</body>
</html>
