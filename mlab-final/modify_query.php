<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modify Query</title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
 style="background-color:#576574">
 	<div id="main-wrapper1">
 		<center>
 			<h2>Fill in the details to modify your query!!!!!</h2>
 			<h3>Note: Query code cannot be modified</h3>
  		</center>
 		<form class="myform" action="modify_query.php" method="post">
 		<label><b>
 			Query code:</b>
 		</label><br>
 		<input name="query_code" type="text" class="inputvalues" placeholder="enter the query code to modify your query" required/><br><br>
 		<label><b>
 			Budget:</b>
 		</label><br>
 		<input name="budget" type="text" class="inputvalues" placeholder="the new budget range" required/><br><br>
 		<label><b>
 			Query/ Problem:</b>
 		</label><br>
 		<textarea name="query" rows="10" cols="60" required="required" placeholder="the modified query(max 600 characters)"></textarea>
 		<a href="postquery.php">
 		<a href="delete_query.php">
 		<input name="submit" type="submit" id="login_btn" value="submit" /><br>
 		<a href="hpgc.php">
 		<input type="button" id="back1_btn" value="back" />
 		</a>

 	</form>
 	<?php
 		if(isset($_POST['submit'])){
 			$query_code1 =$_POST['query_code'];
 			$new1=$_POST['budget'];
 			$new2=$_POST['query'];
 			$replace_with = $query_code1.'|'.$_SESSION['varname3'].'|'.$new1.'|'.$new2;
 			#echo $replace_with;
 			$to_be_replaced='';
 			$myfile = fopen("queries.txt", "r") or die("Unable to open file!");
 			while(!feof($myfile)) {
  			$content1 = fgets($myfile);
  			if($content1!=null){
  			list($querycode,$name,$range,$query) = explode("|", $content1);
   			if($query_code1== $querycode){
   				$to_be_replaced = $querycode.'|'.$name.'|'.$range.'|'.$query;
   				break;
   			}
   		}
   	}
   				if($to_be_replaced!=''){
   					#echo $to_be_replaced;
 				if(is_writable("queries.txt")){
 				$FileContent=file_get_contents("queries.txt");
 				$FileContent=str_replace($to_be_replaced,$replace_with,$FileContent);
 				if(file_put_contents("queries.txt", $FileContent)>0){
 					echo '<script type="text/javascript"> alert("Query modified") </script>';
 				}
 		}

 		}
 		else{
 				echo '<script type="text/javascript"> alert("Query not found") </script>';
 			}
 		}			
 	?>
 		</div>

</body>
</html>