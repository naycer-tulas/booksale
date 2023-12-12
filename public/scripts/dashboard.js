
	new DataTable('.table.plain');

	// INTEGRATE HIGHCHARTS

	const table = new DataTable('#books-table',{
		dom: 'Plfrtip'
	});

	
	const chart = Highcharts.chart('books-chart', {
		chart: {
			backgroundColor:null,
			type: 'pie',
			styledMode: true
		},
		title: {
			text: 'Books per User'
		},
		series: [
		{
			data: chartData(table)
		}
		]
	});


	table.on('draw', function () {
		chart.series[0].setData(chartData(table));
	});

	function chartData(table) {
		var counts = {};
		table
		.column(1, { search: 'applied' })
		.data()
		.each(function (val) {
			if (counts[val]) {
				counts[val] += 1;
			}
			else {
				counts[val] = 1;
			}
		});

		return Object.entries(counts).map((e) => ({
			name: e[0],
			y: e[1]
		}));
	}