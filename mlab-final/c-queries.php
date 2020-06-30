<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <head>
        <title> M-LAB </title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
<body 
   style="background-color:#30336b">
  <div class="header">
    <h1 style="font-size:25;"> <i><b>Be a solution giver to any of the query that interests you!!!!  <b></i></h1> 
    <h2 style="font-size:25;"><i>Remember the query code to give a solution</i></h2>
      <div class="header-right">
        <a class="active" href="hpgentrepreneur.php">Back</a>
        <a class="active" href="solutions.php">Give Solutions</a>
      </div>
    </div>
    <center>
  <table border="2" width='1000' bgcolor=gray>
      <tr >
        <td  width='250' bgcolor=white>Query Code</td>
         <td  width='250' bgcolor=white>Client Name</td>
        <td  width='250' bgcolor=white>Budget</td>
        <td  width='600' bgcolor=white>Query</td>
      </tr>
    </table>
    <?php
      $space='------------------------------------------------------';
    error_reporting(0);
    $myfile = fopen("queries.txt", "r") or die("Unable to open file!");
echo "<table width='1000' bgcolor=white>";
while(!feof($myfile)) {
  $content1 = fgets($myfile);
  if($content1!=null){
  list($querycode, $client, $budget, $query) = explode("|", $content1);
   if($querycode !='*'){
  echo "<tr><td width='800' bgcolor=gray>";
  echo $querycode;
  echo "</td>
  <td></td><td width='700' bgcolor='gray'>";
  echo $client;
  echo "</td><td></td>
  <td width='1500' bgcolor='gray'>";
  echo $budget;
  echo "</td><td></td><td></td><td></td>
  <td></td><td width='900' bgcolor='gray'>";
  echo $query;
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