<!DOCTYPE html>
<html>
<head>
	<title>Registeration </title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
	background="images/register.jpeg"/>
 	<div id="main-wrapper1">
 		<center>
 			<h2>Enter Details For Registeration</h2>
 			<img src="images/image.jfif" class="avatar"/>
 		</center>

 	<form class="myform" action="register.php" method="post">
 		<label><b>
 			username:</b>
 		</label><br>
 		<input name="username" type="text" class="inputvalues" placeholder="your username" required /><br>
 		<label><b>
 			password:</b>
 		</label><br>
 		<input name="password" type="password" class="inputvalues" placeholder="your password" required /><br>
 		<label><b>
 			confirm password:</b>
 		</label><br>
 		<input name="cpassword" type="password" class="inputvalues" placeholder="confirm password" required /><br>
 		
 		<input name="submit_btn" type="submit" id="signup_btn" value="next" /><br>
 		<a href="index1.php">
 		<input type="button" id="back1_btn" value="back" />
 	</a>

 	</form>
 	<?php
 		if(isset($_POST['submit_btn'])){
 			$username =$_POST['username'];
 			$password =$_POST['password'];
 			$cpassword =$_POST['cpassword'];
 			$n="";
 			if ($password==$cpassword) {
 				$file=fopen("users.txt","r");
 				while(!feof($file)){
 				$content = fgets($file);
 				$carray = explode("|",$content);
 				$name = $carray[0];
 				if($name==$username){
 					echo '<script type="text/javascript"> alert("Username exists") </script>';
 					$n=$name;
 					break;
 				}

 			}
 			if($n=="")
  			{
 				file_put_contents("users.txt",$username,FILE_APPEND);
 				file_put_contents("users.txt","|",FILE_APPEND);
 				file_put_contents("users.txt",$password,FILE_APPEND);
 				file_put_contents("users.txt","|\n",FILE_APPEND);
 				header('location:contactdetails.php');
 			}
 			}
 			else{
 			echo '<script type="text/javascript"> alert("Password does not match") </script>';
 		}
 		}
 	?>



 	</div>

</body>
</html>