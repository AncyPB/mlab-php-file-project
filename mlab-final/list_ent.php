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
    <h1 style="font-size:25;"> <i><b>These are all the ideas given by various entrepreneur!!!<b></i></h1> 
    <h2 style="font-size:25;"><i>Remember unique name of the entrepreneur to connect with them using connect option and to know more about their ideas</i></h2>
      <div class="header-right">
        <a class="active" href="homepginvestor.php">Back</a>
        <a class="active" href="connect1_ent.php">Connect</a>
      </div>
    </div>
    <center>
  <table border="2" width='1000' bgcolor=gray>
      <tr >
         <td  width='250' bgcolor=white>Idea Code</td>
         <td  width='250' bgcolor=white>Unique Name</td>
        <td  width='250' bgcolor=white>Bid Value</td>
        <td  width='600' bgcolor=white>Idea Description</td>
      </tr>
    </table>
    <?php
      $space='------------------------------------------------------';
    error_reporting(0);
    $myfile = fopen("solutions.txt", "r") or die("Unable to open file!");
echo "<table width='1000' bgcolor=white>";
while(!feof($myfile)) {
  $content1 = fgets($myfile);
  if($content1!=null){
  list($querycode, $ideacode, $uniquename, $bidvalue,$short,$long) = explode("|", $content1);
   if($querycode == 'None' || $querycode=='none' || $querycode=='NONE'){
  echo "<tr><td width='500' bgcolor=gray>";
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
?>
</table>
</center>