window.onload = function () {
    dashboardPieChart();
    dashboardColumnChart();
}

function dashboardPieChart()
{
    fetch('../controller/graphsData_controller.php') // Fetch data 
        .then(response => response.json()) // Parse the JSON from the response
        .then(data => {
            var chart = new CanvasJS.Chart("pieChartContainer", {
                backgroundColor: "transparent",
                animationEnabled: true,
                title: {
                    text: "Incomes vs Costs",
                    fontColor: "white"
                },
                subtitles: [{
                    text: "this month's breakdown",
                    fontColor: "white"
                }],
                data: [{
                    type: "pie",          
                    indexLabel: "{label}: {y}",
                    indexLabelFontColor: "white",
                    dataPoints: data.dashboardPieChart
                }]
            })
            chart.render(); // Render the chart with both lines
        })
        .catch(error => {
            console.error('Error fetching data:', error); // Handle errors
        });
}

function dashboardColumnChart()
{
    fetch('../controller/graphsData_controller.php') // Fetch data 
        .then(response => response.json()) // Parse the JSON from the response
        .then(data => {
            var chart = new CanvasJS.Chart("columnChartContainer", {
                backgroundColor: "transparent",
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "Monthly Disposable Income",
                    fontColor: "white"
                },
                axisX: {
                    labelFontColor: "white" 
                },
                axisY: {
                    title: "Disposable Income (£)",
                    titleFontColor: "white", 
                    labelFontColor: "white"  
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## £",
                    dataPoints: data.dashboardColumnChart
                }]
            });
            chart.render();
        });
}