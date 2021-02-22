/*
 * charts/chart_filled_blue.js
 *
 * Demo JavaScript used on charts-page for "Filled Chart (Blue)".
 */

"use strict";

$(document).ready(function(){

    // Sample Data
//	var d1 = [[1401591600000, 0], [1404183600000,0], [1406862000000,0], [1409540400000,0], 
//[1412132400000,0], [1414807200000,0], [1417399200000,0], [1420077600000,4], 
//[1422756000000,1], [1425178800000,4], [1427857200000,14], [1430449200000,81]];
	
	var d1 = JSON.parse($("#d1").val());
	console.dir(d1[0][0]);
	var data1 = [{
		label: "Total de visitas",
		data: d1,
		color: App.getLayoutColorCode('blue')
	}];
	//console.log((new Date(2015, 5, 11)).getTime());
	$.plot("#chart_filled_blue", data1, $.extend(true, {}, Plugins.getFlotDefaults(), {
		xaxis: {
			min: d1[0][0] - 43200000,
			max: d1[11][0],
			mode: "time",
			tickSize: [1, "month"],
			monthNames: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
			tickLength: 0
		},
		series: {
			lines: {
				fill: true,
				lineWidth: 1.5
			},
			points: {
				show: true,
				radius: 3.5,
				lineWidth: 1.2
			},
			grow: { active: true, growings:[ { stepMode: "maximum" } ] }
		},
		grid: {
			hoverable: true,
			clickable: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		},
		legend: {
		    position: "ne"
		}
	}));


});