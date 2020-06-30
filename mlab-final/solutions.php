<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Solution</title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
 style="background-color:#30336b">
 	<div id="main-wrapper1">
 		<center>
 			<h2>Please fill these details to post your ideas or solutions</h2>
 			<h3>Assign any unique name/number to your solution and fill query code as none if it is an idea<h3>
 		</center>

 	<form class="myform" action="solutions.php" method="post">
 		<label><b>
 			Query code:</b>
 		</label><br>
 		<input name="query_code" type="text" class="inputvalues" placeholder="the query code or (None/ none /NONE)" required/><br><br>
 		<label><b>
 			Idea code:</b>
 		</label><br>
 		<input name="idea_code" type="text" class="inputvalues" placeholder="you can assign a name or code to your idea to each idea you post" required/><br><br>
 		<label><b>
 			Idea Description:</b>
 		</label><br>
 		<input name="description" type="text" class="inputvalues" placeholder="a brief description about your idea in a single line" required/><br><br>
 		<label><b>
 			Bid value/ROI value:</b>
 		</label><br>
 		<input name="val" type="number" class="inputvalues" placeholder="enter a definite amount(helps in roi/bid graph)" required/><br><br>
 		<label><b>
 			Detail description:</b>
 		</label><br>
 		<textarea name="detail" rows="10" cols="60" required="required" placeholder="max 600 characters and the detail description will be shown only if the client or investor try to connect"></textarea>

 		<a href="solutions.php">
 		<input name="submit" type="submit" id="login_btn" value="submit" /><br>
 		<a href="hpgentrepreneur.php">
 		<input type="button" id="back1_btn" value="back" />
 	</a>

 	</form>
 	<?php
 		if(isset($_POST['submit'])){
 			$query_code =$_POST['query_code'];
 			$idea_code =$_POST['idea_code'];
 			$desc=$_POST['description'];
 			$val=$_POST['val'];
 			$detail=$_POST['detail'];
 			$e_name=$_SESSION['e-uni'];
 			$n="";
 			$n1="";
 			$file=fopen("queries.txt","r");
 				while(!feof($file)){
 				$content = fgets($file);
 				$carray = explode("|",$content);
 				$u = $carray[0];
 				if($u==$query_code){
 					$n="1";
 					break;
 				}
 			}
 			if($n=="1"){
 				$file1=fopen("solutions.txt","r");
 				while(!feof($file1)){
 				$content = fgets($file1);
 				$carray1 = explode("|",$content);
 				if(array_key_exists(1, $carray1)){
 				$u = $carray1[1];
 				if($u==$idea_code){
 					$n1="1";
 					break;
 				}
 			}
 			}
 			if($n1==""){
 					file_put_contents("solutions.txt",$query_code,FILE_APPEND);
 					file_put_contents("solutions.txt","|",FILE_APPEND);
 					file_put_contents("solutions.txt",$idea_code,FILE_APPEND);
 					file_put_contents("solutions.txt","|",FILE_APPEND);
 					file_put_contents("solutions.txt",$e_name,FILE_APPEND);
 					file_put_contents("solutions.txt","|",FILE_APPEND);
 					file_put_contents("solutions.txt",$val,FILE_APPEND);
 					file_put_contents("solutions.txt","|",FILE_APPEND);
 					file_put_contents("solutions.txt",$desc,FILE_APPEND);
 					file_put_contents("solutions.txt","|",FILE_APPEND);
 					file_put_contents("solutions.txt",$detail,FILE_APPEND);
 					file_put_contents("solutions.txt","|\n",FILE_APPEND);
 					echo '<script type="text/javascript"> alert("Your solution has been posted. Be patient while the deals are on the way:)") </script>';
 			}
 			else{
 				echo '<script type="text/javascript"> alert("Idea code already exists try some other code") </script>';
 			}
 		}
 			else{
 				echo '<script type="text/javascript"> alert("Query does not exist") </script>';
 			}
 			}
 					

 	?>
 		</div>

</body>
</html>