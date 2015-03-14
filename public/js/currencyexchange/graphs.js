$(function() {
 	var ctx = $('.trend-chart').get(0).getContext("2d");
 	var ctxTwo = $('.trend-chart-two').get(0).getContext("2d");
 	var ctxThree = $('.trend-chart-three').get(0).getContext("2d");

 	//Set labels for line chart and values
 	var lineChart = {
 		labels   : ['EUR', 'USD', 'GBP'],
 		datasets : [{
 			data: [100, 423, 354]
 		}]
 	}
 	//Set labels for bar chart and values
 	var barChart = {
 		labels   : ['Main Currency Purchase', 'Main Currency Sale'],
 		datasets : [{
 			data: [1, 1]
 		}]
 	}

 	//Initiliase bar an line chart
	var lineChart = new Chart(ctx).Line(lineChart);
	var barChart  = new Chart(ctxTwo).Line(barChart);

	//Connect to localhost socket
 	var socket = io.connect('http://localhost:8080/');

 	//Determines if a main currency sale transaction has been performed
 	socket.on('currencyexchange.maincurrencysale', function (data) {
 		var mainCurrencySaleValue = barChart.datasets[0].points[1].value + 1;
 		barChart.datasets[0].points[1].value = mainCurrencySaleValue;
		barChart.update();
	});

 	//Determines if a main currency purchase transaction has been performed
	socket.on('currencyexchange.maincurrencypurchase', function (data) {
 		var mainCurrencyPurchaseValue = barChart.datasets[0].points[1].value + 1;
 		barChart.datasets[0].points[1].value = mainCurrencyPurchaseValue;
		barChart.update();
    });

	//Determines if the purchase was a high
	socket.on('currencyexchange.highpurchase', function (data) {
 		//Use data to determine if value is true or false and increment chart
 		//TODO
    });

	//Close socket to ensure no socket conflicts occurr
	$(window).on('beforeunload', function(){
		socket.close();
	});
});