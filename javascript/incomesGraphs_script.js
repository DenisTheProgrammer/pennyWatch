window.onload = async function () {
    try {
        // Fetch data
        const response = await fetch('../controller/graphsData_controller.php');
        const data = await response.json();

        incomesVerticalBarChart(data.incomesBarChart);
        
    } catch (error) {
        console.error('Error fetching data:', error);
    }
};

function incomesVerticalBarChart(dashboardBarData) {
    console.log(dashboardBarData);
    const chart = new CanvasJS.Chart("verticalBarChart", {
        backgroundColor: "transparent",
        animationEnabled: true,
        title: {
            text: "Incomes Monthly Chart",
            fontColor: "white"
        },
        axisY: {
            title: "Income(£)",
            titleFontColor: "white",
            labelFontColor: "white",
            includeZero: true,
            prefix: "$",
            suffix: "k"
        },
        axisX: {
            labelFontColor: "white",
            interval: 1
        },
        data: [{
            type: "bar",
            yValueFormatString: "$#,##0K",
            indexLabel: "{y}",
            indexLabelPlacement: "inside",
            indexLabelFontWeight: "bolder",
            indexLabelFontColor: "white",
            dataPoints: dashboardBarData
        }]
    });
    chart.render();
}
