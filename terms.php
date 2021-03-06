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
			<li><a href="suggest.php">Suggest Us</a></li>
			<li class="current_page_item"><a href="terms.php">Terms of Services</a></li>
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
				<h2 class="title" style="font-weight: normal; color:#F6B300"><u>Terms of Services</u></h2>
				<p id="terms"> <strong>The Gist :</strong></p>
				<p id="terms"> We (the folks at VirtualInk.com) run a blog and a content management service called VirtualInk.com and would love for you to use it. Our basic service is free, and we offer paid upgrades for advanced features. Our service is designed to give you as much control and ownership over what goes on your site as possible and encourage you to express yourself freely. However, be responsible in what you publish. In particular, make sure that none of the prohibited items listed below appear on your site or get linked to from your site (things like spam, viruses, or hate content).</p>

                <p id="terms">You can check our page on types of blogs to get a sense of the types of sites that are welcome on our service (or not!).</p>

                <p id="terms">If you find a VirtualInk.com site that you believe violates our terms of service, please visit our dispute resolution & reporting page.</p><br /><br />
				
				<ol style="font-family: 'Courier New'">
					<li><strong>Your VirtuallInk.com Account and Site.</strong> If you create a blog on the Website, you are responsible for maintaining the security of your account and blog, and you are fully responsible for all activities that occur under the account and any other actions taken in connection with the blog. You must not describe or assign keywords to your blog in a misleading or unlawful manner, including in a manner intended to trade on the name or reputation of others, and We may change or remove any description or keyword that it considers inappropriate or unlawful, or otherwise likely to cause our liability. You must immediately notify us of any unauthorized uses of your blog, your account or any other breaches of security. We will not be liable for any acts or omissions by You, including any damages of any kind incurred as a result of such acts or omissions.</li><br />
					
					<li><strong>Responsibility of Contributors.</strong>If you operate a blog, comment on a blog, post material to the Website, post links on the Website, or otherwise make (or allow any third party to make) material available by means of the Website (any such material, �Content�), You are entirely responsible for the content of, and any harm resulting from, that Content. That is the case regardless of whether the Content in question constitutes text, graphics, an audio file, or computer software. By making Content available, you represent and warrant that:<br />
					<ul>
					<li>the downloading, copying and use of the Content will not infringe the proprietary rights, including but not limited to the copyright, patent, trademark or trade secret rights, of any third party;</li>
					<li>if your employer has rights to intellectual property you create, you have either (i) received permission from your employer to post or make available the Content, including but not limited to any software, or (ii) secured from your employer a waiver as to all rights in or to the Content;</li>
					<li>you have fully complied with any third-party licenses relating to the Content, and have done all things necessary to successfully pass through to end users any required terms;</li>
					<li>the Content does not contain or install any viruses, worms, malware, Trojan horses or other harmful or destructive content;</li>
					<li>the Content is not spam, is not machine- or randomly-generated, and does not contain unethical or unwanted commercial content designed to drive traffic to third party sites or boost the search engine rankings of third party sites, or to further unlawful acts (such as phishing) or mislead recipients as to the source of the material (such as spoofing);</li>
					<li>the Content is not pornographic, does not contain threats or incite violence, and does not violate the privacy or publicity rights of any third party;</li>
					<li>your blog is not getting advertised via unwanted electronic messages such as spam links on newsgroups, email lists, other blogs and web sites, and similar unsolicited promotional methods;</li>
					<li>your blog is not named in a manner that misleads your readers into thinking that you are another person or company. For example, your blog�s URL or name is not the name of a person other than yourself or company other than your own; and</li>
					<li>you have, in the case of Content that includes computer code, accurately categorized and/or described the type, nature, uses and effects of the materials, whether requested to do so by Automattic or otherwise.</li>
					</ul>
					<br /><br />
					By submitting Content to VirtualInk.com for inclusion on your Website, you grant us a world-wide, royalty-free, and non-exclusive license to reproduce, modify, adapt and publish the Content solely for the purpose of displaying, distributing and promoting your blog. If you delete Content, we will use reasonable efforts to remove it from the Website, but you acknowledge that caching or references to the Content may not be made immediately unavailable.
					<br /><br />
					Without limiting any of those representations or warranties, VirtualInk.com has the right (though not the obligation) to, in our sole discretion (i) refuse or remove any content that, in ours reasonable opinion, violates any VirtualInk.com policy or is in any way harmful or objectionable, or (ii) terminate or deny access to and use of the Website to any individual or entity for any reason, in our sole discretion. Automattic will have no obligation to provide a refund of any amounts previously paid.
					</li>
				</ol>
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
