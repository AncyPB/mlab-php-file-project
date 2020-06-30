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
 			<h2>Enter Contact Details And choose your community</h2>
 			<img src="images/image.jfif" class="avatar"/>
 		</center>

 	<form class="myform" action="contactdetails.php" method="post">
 		<label><b>
 			First Name:</b>
 		</label><br>
 		<input name="firstname" type="text" class="inputvalues" placeholder="your firstname" required /><br><br>
 		<label><b>
 			Last Name:</b>
 		</label><br>
 		<input name="lastname" type="text" class="inputvalues" placeholder="last name or initials" required /><br><br>
 		<label><b>
 			Gender:</b>
 		</label> 
 		<input type="radio" class="radiobtns" name=gender value="male" checked required>Male
 		<input type="radio" class="radiobtns" name=gender value="female" required>Female
 		<input type="radio" class="radiobtns" name=gender value="Prefer not to say" required>Prefer not to say<br>

 		<label><b>
 			Email id:</b>
 		</label><br>
 		<input name="emailid" type="text" class="inputvalues" placeholder="enter a valid email id" required /><br><br>
 		<label><b>
 			Phone Number:</b>
 		</label><br>
 		<input name="phone" type="number" class="inputvalues" placeholder="enter a valid phone number" required /><br><br>
 		<label><b>
 			Choose your community:</b>
 		</label><br>
 		<select class="group" name="group">
 			<option value="Investor">Investor</option>
 			<option value="Entrepreneur">Entrepreneur</option>
 			<option value="Client">Client</option>
 		</select><br>
 		<label><b>
 			Age:</b>
 		</label><br>
 		<input name="age" type="number" class="inputvalues" placeholder="Your Age" required /><br><br>
 		<label><b>
 			Unique identification:</b>
 		</label><br>
 		<input name="unique" type="text" class="inputvalues1" placeholder="eg:MLAB123 through which you will be represented to other groups(Special characters allowed)" required /><br><br>
 		<a href="contactdetails.php">
 		<input name="submit_btn" type="submit" id="signup_btn" value="submit" /><br>
 		<a href="index1.php">
 		<input type="button" id="back1_btn" value="back" />
 	</a>

 	</form>
 	<?php
 		if(isset($_POST['submit_btn'])){
 			$fname =$_POST['firstname'];
 			$lname =$_POST['lastname'];
 			$email=$_POST['emailid'];
 			$phone =$_POST['phone'];
 			$age =$_POST['age'];
 			$gender=$_POST['gender'];
 			$group=$_POST['group'];
 			$unique=$_POST['unique'];
 			$n="";
 			$n1="";
 			$n2="";
 			{
 				$file=fopen("investors.txt","r");
 				while(!feof($file)){
 				$content = fgets($file);
 				$carray = explode("|",$content);
 				$u = $carray[0];
 				if($u==$unique){
 					echo '<script type="text/javascript"> alert("Unique identification exists") </script>';
 					$n=$u;
 					break;
 				}
 			}
 				$file1=fopen("entrepreneurs.txt","r");
 				while(!feof($file1)){
 				$content = fgets($file1);
 				$carray = explode("|",$content);
 				$u1 = $carray[0];
 				if($u1==$unique){
 					echo '<script type="text/javascript"> alert("Unique identification exists") </script>';
 					$n1=$u1;
 					break;
 				}
 			}
 			$file2=fopen("client.txt","r");
 				while(!feof($file2)){
 				$content = fgets($file2);
 				$carray = explode("|",$content);
 				$u2 = $carray[0];
 				if($u2==$unique){
 					echo '<script type="text/javascript"> alert("Unique identification exists") </script>';
 					$n2=$u2;
 					break;
 				}
 			}
 			}
 			if(!preg_match("/^[a-zA-Z]*$/",$fname) || (!preg_match("/^[a-zA-Z]*$/",$lname))){
 			echo '<script type="text/javascript"> alert("Only letters and white spaces allowed in names") </script>';
 			}
 			else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
 			echo '<script type="text/javascript"> alert("Invalid email format") </script>';
 			}
 			else{
 				if($group == "Investor" && $n=="" && $n1=="" && $n2==""){
 					file_put_contents("investors.txt",$unique,FILE_APPEND);
 					file_put_contents("investors.txt","|",FILE_APPEND);
 					file_put_contents("investors.txt",$fname,FILE_APPEND);
 					file_put_contents("investors.txt","|",FILE_APPEND);
 					file_put_contents("investors.txt",$lname,FILE_APPEND);
 					file_put_contents("investors.txt","|",FILE_APPEND);
 					file_put_contents("investors.txt",$gender,FILE_APPEND);
 					file_put_contents("investors.txt","|",FILE_APPEND);
 					file_put_contents("investors.txt",$email,FILE_APPEND);
 					file_put_contents("investors.txt","|",FILE_APPEND);
 					file_put_contents("investors.txt",$phone,FILE_APPEND);
 					file_put_contents("investors.txt","|",FILE_APPEND);
 					file_put_contents("investors.txt",$group,FILE_APPEND);
 					file_put_contents("investors.txt","|",FILE_APPEND);
 					file_put_contents("investors.txt",$age,FILE_APPEND);
 					file_put_contents("investors.txt","|\n",FILE_APPEND);
 					echo '<script type="text/javascript"> alert("You have been successfuly registered\nGo back to login:)") </script>';
 	 			}
 				if($group == "Entrepreneur" && $n=="" && $n1=="" && $n2==""){
 					file_put_contents("entrepreneurs.txt",$unique,FILE_APPEND);
 					file_put_contents("entrepreneurs.txt","|",FILE_APPEND);
 					file_put_contents("entrepreneurs.txt",$fname,FILE_APPEND);
 					file_put_contents("entrepreneurs.txt","|",FILE_APPEND);
 					file_put_contents("entrepreneurs.txt",$lname,FILE_APPEND);
 					file_put_contents("entrepreneurs.txt","|",FILE_APPEND);
 					file_put_contents("entrepreneurs.txt",$gender,FILE_APPEND);
 					file_put_contents("entrepreneurs.txt","|",FILE_APPEND);
 					file_put_contents("entrepreneurs.txt",$email,FILE_APPEND);
 					file_put_contents("entrepreneurs.txt","|",FILE_APPEND);
 					file_put_contents("entrepreneurs.txt",$phone,FILE_APPEND);
 					file_put_contents("entrepreneurs.txt","|",FILE_APPEND);
 					file_put_contents("entrepreneurs.txt",$group,FILE_APPEND);
 					file_put_contents("entrepreneurs.txt","|",FILE_APPEND);
 					file_put_contents("entrepreneurs.txt",$age,FILE_APPEND);
 					file_put_contents("entrepreneurs.txt","|\n",FILE_APPEND);
 					echo '<script type="text/javascript"> alert("You have been successfuly registered\nGo back to login:)") </script>';
 			}
 			if($group == "Client" && $n=="" && $n1=="" && $n2==""){
 					file_put_contents("client.txt",$unique,FILE_APPEND);
 					file_put_contents("client.txt","|",FILE_APPEND);
 					file_put_contents("client.txt",$fname,FILE_APPEND);
 					file_put_contents("client.txt","|",FILE_APPEND);
 					file_put_contents("client.txt",$lname,FILE_APPEND);
 					file_put_contents("client.txt","|",FILE_APPEND);
 					file_put_contents("client.txt",$gender,FILE_APPEND);
 					file_put_contents("client.txt","|",FILE_APPEND);
 					file_put_contents("client.txt",$email,FILE_APPEND);
 					file_put_contents("client.txt","|",FILE_APPEND);
 					file_put_contents("client.txt",$phone,FILE_APPEND);
 					file_put_contents("client.txt","|",FILE_APPEND);
 					file_put_contents("client.txt",$group,FILE_APPEND);
 					file_put_contents("client.txt","|",FILE_APPEND);
 					file_put_contents("client.txt",$age,FILE_APPEND);
 					file_put_contents("client.txt","|\n",FILE_APPEND);
 					echo '<script type="text/javascript"> alert("You have been successfuly registered\nGo back to login:)") </script>';
 			}
 			}
 			}

 	?>



 	</div>

</body>
</html>