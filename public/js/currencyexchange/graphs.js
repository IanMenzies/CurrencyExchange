$(function() {
 	var ctxTwo = $('.trend-chart-two').get(0).getContext("2d");
 	var ctxThree = $('.trend-chart-three').get(0).getContext("2d");

 	//Set labels for bar chart and values
 	var barChart = {
 		labels   : ['Main Currency Purchase', 'Main Currency Sale'],
 		datasets : [{
 			data: [0, 0],
 		}]
 	}

 	var pieChart = [
 		{
        	value: 1,
        	color: "#46BFBD",
        	highlight: "#5AD3D1",
        	label: "High Purchase"
    	},
    	{
        	value: 1,
        	color: "#FDB45C",
        	highlight: "#FFC870",
        	label: "Low Purchase"
    	}
 	];

 	//Initiliase bar and pie chart
	var barChart  = new Chart(ctxTwo).Bar(barChart);
	var pieChart  = new Chart(ctxThree).Pie(pieChart);

	//Connect to localhost socket
 	var socket = io.connect('http://localhost:8080/');

 	//Determines if a main currency exhange transaction has been performed
 	socket.on('currencyexchange.graphtrend', function (currencyExchangeData) {
 		var currencyExchangeData = $.parseJSON(currencyExchangeData);
 		//Update all relevantgraph data
 		if (currencyExchangeData['mainCurrencySale'] == true) {
 			var mainCurrencySaleValue = barChart.datasets[0].bars[1].value + 1;
 			barChart.datasets[0].bars[1].value = mainCurrencySaleValue;
 		}

 		if (currencyExchangeData['mainCurrencyPurchase'] == true) {
			var mainCurrencyPurchaseValue = barChart.datasets[0].bars[0].value + 1;
 			barChart.datasets[0].bars[0].value = mainCurrencyPurchaseValue;
 		}

		if (currencyExchangeData['highPurchase'] == true) {
			var highPurchase = pieChart.segments[0].value + 1;
 			pieChart.segments[0].value = highPurchase;
 		} else {
			var lowPurchase = pieChart.segments[1].value + 1;
 			pieChart.segments[0].value = lowPurchase;
 		}

		pieChart.update();
		barChart.update();
	});

	//Close socket to ensure no socket conflicts occurr
	$(window).on('beforeunload', function(){
		socket.close();
	});
});