<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <head>
        <title> M-LAB </title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="stylesheet" type="text/css" href="css\style.css">
    </head>
<body 
   style="background-color:#30336b">
  <div class="header">
    <h1 style="font-size:25;"> <i><b>View all the solutions by the solution givers by entering your query code<b></i></h1> 
    <h2 style="font-size:25;"><i>Remember unique name of the entrepreneur to connect with them using connect option</i></h2>
    <h3 style="font-size:25;"><i>If there is no data shown after entering the query code- means no solutions given till now</i></h3>
      <div class="header-right">
        <a class="active" href="hpgc.php">Back</a>
        <a class="active" href="connect.php">Connect</a>
      </div>
    </div>
    <form class="myform" action="viewsolns.php" method="post">
        <label><b>
            Query code:</b>
        </label><br>
        <input name="query_code" type="text" class="inputvalues" placeholder="the query code for which you want the solutions" required/>
        <a href="viewsolns.php">
        <input name="show-solns" type="submit" id="back1_btn" value="show-solutions" /><br><br>
      </a>
    </form>
    <center>
  <table border="2" width='1000' bgcolor=gray>
      <tr >
        <td  width='250' bgcolor=white>Query Code</td>
         <td  width='250' bgcolor=white>Idea Code</td>
         <td  width='250' bgcolor=white>Unique Name</td>
        <td  width='250' bgcolor=white>Bid Value</td>
        <td  width='600' bgcolor=white>Idea Description</td>
      </tr>
    </table>
    <?php
    if(isset($_POST['show-solns'])){
      $code=$_POST['query_code'];
      $space='------------------------------------------------------';
    error_reporting(0);
    $myfile = fopen("solutions.txt", "r") or die("Unable to open file!");
echo "<table width='1000' bgcolor=white>";
while(!feof($myfile)) {
  $content1 = fgets($myfile);
  if($content1!=null){
  list($querycode, $ideacode, $uniquename, $bidvalue,$short,$long) = explode("|", $content1);
   if($querycode == $code){
  echo "<tr><td width='500' bgcolor=gray>";
  echo $querycode;
  echo "</td>
  <td></td><td width='700' bgcolor='gray'>";
  echo $ideacode;
  echo "</td><td></td>
  <td width='1500' bgcolor='gray'>";
  echo $uniquename;
  echo "</td><td></td><td></td><td></td>
  <td></td><td width='900' bgcolor='gray'>";
  echo $bidvalue;
   echo "</td>
  <td></td><td width='700' bgcolor='gray'>";
  echo $short;
  echo "</td>
</tr>";

echo "<tr><td width='2000' bgcolor='white'>";
  echo $space;
  echo "</td>
</tr>";
 }
}
}
}
?>
</table>
</center>