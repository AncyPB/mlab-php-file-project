<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search for entrepreneur</title>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body
 style="background-color:#576574">
 	<div id="main-wrapper1">
 		<center>
 			<h2>Enter the idea code of the entrepreneur to view a detailed solution on any query/ a detail description on the ideas he/she has given</h2>
 		</center>

 	<form class="myform" action="search_ent.php" method="post">
 		<label><b>
 			idea code:</b>
 		</label><br>
 		<input name="idea_code" type="text" class="inputvalues" placeholder="unique name of the solution giver" required/><br>
 		<input name="submit" type="submit" id="login_btn" value="submit" /><br>
 		<a href="homepginvestor.php">
 		<input type="button" id="back1_btn" value="back" />
 	</a>

 	</form>
 	<?php
 		if (isset($_POST['submit'])) {
 			$idea_code=$_POST['idea_code'];
    $loc=array();
    $name=array();
    $count=0;
    $key='none';
    $value=1;
    if(array_key_exists('idea_code',$_POST))
    {
      $key=strtoupper($_POST['idea_code']);
       if($key!=null){
       $file=fopen("solutions.txt","r");
        $val=1;
      while(!feof($file)) {
        $content1 = fgets($file);
        if ($content1!=null){
          $carr= explode("|", $content1);
          $name[$count]=strtoupper($carr[$val]);
          $loc[$count]=$count;
          $count+=1;
      }
    }
}
      for($i=0;$i<$count-1;$i++)
      {
        for($j=$i+1;$j<$count;$j++)
        {
          if($name[$i]>$name[$j])
          {
           
              $temp=$name[$i];
              $name[$i]=$name[$j];
              $name[$j]=$temp;
              $temp=$loc[$i];
              $loc[$i]=$loc[$j];
              $loc[$j]=$temp;
          }
          
        }
      }
      $value=bsearch($name,$count,$key);
      if($value!="000")
      {
      	#echo "found";
      	$item=$loc[$value];
        $lines = file('solutions.txt'); 
        $cc= $lines[$item];
        list($querycode,$ideacode,$uname,$roi_bid,$short,$detail) = explode("|", $cc);
        echo "Entrepreneur unique name : ".$uname."<br />\n";
        echo "Query Code: ".$querycode."<br />\n";
        echo "Idea code: ".$ideacode."<br />\n";
        echo "ROI / BID Value: ".$roi_bid."<br />\n";
        echo "Idea description: ".$short."<br />\n";
        echo "Detail description: ".$detail."<br />\n";
      }
       if($value=="000")
    {
      echo '<script type="text/javascript"> alert("Entrepreneur does not exist") </script>';
  }
}
}
    function bsearch($name,$count,$key)
    {
      $low=0;
      $high=$count;
      $mid=0;
      $flag=0;
      while($low<=$high){
        $md=($low+$high)/2;
        $mid=intval($md);
        if($name[$mid]==$key){
            $flag=1;
            break;   
        }
        if($name[$mid]>$key)
          $high=$mid-1;
        else
          $low=$mid+1;
      }
    if($flag==1){
      return $mid;
    }
    else
      return "000";
      
  }
 		?>
