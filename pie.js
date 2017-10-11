
            var chart;

            var chartData = [
                {
                    "country": "United States",
                    "visits": 0
                },
                {
                    "country": "China",
                    "visits": 0
                },
                {
                    "country": "Linux",
                    "visits": 1809
                },
                {
                    "country": "Germany",
                    "visits": 0
                },
                {
                    "country": "United Kingdom",
                    "visits": 0	
                },
                {
                    "country": "France",
                    "visits": 0
				},
                {
                    "country": "India",
                    "visits": 0
                },
                {
                    "country": "Wimdows",
                    "visits": 711
                }
            ];


            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();

                // title of the chart
                chart.addTitle("Visitors countries", 16);

                chart.dataProvider = chartData;
                chart.titleField = "country";
                chart.valueField = "visits";
                chart.sequencedAnimation = true;
                chart.startEffect = "elastic";
                chart.innerRadius = "30%";
                chart.startDuration = 2;
                chart.labelRadius = 15;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // the following two lines makes the chart 3D
                chart.depth3D = 10;
                chart.angle = 15;

                // WRITE
                chart.write("chartdiv");
            });
