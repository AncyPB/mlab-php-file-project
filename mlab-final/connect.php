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
      <h2>Enter the idea code of solution giver to get the contact details and the idea presented with detailed description</h2>
    </center>

  <form class="myform" action="connect.php" method="post">
    <label><b>
      Idea Code:</b>
    </label><br>
    <input name="idea_code" type="text" class="inputvalues" placeholder="idea code of entrepreneur" required/><br>
    <input name="show-details" type="submit" id="login_btn" value="show-details" /><br>
    <a href="hpgc.php">
    <input type="button" id="back1_btn" value="back" />
  </a>

  </form>
  <?php
    if (isset($_POST['show-details'])) {
      $unique="";
      $idea_code=$_POST['idea_code'];
      echo "----------------------Entrepreneur's Idea:------------------------";echo "<br />\n\n";
      $file=fopen("solutions.txt","r");
      while(!feof($file)){
      $content = fgets($file);
      if($content!=null){
      list($query_code,$idea_code1,$unique,$bid_roi,$short,$long)= explode("|",$content);
      if($idea_code==$idea_code1){
            echo "unique name : ".$unique;
            echo "<br />\n";
            echo "Idea Code: ".$idea_code."<br/>\n"."ROI value: ".$bid_roi;
            echo "<br />\n";
            echo "Idea: ".$short;
            echo "<br />\n";
            echo "Idea Description: ".$long;
            echo "<br />\n\n";
      }
    }
    }
    echo "-------------------------------Entrepreneur Details :------------------------";echo "<br />\n\n";
    $file=fopen("entrepreneurs.txt","r");
      while(!feof($file)){
      $content = fgets($file);
      if($content!=null){
      list($uname,$fname,$lname,$gen,$mailid,$phone,$gnere,$age)= explode("|",$content);
      if($unique==$uname){
        echo "Name: ".$fname." ".$lname;  echo "<br />\n";
        echo "Gender: ".$gen; echo "<br />\n";
        echo "Phone Number: ".$phone;  echo "<br />\n";
        echo "Mail ID: ".$mailid;echo "<br />\n";
        echo "Age: ".$age; echo "<br />\n\n";
        echo "---------------------------------";
        break;
      }
  }
 }
}
  ?>
  </div>

</body>
</html>