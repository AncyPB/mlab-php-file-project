<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search for your query</title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
 style="background-color:#576574">
 	<div id="main-wrapper1">
 		<center>
 			<h2>Enter your query code to check if your query exists or is deleted</h2>
 		</center>

 	<form class="myform" action="search_query.php" method="post">
 		<label><b>
 			query code:</b>
 		</label><br>
 		<input name="query_code" type="text" class="inputvalues" placeholder="your query code" required/><br>
 		<input name="submit" type="submit" id="login_btn" value="submit" /><br>
 		<a href="hpgc.php">
 		<input type="button" id="back1_btn" value="back" />
 	</a>

 	</form>
 	<?php
 		if (isset($_POST['submit'])) {
 			$k=$_POST['query_code'];
      $n1=0;
      $loc=array();
      $arr = array();
    $file=fopen("queries.txt","r");
      while(!feof($file)){
      $content = fgets($file);
      if($content!=null){
        list($query_code,$name,$budget,$query)= explode("|",$content);
        if($query_code!='*'){
        $arr[$n1]=$query_code;
        $loc[$n1]=$n1;
        $n1=$n1+1;
      }
      }
    }
    $n=count($arr);
    for($i=0;$i<$n1-1;$i++)
      {
        for($j=$i+1;$j<$n1;$j++)
        {
          if($arr[$i]>$arr[$j])
          {
           
              $temp=$arr[$i];
              $arr[$i]=$arr[$j];
              $arr[$j]=$temp;
              $temp=$loc[$i];
              $loc[$i]=$loc[$j];
              $loc[$j]=$temp;
          }
          
        }
      }
       indexedSequentialSearch($arr,$n,$k);
     } 
     function indexedSequentialSearch($arr, $n, $k) 
{ 
    $elements = array(); 
    $indices = array(); 
    $temp = array(); 
     $j=0; $ind = 0; $start=0; $end=0; 
    for ($i = 0; $i < $n; $i++) 
    { 
  
        // Storing element 
        $elements[$ind] = $arr[$i]; 
  
        // Storing the index 
        $indices[$ind] = $i; 
        $ind++; 
    } 
      for($i=0;$i<$n;$i++){
        if(strcasecmp($k,$elements[$i])==0){
          #found at index at $indices[$i]
          $j=$j+1;
        echo "Query Found: ".$elements[$indices[$i]]."<br />\n";
        findrecord($j,$elements[$indices[$i]]);
        break;
      }
    }
    if($j==0){
      echo "Query either deleted or wrong query code";
    }
} 
  function findrecord($j,$elem){
    
      # code...
      $file=fopen("queries.txt","r");
      while(!feof($file)){
      $content = fgets($file);
      if($content!=null){
        list($query_code,$name,$budget,$query)= explode("|",$content);
        if($query_code==$elem)
        {
          echo "Name: ".$name."<br />\n";
          echo "Budget: ".$budget."<br />\n";
          echo "query: ".$query."<br />\n";
          break;
        }
    
  }
}
}
   
 		?>
