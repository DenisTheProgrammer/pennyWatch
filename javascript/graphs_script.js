window.onload = async function () {
    try {
        // Fetch data
        const response = await fetch('../controller/graphsData_controller.php');
        const data = await response.json();

        dashboardPieChart(data.dashboardPieChart);
        dashboardColumnChart(data.dashboardColumnChart);
    } catch (error) {
        console.error('Error fetching data:', error);
    }
};

function dashboardPieChart(dashboardPieData) {
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
            dataPoints: dashboardPieData
        }]
    });

    chart.render();
}

function dashboardColumnChart(dashboardColumnData) {
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
            dataPoints: dashboardColumnData
        }]
    });

    chart.render();
}

