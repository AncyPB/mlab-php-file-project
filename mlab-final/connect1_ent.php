<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Get connected to entrepreneur using unique name</title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
 style="background-color:#34495e">
 	<div id="main-wrapper1">
 		<center>
 			<h2>Enter the unique name of entrepreneur to get the contact details and all the ideas and solutions with detailed description</h2>
 		</center>

 	<form class="myform" action="connect1_ent.php" method="post">
 		<label><b>
 			unique name:</b>
 		</label><br>
 		<input name="uname" type="text" class="inputvalues" placeholder="unique name of entrepreneur" required/><br>
 		<input name="show-details" type="submit" id="login_btn" value="show-details" /><br>
 		<a href="homepginvestor.php">
 		<input type="button" id="back1_btn" value="back" />
 	</a>

 	</form>
 	<?php
 		if (isset($_POST['show-details'])) {
 			$uname=$_POST['uname'];
 			$c=0;
 			$file=fopen("entrepreneurs.txt","r");
 			while(!feof($file)){
 			$content = fgets($file);
 			if($content!=null){
 			list($unique,$fname,$lname,$gen,$mailid,$phone,$gnere,$age)= explode("|",$content);
 			if($unique==$uname){
 				$c=$c+1;
 				echo "----------------Entrepreneur Details :------------------------";echo "<br />\n\n";
 				echo "unique name : ".$uname;
 			echo "<br />\n";
 				echo "Name: ".$fname." ".$lname;	echo "<br />\n";
 				echo "Gender: ".$gen; echo "<br />\n";
 				echo "Phone Number: ".$phone;  echo "<br />\n";
 				echo "Mail ID: ".$mailid;echo "<br />\n";
 				echo "Age: ".$age; echo "<br />\n\n";
 				echo "---------------------------------";
 				break;
 			}
 	}
 }
 			
 			$count=0;
 			$file=fopen("solutions.txt","r");
 			while(!feof($file)){
 			$content = fgets($file);
 			if($content!=null){
 			list($query_code,$idea_code,$unique,$bid_roi,$short,$long)= explode("|",$content);
 			if($unique==$uname){
 						$count=$count+1;
 						echo "Entrepreneur Ideas or Solutions------------------------:";echo "<br />\n\n";
 						echo "<br />\n";
 						echo "Idea / Solution ".$count;echo "<br />\n";
 						echo "Query code: ".$query_code." "." "." "."Idea Code: ".$idea_code." "." "." "."ROI/BID value: ".$bid_roi;
 						echo "<br />\n";
 						echo "Idea: ".$short;
 						echo "<br />\n";
 						echo "Idea Description: ".$long;
 						echo "<br />\n\n";
 						echo "--------------------------------------------------------------";
 			}
 		}
 		}
 		if ($c==0) {
 			# code...
 			echo "Check Uniquename or Entrepreneur not found";
 		}
}
	?>
 	</div>

</body>
</html>