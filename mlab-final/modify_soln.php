<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modify Solution/idea</title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
 style="background-color:#30336b">
 	<div id="main-wrapper1">
 		<center>
 			<h2>Fill in the details to modify your idea/solution!!!!!</h2>
 			<h3>Note: Query code / idea code cannot be modified</h3>
  		</center>
 		<form class="myform" action="modify_soln.php" method="post">
      <label><b>
      Query code:</b>
    </label><br>
    <input name="query_code" type="text" class="inputvalues" placeholder="the query code or (None/ none /NONE)" required/><br><br>
    <label><b>
      Idea code:</b>
    </label><br>
    <input name="idea_code" type="text" class="inputvalues" placeholder="your idea code" required/><br><br>
    <label><b>
      Idea Description:</b>
    </label><br>
    <input name="description" type="text" class="inputvalues" placeholder="modified description" required/><br><br>
    <label><b>
      Bid value/ROI value:</b>
    </label><br>
    <input name="val" type="number" class="inputvalues" placeholder="modified ROI / BID" required/><br><br>
    <label><b>
      Detail description:</b>
    </label><br>
    <textarea name="detail" rows="10" cols="60" required="required" placeholder="modified description (max 600 characters and the detail description will be shown only if the client or investor try to connect)"></textarea>

    <a href="modify_soln.php">
    <input name="submit" type="submit" id="login_btn" value="submit" /><br>
 		<a href="hpgentrepreneur.php">
 		<input type="button" id="back1_btn" value="back" />
 		</a>

 	</form>
 	<?php
 		if(isset($_POST['submit'])){
 			$query_code1 =$_POST['query_code'];
 			$new1=$_POST['idea_code'];
      $new2=$_SESSION['e-uni'];
 			$new3=$_POST['description'];
      $new4=$_POST['val'];
      $new5=$_POST['detail'];
 			$replace_with = $query_code1.'|'.$new1.'|'.$new2.'|'.$new4.'|'.$new3.'|'.$new5;
 			#echo $replace_with;
 			$to_be_replaced='';
 			$myfile = fopen("solutions.txt", "r") or die("Unable to open file!");
 			while(!feof($myfile)) {
  			$content1 = fgets($myfile);
  			if($content1!=null){
  			list($querycode,$idea_code,$e_name,$val,$desc,$detail) = explode("|", $content1);
   			if(($query_code1==$querycode || $query_code1=='None' || $query_code1=='none' || $query_code1=='NONE') &&($new1== $idea_code)){
   				$to_be_replaced = $querycode.'|'.$idea_code.'|'.$e_name.'|'.$val.'|'.$desc.'|'.$detail;
   				break;
   			}
   		}
   	}
   				if($to_be_replaced!=''){
   					#echo $to_be_replaced;
 				if(is_writable("solutions.txt")){
 				$FileContent=file_get_contents("solutions.txt");
 				$FileContent=str_replace($to_be_replaced,$replace_with,$FileContent);
 				if(file_put_contents("solutions.txt", $FileContent)>0){
 					echo '<script type="text/javascript"> alert("Solution/idea modified") </script>';
 				}
 		}

 		}
 		else{
 				echo '<script type="text/javascript"> alert("Solution/idea not found") </script>';
 			}
 		}			
 	?>
 		</div>

</body>
</html>