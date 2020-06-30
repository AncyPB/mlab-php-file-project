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
 background="images/entrepreneurs.jpeg"/>
 	<div id="main-wrapper">
 		<center>
 			<h2><font color ="white">Hello,
 				<?php echo $_SESSION['varname']?>
 				</h2>
 				<h3><font color ="white">Please select the choice of your interest!!!</h3>
 				<h4><font color ="gray">##Don't forget to check the ROI graph for more profits ;)</h4>
 		</center>

 	<form class="myform" action="welcome.php" method="post">
 		<a href="roi_in.php">
 		<input type="button" id="register_btn" value="Check ROI Graph" />
 		<a href="list_ent.php">
 		<input type="button" id="register_btn" value="List Entrepreneur Ideas and connect" />
 		<a href="cqueries.php">
 		<input type="button" id="register_btn" value="Client Queries and Solutions" />
 		<a href="search_ent.php">
 		<input type="button" id="register_btn" value="Search for an Entrepreneur" />
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