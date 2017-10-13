window.onload = function () {

	var dps = []; // dataPoints
	var updateInterval = 1000;
	var dataLength = 500; // number of dataPoints visible at any point
	var arreglo = Array();
	var chart = new CanvasJS.Chart("chartContainer", {
		title: {
			text: "Live Random Data"
		},
		data: [{
			type: "line",
			dataPoints: dps
		}]
	});

	$.ajax({
		url: 'php/temperatura.php',
		type: 'POST',
		data: 'solicitud=temperatura'

	}).done(function (respuesta) {
		arreglo = eval(respuesta);

	});

	var updateChart = function () {

		if (arreglo.length > 0) {
			arreglo.forEach(function (element) {
				var valor = parseInt(element[0]);
				var año = parseInt(element[1]);
				var mes = parseInt(element[2]);
				var dia = parseInt(element[3]);
				var hora = parseInt(element[4]);
				var minutos = parseInt(element[5]);
				var segundos = parseInt(element[6]);
				var fecha = new Date(año, mes, dia, hora, minutos, segundos)
				dps.push({
					x: fecha,
					y: valor
				});
			});
		}


		if (dps.length > dataLength) {
			dps.shift();
		}

		chart.render();

		var parametro = { solicitud: "cambio_temperatura", tamaño: dps.length };
		var post = $.post("php/temperatura.php", parametro, function (r) {
			arreglo = Array(); if (r != "") {
				r += "]]";
				r = "[[" + r;
				//alert(r);
				arreglo = eval(r);
			}
		}, 'json');


	};

	// update chart after specified time. 
	setInterval(function () { updateChart() }, updateInterval);
}




	// function siRespuesta(r){
		// 	arreglo = eval(r);
		// 	updateChart();

		// }

		// var parametro = {
        //     solicitud: "temperatura",

    	// };
		// var post = $.post("php/temperatura.php", parametro, siRespuesta, 'json');


				//count = count || 1;
		// count is number of times loop runs to generate random dataPoints.


			//var xVal = dps.length + 1;
	//var yVal = 100;