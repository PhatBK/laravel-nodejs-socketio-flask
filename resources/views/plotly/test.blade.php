<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Demo Plotly</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="vendor_customer/vendor/js/plotly-latest.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-md-12" id="tester" style="height: 600px;"></div>
		{{-- <div class="col-md-6" id="test" style="height: 300px;"></div> --}}
	</div>
	<div class="row">
		<div class="col-md-6" id="myDiv" style="height: 300px;"></div>
		<div class="col-md-6" id="myDiv1" style="height: 300px;"></div>
	</div>
</body>

<script>
	TESTER = document.getElementById('tester');
	var x = [1,2,3,4,5];
	var y = [537692,1059307,1288655,1622437,1970144];

	var x1 = [1,2,3,4,5,6];
	var y1 = [0.512,1.505,1.508,1.7662,2.5267,18.1586];
	var x2 = [1,2,3,4,5,6];
	var y2 = [0.5121,1.5085,1.5199,1.7848,8.235,145.6799];

	// var i = 1;
	// for (i;i < 30;i++){
	// 	x[i] = i;
	// 	y[i] = 1/i; 
	// }
	Plotly.plot( TESTER, [{
	x: x1 ,
	y: y1},{
	x: x2,
	y: y2
	}],{
	margin: { t: 0 } } );

	// var x1 = [];
	// var y1 = [];
	// var i = 0;
	// for ( i ; i < 30;i++){
	// 	x1[i] = i;
	// 	y1[i] = Math.cos(i);
	// }
	// Test = document.getElementById('test');
	// Plotly.plot(Test,[{
	// 	x: x1,
	// 	y: y1
	// }],{
	// 	margin: { t: 0 }
	// });

	// 	var trace1 = {
	// 	  x: [1, 2, 3, 4, 5],
	// 	  y: [1, 6, 3, 6, 1],
	// 	  mode: 'markers+text',
	// 	  type: 'scatter',
	// 	  name: 'Team A',
	// 	  text: ['A-1', 'A-2', 'A-3', 'A-4', 'A-5'],
	// 	  textposition: 'top center',
	// 	  textfont: {
	// 	    family:  'Raleway, sans-serif'
	// 	  },
	// 	  marker: { size: 12 }
	// 	};
	// 	var trace2 = {
	// 	  x: [1.5, 2.5, 3.5, 4.5, 5.5],
	// 	  y: [4, 1, 7, 1, 4],
	// 	  mode: 'markers+text',
	// 	  type: 'scatter',
	// 	  name: 'Team B',
	// 	  text: ['B-a', 'B-b', 'B-c', 'B-d', 'B-e'],
	// 	  textfont : {
	// 	    family:'Times New Roman'
	// 	  },
	// 	  textposition: 'bottom center',
	// 	  marker: { size: 12 }
	// 	};

	// 	var data = [ trace1, trace2 ];

	// 	var layout = {
	// 	  xaxis: {
	// 	    range: [ 0.75, 5.25 ]
	// 	  },
	// 	  yaxis: {
	// 	    range: [0, 8]
	// 	  },
	// 	  legend: {
	// 	    y: 0.5,
	// 	    yref: 'paper',
	// 	    font: {
	// 	      family: 'Arial, sans-serif',
	// 	      size: 20,
	// 	      color: 'grey',
	// 	    }
	// 	  },
	// 	  title:'Data Labels on the Plot'
	// 	};

	// 	Plotly.newPlot('myDiv', data, layout);

	// 	var trace11 = {
	// 	y: [5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5],
	// 	  mode: 'markers',
	// 	  marker: {
	// 	    size: 40,
	// 	    color: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39]
	// 	  }
	// 	};

	// 	var data = [trace11];

	// 	var layout = {
	// 	  title: 'Scatter Plot with a Color Dimension'
	// 	};

	// 	Plotly.newPlot('myDiv1', data, layout);
</script>
</html>