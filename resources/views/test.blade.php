<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>chart</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
</head>
<body>
	<div class="container">
		<canvas id="chart"></canvas>
	</div>
</body>
<script>
	let chart = document.getElementById('chart').getContext('2d');
	let barChart = new Chart(chart, {
		type:'bar',
		data:{
			labels:["January", "February", "March", "April", "May", "June", "July"],
			datasets:[{
				label:'1',
				data:[10,9,8,7,6,5,4],
				backgroundColor:'green'
				},{ 
				label:'2',
				data:[4,5,6,7,8,9,10],
				backgroundColor:'grey'
			}]
		},
		options:{
			scales: {
				yAxes: [{
					ticks: {
						max: 100,
						min: 0,
						stepSize: 10
					}
				}]
			}
		} 
	});
</script>
</html>