window.onload = async function () {
    try {
        // Fetch data
        const response = await fetch('../controller/graphsData_controller.php');
        const data = await response.json();

        costsVerticalBarChart(data.costsBarChart);
        
    } catch (error) {
        console.error('Error fetching data:', error);
    }
};

function costsVerticalBarChart(dashboardBarData) {
    console.log(dashboardBarData);
    const chart = new CanvasJS.Chart("verticalBarChart", {
        backgroundColor: "transparent",
        animationEnabled: true,
        title: {
            text: "costs Monthly Chart",
            fontColor: "white"
        },
        axisY: {
            title: "Cost(£)",
            titleFontColor: "white",
            labelFontColor: "white",
            includeZero: true,
            prefix: "£",
            suffix: ""
        },
        axisX: {
            labelFontColor: "white",
            interval: 1
        },
        data: [{
            type: "bar",
            yValueFormatString: "£#,##0",
            indexLabel: "{y}",
            indexLabelPlacement: "inside",
            indexLabelFontWeight: "bolder",
            indexLabelFontColor: "white",
            dataPoints: dashboardBarData
        }]
    });
    chart.render();
}
