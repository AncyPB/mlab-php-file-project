<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
 style="background-color:#34495e">
 	<div id="main-wrapper1">
 		<center>
 			<h2>WELCOME INVESTOR</h2>
 			<img src="images/image.jfif" class="avatar"/>
 		</center>

 	<form class="myform" action="loginasinvestor.php" method="post">
 		<label><b>
 			username:</b>
 		</label><br>
 		<input name="username" type="text" class="inputvalues" placeholder="type your username" required/><br>
 		<label><b>
 			password:</b>
 		</label><br>
 		<input name="password" type="password" class="inputvalues" placeholder="type your password" required /><br>
 		<label><b>
 			Unique Identification:</b>
 		</label><br>
 		<input name="uni" type="text" class="inputvalues" placeholder="unique name entered while registering" required/><br>
 		<input name="login" type="submit" id="login_btn" value="login" /><br>
 		<a href="index1.php">
 		<input type="button" id="back1_btn" value="back" />
 	</a>

 	</form>
 	<?php
 		if (isset($_POST['login'])) {
 			$c =0;
 			$username =$_POST['username'];
 			$password =$_POST['password'];
 			$uni =$_POST['uni'];
 			$file=fopen("users.txt","r");
 			while(!feof($file)){
 			$content = fgets($file);
 			$carray = explode("|",$content);
 			if(array_key_exists(1, $carray)){
 			$name = $carray[0];
 			$pass = $carray[1];
 			if($name==$username && $pass==$password){
 				$c=$c+1;
 				break;		
 			}
 		}
 		}
 			$file1=fopen("investors.txt","r");
 				while(!feof($file1)){
 				$content1 = fgets($file1);
 				$carray1 = explode("|",$content1);
 				$name1 = $carray1[0];
 					if($name1==$uni){
 						$_SESSION['varname']=$carray1[1];
 						$c=$c+1;
 						break;
 					}
 				}
 		if($c==2){
 				header('location:homepginvestor.php');
 		}
 		else{
 				echo '<script type="text/javascript"> alert("Incorrect username or password") </script>';
 			}
 	}
	?>
 	</div>

</body>
</html>