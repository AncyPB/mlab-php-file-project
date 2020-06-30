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
 background="images/clients.jpg"/>
 	<div id="main-wrapper">
 		<center>
 			<h2><font color ="white">Hello,
 				<?php echo $_SESSION['varname2'].' / '.$_SESSION['varname3'] ?>
 				</h2>
 				<h3><font color ="white">Please select the choice of your interest!!!</h3>
 				<h4><font color ="white">###Don't forget to check the bidding graph for selecting entrepreneurs of choice ;)</h4>
 		</center>

 	<form class="myform" action="welcome.php" method="post">
 		<a href="postquery.php">
 		<input type="button" id="register_btn" value="Post query" />
 		<a href="viewsolns.php">
 		<input type="button" id="register_btn" value="View Entrepreneur Solutions and connect" />
 		<a href="bidclient.php">
 		<input type="button" id="register_btn" value="Check BID Graph and connect" />
 		<a href="delete_query.php">
 		<input type="button" id="register_btn" value="Delete query" />
 		<a href="modify_query.php">
 		<input type="button" id="register_btn" value="Modify query" />
 		<a href="search_query.php">
 		<input type="button" id="register_btn" value="Search your query" />
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