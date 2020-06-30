<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
 background="images/ent.jpg"/>
 	<div id="main-wrapper">
 		<center>
 			<h2><font color ="white">Hello,
 				<?php echo $_SESSION['varname1'].' / '.$_SESSION['e-uni'] ?>
 				</h2>
 				<h3><font color ="white">Please select the choice of your interest!!!</h3>
 				<h4><font color ="white">###Don't forget to check the PROFIT graph for getting good deals ;)
 				Or the ROI graph to get angel investors :)</h4>
 		</center>

 	<form class="myform" action="welcome.php" method="post">
 		<a href="roi.php">
 		<input type="button" id="register_btn" value="Check ROI Graph" />
 		<a href="bid.php">
 		<input type="button" id="register_btn" value="Check BID Graph" />
 		<a href="query-soln.php">
 		<input type="button" id="register_btn" value="See Client Queries and give Solutions(bid)" />
 		<a href="ideas.php">
 		<input type="button" id="register_btn" value="Present your idea" />
 		<a href="modify_soln.php">
 		<input type="button" id="register_btn" value="Modify solution or idea" />
 		<a href="index1.php">
 		<input type="button" id="register_btn" value="logout" />

 	</a>

 	</form>
 	<?php
 	 	if (isset($_POST['logout'])) {
 	 		session_destroy();
 	 		header('location:index.php');
 	 	}
 	 	
 	 	


 	?>
 	</div>

</body>
</html>