<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Query</title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
 style="background-color:#576574">
 	<div id="main-wrapper1">
 		<center>
 			<h2>We are glad if you got your solutions for your queries!!!!!</h2>
 			<h3>If not we are sorry , that your query was not of interest by many solution givers</h3>
 		</center>
 		<form class="myform" action="delete_query.php" method="post">
 		<label><b>
 			Query code:</b>
 		</label><br>
 		<input name="query_code" type="text" class="inputvalues" placeholder="enter the query code to delete your query" required/><br><br>
 		<a href="delete_query.php">
 		<input name="submit" type="submit" id="login_btn" value="submit" /><br>
 		<a href="hpgc.php">
 		<input type="button" id="back1_btn" value="back" />
 		</a>

 	</form>
 	<?php
 		if(isset($_POST['submit'])){
 			$query_code =$_POST['query_code'];
 			$new='*';
 				if(is_writable("queries.txt")){
 				$FileContent=file_get_contents("queries.txt");
 				$FileContent=str_replace($query_code,$new,$FileContent);
 				if(file_put_contents("queries.txt", $FileContent)!=0){
 					echo '<script type="text/javascript"> alert("Query Deleted") </script>';
 				}
 			else{
 				echo '<script type="text/javascript"> alert("Query not found") </script>';
 			}
 		}

 		}
 			
 	?>
 		</div>

</body>
</html>