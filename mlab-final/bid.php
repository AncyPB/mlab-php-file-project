<?php
	session_start();
?>
<!DOCTYPE html>

<html>
<head>
	<title>ROI Graph</title>
    <link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<br /><br />
	<div class="container" style="width: 900px;">
		<center>
		<h2 aligns="center"><i>BID Graph based on bid values by various entrepreneurs for the query you specify</i></h2>
		<h3 align="center"><i>If BID is suitable and in budget along with a great idea, no one can stop you from getting the project!!!!</i></h3>
	</center>
    <form class="myform" action="bid.php" method="post">
        <label><b>
            Query code:</b>
        </label><br>
        <input name="query_code" type="text" class="inputvalues" placeholder="the query code for which you want the bid graph" required/><br><br>
        <a href="bid.php">
        <input name="show-bid-graph" type="submit" id="back1_btn" value="show-bid-graph" /><br>
    <a href="hpgentrepreneur.php">
        <input type="button" id="back1_btn" value="back" />
        
    </a>
</form>
	</div>
	<?php
    if(isset($_POST['show-bid-graph'])){
        $query_code =$_POST['query_code'];
 		$file=fopen("solutions.txt","r");
 		$json=[];
 		$json2=[];
 			while(!feof($file)){
 			$content = fgets($file);
 			$carray = explode("|",$content);
 			if(array_key_exists(1, $carray)){
 				if($carray[0] == $query_code){

 					$json[]=$carray[1];
 					$json2[]=(int)$carray[3];

 				}
 			}
 		}
    }
 				
  		?>
<body>
	<canvas id="myChart"></canvas>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script type="text/javascript">
		var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: <?php  echo json_encode($json); ?>,
        datasets: [{
            label: 'BID-VALUE',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            barPercentage: 0.01,
        barThickness: 0.02,
        maxBarThickness: 0.25,
        minBarLength: 0.02,
            data: <?php  echo json_encode($json2); ?>,
        }]
    },

    // Configuration options go here
    options: {
    	layout: {
            padding: {
                left: 50,
                right: 70,
                top: 50,
                bottom: 100
            }
        }


    }
});
	</script>

</body>
</html>