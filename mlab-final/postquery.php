<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Query</title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
 style="background-color:#576574">
 	<div id="main-wrapper1">
 		<center>
 			<h2>Please fill these details to post your queries</h2>
 			<h3>Assign any unique name/number to your query (query code)to be recognized by the solution givers<h3>
 		</center>

 	<form class="myform" action="postquery.php" method="post">
 		<label><b>
 			Query code:</b>
 		</label><br>
 		<input name="query_code" type="text" class="inputvalues" placeholder="can be a combination of your lucky number or name letters" required/><br><br>
 		<label><b>
 			Budget:</b>
 		</label><br>
 		<input name="budget" type="text" class="inputvalues" placeholder="put a definite amount or a range if required" required/><br><br>
 		<label><b>
 			Query/ Problem:</b>
 		</label><br>
 		<textarea name="query" rows="10" cols="60" required="required" placeholder="max 600 characters"></textarea>
 		<a href="postquery.php">
 		<input name="submit" type="submit" id="login_btn" value="submit" /><br>
 		<a href="hpgc.php">
 		<input type="button" id="back1_btn" value="back" />
 	</a>

 	</form>
 	<?php
 		if(isset($_POST['submit'])){
 			$query_code =$_POST['query_code'];
 			$range =$_POST['budget'];
 			$query=$_POST['query'];
 			$n="";
 			
 				$file=fopen("queries.txt","r");
 				while(!feof($file)){
 				$content = fgets($file);
 				$carray = explode("|",$content);
 				$u = $carray[0];
 				if($u==$query_code){
 					echo '<script type="text/javascript"> alert("Query code exists") </script>';
 					$n=$u;
 					break;
 				}
 			}
 		if($n==""){
 					file_put_contents("queries.txt",$query_code,FILE_APPEND);
 					file_put_contents("queries.txt","|",FILE_APPEND);
 					file_put_contents("queries.txt",$_SESSION['varname3'],FILE_APPEND);
 					file_put_contents("queries.txt","|",FILE_APPEND);
 					file_put_contents("queries.txt",$range,FILE_APPEND);
 					file_put_contents("queries.txt","|",FILE_APPEND);
 					file_put_contents("queries.txt",$query,FILE_APPEND);
 					file_put_contents("queries.txt","|\n",FILE_APPEND);
 					echo '<script type="text/javascript"> alert("Your query has been posted. Solutions of entrepreneurs are on the way:)") </script>';
 				}
 			}
 					

 	?>
 		</div>

</body>
</html>