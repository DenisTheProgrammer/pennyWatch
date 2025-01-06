window.onload = function () {
    dashboardPieChart();
    dashboardColumnChart();
}

async function dashboardPieChart() {
    try {
        // Fetch data from the server
        const response = await fetch('../controller/graphsData_controller.php');
        
        // Parse the JSON response
        const data = await response.json();
        
        const chart = new CanvasJS.Chart("pieChartContainer", {
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
        });

        chart.render();
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}


async function dashboardColumnChart() {
    try {
        // Fetch data from the server
        const response = await fetch('../controller/graphsData_controller.php');
        
        // Parse the JSON response
        const data = await response.json();
        
        const chart = new CanvasJS.Chart("columnChartContainer", {
            backgroundColor: "transparent",
            animationEnabled: true,
            theme: "light2",
            title: {
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
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}
