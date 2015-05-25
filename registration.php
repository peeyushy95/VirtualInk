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
						if(isset($_SESSION['uid'])){
						echo "<p style='text-align:center; font-size:20px;color :black'>Password must be atleast 6 characters long</p>";
						header('Location: dashboard.php');
		
						

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


<h2 style="text-align:center">Tell Us About Yourself</h2>

<form method="post" action="reg_success.php">
  <hr/><br />
    <div class="logi">
    <label for="fname" style="font-weight:bold; text-transform:uppercase; color:white;">First name:</label>
    <input type="text" size="30" id="fname" name="fname" class="input" /><br />
    <label for="lname" style="font-weight:bold; text-transform:uppercase; color:white;">Last name:</label>
    <input type="text" size="30" id="lname" name="lname" class="input" /><br />
    <label for="gender" style="font-weight:bold; text-transform:uppercase; color:white;">Gender:</label>
    <select name="gender"   class="input2">
	<option value="female">Female</option>
	<option value="male">Male</option>
    </select><br />
    <label for="dob" style="font-weight:bold; text-transform:uppercase; color:white;">Date of Birth:</label>
    <select size="1" name="year" value="Year"  class="input2">
   <option>Year</option>
   <option>1950</option>
<option>1951</option>
<option>1952</option>
<option>1953</option>
<option>1954</option>
<option>1955</option>
<option>1956</option>
<option>1957</option>
<option>1958</option>
<option>1959</option>
<option>1960</option>
<option>1961</option>
<option>1962</option>
<option>1963</option>
<option>1964</option>
<option>1965</option>
<option>1966</option>
<option>1967</option>
<option>1968</option>
<option>1969</option>
<option>1970</option>
<option>1971</option>
<option>1972</option>
<option>1973</option>
<option>1974</option>
<option>1975</option>
<option>1976</option>
<option>1977</option>
<option>1978</option>
<option>1979</option>
   <option>1980</option>
   <option>1981</option>
   <option>1982</option>
   <option>1982</option>
   <option>1983</option>
   <option>1984</option>
   <option>1985</option>
   <option>1986</option>
   <option>1987</option>
   <option>1988</option>
   <option>1989</option>
   <option>1990</option>
   <option>1991</option>
   <option>1992</option>
   <option>1993</option>
   <option>1994</option>
   <option>1995</option>
   <option>1996</option>
   <option>1997</option>
   <option>1998</option>
   <option>1999</option>
   <option>2000</option>
   <option>2001</option>
   <option>2002</option>
   <option>2003</option>
   <option>2004</option>
   <option>2005</option>
   <option>2006</option>
   <option>2007</option>
   <option>2008</option>
   <option>2009</option>
   <option>2010</option>
</select>
  <select size="1" name="month" value="Month"  class="input2">
  <option>Month</option>
   <option value="01">Jan</option>
   <option value="02">Feb</option>
   <option value="03">Mar</option>
   <option value="04">Apr</option>
   <option value="05">May</option>
   <option value="06">June</option>
   <option value="07">July</option>
   <option value="08">Aug</option>
   <option value="09">Sep</option>
   <option value="10">Oct</option>
   <option value="11">Nov</option>
   <option value="12">Dec</option>
</select>
<select size="1" name="date" value="Date"  class="input2">
   <option>Date</option>
   <option>01</option>
   <option>02</option>
   <option>03</option>
   <option>04</option>
   <option>05</option>
   <option>06</option>
   <option>07</option>
   <option>08</option>
   <option>09</option>
   <option>10</option>
   <option>11</option>
   <option>12</option>
   <option>13</option>
   <option>14</option>
   <option>15</option>
   <option>16</option>
   <option>17</option>
   <option>18</option>
   <option>19</option>
   <option>20</option>
   <option>21</option>
   <option>22</option>
   <option>23</option>
   <option>24</option>
   <option>25</option>
   <option>26</option>
   <option>27</option>
   <option>28</option>
   <option>29</option>
   <option>30</option>
   <option>31</option>
</select>
    <br />
    <label for="email" style="font-weight:bold; text-transform:uppercase; color:white;">email address:</label>
    <input type="text" size="30" id="email" name="email" class="input" /><br /><br />
    <br/><br/>
    
    <hr />
    <h2 style="text-align:center">LogIn Information</h2><br />
    <label for="uname" style="font-weight:bold; text-transform:uppercase; color:white;">Username:</label>
    <input type="text" size="30" id="uname" name="uname" class="input" /><br />
    <label for="pwd" style="font-weight:bold; text-transform:uppercase; color:white;">Password:</label>
    <input type="password" size="30" id="pwd" name="pwd" class="input"/><br /><br />
    </div>
    <hr />
    
    <input type="submit" value="Register" name="submit" class="button2"/><hr/>
    
  </form>
  <br /><br /><br />
  

<div id="footer">
	<p>&copy; 2014 VirtualInk.com | Designed by Peeyush Yadav,Ankit Bisla and Ashutosh Kumar Tekriwal.</p>
</div>
<!-- end #footer -->
</body>
</html>
